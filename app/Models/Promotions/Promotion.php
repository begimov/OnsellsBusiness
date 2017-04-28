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

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function smallImgPath()
    {
        return $this->images()->where('type', 'small')->first()->path;
    }

    public function mediumImgPath()
    {
        return $this->images()->where('type', 'medium')->first()->path;
    }
}
