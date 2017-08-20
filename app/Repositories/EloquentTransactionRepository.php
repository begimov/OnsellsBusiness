<?php

namespace App\Repositories;

use App\Repositories\Contracts\TransactionRepository;
use App\Models\Balance\Transaction;

class EloquentTransactionRepository implements TransactionRepository
{
    public function store($balance, $amount) {
        $transaction = new Transaction;
        $transaction->amount = $amount;

        $balance->transactions()->save($transaction);

        return $transaction;
    }
}
