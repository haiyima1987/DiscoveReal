<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $dir = 'storage/img/posts/';

    protected $fillable = [
        'post_id', 'imgPath'
    ];

    public function getImgPathAttribute($value)
    {
        if ($value) {
            return $this->dir . $value;
        } else {
            return null;
        }
    }
}
