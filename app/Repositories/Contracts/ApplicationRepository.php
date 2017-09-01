<?php

namespace App\Repositories\Contracts;

interface ApplicationRepository
{
    public function getApplicationsHideUnpaid($user, $num);
    public function getUnpaidApplicationsById(array $applicationIds);
}
