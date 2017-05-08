<?php

namespace App;

use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Messagable;
    public $dir = 'storage/img/users/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'name', 'password', 'photo', 'firstName', 'lastName', 'email', 'birthday', 'gender', 'city', 'country', 'api_token'
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

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function isAdmin()
    {
        return $this->role_id == 1;
    }
}
