<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $dir = 'img/countries/';

    protected $fillable = [
        'name', 'path'
    ];

    public function getPathAttribute($value)
    {
        return $this->dir . $value;
    }

    public function locations()
    {
        return $this->hasMany('App\Location');
    }
}
