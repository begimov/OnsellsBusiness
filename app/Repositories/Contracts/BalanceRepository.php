<?php

namespace App\Repositories\Contracts;

interface BalanceRepository
{
    public function findById($id);

    public function store(array $properties);

    public function update($id, array $properties);

}
