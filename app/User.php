<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

//use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    use Sortable;
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

    public function student(){
        return $this->hasOne('App\Student', 'id', 'id');
    }

    public function leader(){
        return $this->hasOne('App\Leader');
    }


//    public function company(){
//        return $this->belongTo('App\Company');
//    }
}
