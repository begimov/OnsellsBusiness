<?php

namespace App\Classes\Analytics;

use \Google_Client;
use \Google_Service_AnalyticsReporting;
use \Google_Service_AnalyticsReporting_DateRange;
use \Google_Service_AnalyticsReporting_Metric;
use \Google_Service_AnalyticsReporting_ReportRequest;
use \Google_Service_AnalyticsReporting_GetReportsRequest;
use \Google_Service_AnalyticsReporting_Dimension;
use \Google_Service_AnalyticsReporting_DimensionFilter;
use \Google_Service_AnalyticsReporting_DimensionFilterClause;

use Illuminate\Support\Facades\Cache;

class GoogleAnalytics {

    private $analytics;

    public function __construct()
    {
        $this->analytics = $this->initializeAnalytics();
    }

    private function initializeAnalytics()
    {
        $client = new Google_Client();
        $client->setAuthConfig(config('googleanalytics.api_key_file_path'));
        $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
        return new Google_Service_AnalyticsReporting($client);
    }

    public function getPromotionsViewsReport($promotions) {
        if (!$promotions->isEmpty()) {
            return Cache::remember(config('googleanalytics.cachename_prefix') . auth()->user()->id, 1440, function () use ($promotions){
                $promotionPaths = array_map(function ($promo) {
                  return "/promotions/{$promo->id}";
                },$promotions->all());

                $reports = $this->getReports([
                    'start-date' => '30daysAgo',
                    'end-date' => 'today',
                    'metric' => 'ga:pageviews',
                    'dimension' => [
                        'name' => 'ga:pagePath',
                        'filter' => [
                            'name' => 'ga:pagePath',
                            'operator' => 'IN_LIST',
                            'expression' => $promotionPaths,
                        ],
                    ],
                ]);
                return $this->preparePromotionsViewsReport($reports);
            });
        }
    }

    private function preparePromotionsViewsReport($reports)
    {
        $result = [];
        $dataRows = $reports[0]->getData()->getRows();
        foreach ($dataRows as $row) {
            $dimensions = $row->getDimensions();
            $metrics = $row->getMetrics();
            foreach ($dimensions as $dimension) {
                $id = preg_replace("/\/promotions\//", '', $dimension);
                $result[$id] = (int) $metrics[0]->getValues()[0];
            }
        }
        return collect($result);
    }

    private function getReports($params)
    {
        // Create the DateRange object.
        $dateRange = new Google_Service_AnalyticsReporting_DateRange();
        $dateRange->setStartDate($params['start-date']);
        $dateRange->setEndDate($params['end-date']);
        // Create the Metrics object.
        $sessions = new Google_Service_AnalyticsReporting_Metric();
        $sessions->setExpression($params['metric']);
        //Create the Dimensions object.
        $pagePath = new Google_Service_AnalyticsReporting_Dimension();
        $pagePath->setName($params['dimension']['name']);
        // Create the DimensionFilter.
        $dimensionFilter = new Google_Service_AnalyticsReporting_DimensionFilter();
        $dimensionFilter->setDimensionName($params['dimension']['filter']['name']);
        $dimensionFilter->setOperator($params['dimension']['filter']['operator']);
        $dimensionFilter->setExpressions($params['dimension']['filter']['expression']);
        // Create the DimensionFilterClauses
        $dimensionFilterClause = new Google_Service_AnalyticsReporting_DimensionFilterClause();
        $dimensionFilterClause->setFilters(array($dimensionFilter));
        // Create the ReportRequest object.
        $request = new Google_Service_AnalyticsReporting_ReportRequest();
        $request->setViewId(config('googleanalytics.view_id'));
        $request->setDateRanges($dateRange);
        $request->setDimensions(array($pagePath));
        $request->setDimensionFilterClauses(array($dimensionFilterClause));
        $request->setMetrics(array($sessions));

        $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
        $body->setReportRequests(array($request));

        return $this->analytics->reports->batchGet($body);
    }
}
