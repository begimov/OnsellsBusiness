<?php

namespace App\Models\Promotions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Promotions\Promotion;

class Application extends Model
{
    protected $connection = 'usersmysql';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}