<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name', 'address', 'city', 'country_id'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
