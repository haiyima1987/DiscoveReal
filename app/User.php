<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public $dir = 'storage/img/users/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'username', 'password', 'photo', 'name', 'email', 'birthday', 'gender', 'city', 'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getPhotoAttribute($value)
    {
        if ($value) {
            return $this->dir . $value;
        } else {
            return null;
        }
    }


    // has many first foreign key then local key
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
