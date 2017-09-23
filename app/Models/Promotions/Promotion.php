<?php

namespace App\Models\Promotions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $connection = 'mysql';

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

    public function smallImage()
    {
        return $this->hasOne('App\Models\Image')->where('type', 'small');
    }

    public function location()
    {
        return $this->hasOne('App\Models\Promotions\Location');
    }
    
    public function locations()
    {
        return $this->hasMany('App\Models\Promotions\Location');
    }
}
