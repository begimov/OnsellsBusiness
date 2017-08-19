<?php

namespace App\Repositories\Contracts;

interface TransactionRepository
{
    public function store($balance, $amount);
}
