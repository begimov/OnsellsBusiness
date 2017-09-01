<?php

namespace App\Repositories;

use App\Repositories\Contracts\ApplicationRepository;
use App\Models\Balance\Balance;
use App\Models\Promotions\Application;

class EloquentApplicationRepository implements ApplicationRepository
{
    public function getApplicationsHideUnpaid($user, $num)
    {
        $applications = $user->applications()
            ->with(['user' => function($query)
                { $query->select('id','name','email'); }, 'promotion'])
            ->take($num)
            ->get();

        $applications = array_map(function ($application) {
            if (!$application['paid']) {
                $application['user']['email'] = '';
            }
            return $application;
        }, $applications->toArray());

        return $applications;
    }

    public function getUnpaidApplicationsById(array $applicationIds)
    {
      return Application::with(['user'])
          ->whereIn('id', $applicationIds)
          ->whereNull('paid');
    }
}
