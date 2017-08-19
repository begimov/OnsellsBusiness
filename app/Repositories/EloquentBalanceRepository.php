<?php

namespace App\Repositories;

use App\Repositories\Contracts\BalanceRepository;
use App\Models\Balance\Balance;

class EloquentBalanceRepository implements BalanceRepository
{
    public function findByUserId($id) {
        return Balance::where('user_id', $id)->first();
    }

    public function store($userId) {
        $balance = new Balance;
        $balance->user_id = $userId;
        $balance->save();
        return $balance;
    }
}
