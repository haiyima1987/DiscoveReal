<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'datetime', 'title', 'content', 'rate', 'location_id', 'category_id'
    ];
}
