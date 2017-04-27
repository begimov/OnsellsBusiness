<?php

namespace App\Models\Promotions;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Promotions\Category');
    }
}
