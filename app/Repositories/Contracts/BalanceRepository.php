<?php

namespace App\Repositories\Contracts;

interface BalanceRepository
{
    public function findByUserId($id);
}
