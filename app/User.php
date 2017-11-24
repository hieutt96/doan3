<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function student(){
        return $this->hasOne('App\Student','user_id','id');
    }

    public function company(){
        return $this->belongTo('App\Company');
    }
    public function comment(){
        return $this->hasMany('App\Comment','user_id','id');
    }
    public function job(){
        return $this->hasMany('App\Job','id');
    }
}
