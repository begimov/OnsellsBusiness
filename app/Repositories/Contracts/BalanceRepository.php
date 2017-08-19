<?php

namespace App\Repositories\Contracts;

interface BalanceRepository
{
    public function findByUserId($id);

    public function store($userId);
}
