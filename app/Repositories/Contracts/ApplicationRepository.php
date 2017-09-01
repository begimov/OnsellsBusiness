<?php

namespace App\Repositories\Contracts;

interface ApplicationRepository
{
    public function getApplicationsHideUnpaid($business);
}
