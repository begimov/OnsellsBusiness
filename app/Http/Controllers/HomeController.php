<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Classes\Analytics\GoogleAnalytics;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, GoogleAnalytics $googleanalytics)
    {
        $user = $request->user();

        $allPromotions = $user->promotions()->get();
        $promocount = $allPromotions->count();

        $balance = $user->balance;

        $promotions = $user->promotions()
            ->with('images')
            ->with('smallImage')
            ->with('category')
            ->paginate(5);

        $applications = $user->applications()
            ->with(['user' => function($query)
                { $query->select('id','name','email'); }, 'promotion'])
            ->take(10)
            ->get();

        $applications = array_map(function ($application) {
            if (!$application['paid']) {
                $application['user']['email'] = '';
            }
            return $application;
        }, $applications->toArray());

        $viewsData = $googleanalytics->getPromotionsViewsReport($allPromotions);

        return view('home', compact('promotions', 'promocount', 'viewsData', 'applications', 'balance'));
    }
}
