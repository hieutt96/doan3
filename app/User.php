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
    public function comment(){
        return $this->hasMany('App\Comment','user_id','id');
    }
    public function job(){
        return $this->hasMany('App\Job','id');
    }
    public function notice(){
    	return $this->hasMany('App\Notice','user_id','id');
    }
}
