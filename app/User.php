<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
// use Kyslik\ColumnSortable\Sortable;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Auth\Authenticable as AuthenticableTrait;
class User extends Authenticatable
{
    // use Sortable;
    use Notifiable;
    public $sortable = ['name'];
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

    public function student()
    {
        return $this->hasOne('App\Student', 'user_id', 'id');
    }
    public function leader(){
        return $this->hasOne('App\Leader');
    }

    public function notice(){
        return $this->hasMany('App\Notice');
    }

    public function lecturer(){
        return $this->hasOne('App\Lecturer');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
