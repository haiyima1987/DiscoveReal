<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'datetime', 'title', 'content', 'rate', 'location_id', 'category_id'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photos(){
        return $this->hasMany('App\Photo');
    }
}
