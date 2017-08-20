<?php

namespace App\Models\Balance;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
