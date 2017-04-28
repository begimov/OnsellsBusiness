<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function promotion()
    {
        return $this->belongsTo('App\Models\Promotions\Promotion');
    }
}
