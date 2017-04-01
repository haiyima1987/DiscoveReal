<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'user_id', 'title', 'content', 'published', 'imgPath'
    ];
}
