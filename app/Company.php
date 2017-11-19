<?php

namespace App;
use App\Leader;
use App\User;
use App\Comment;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    public function leader(){
    	return $this->belongTo('App\Leader');
    }

    public function user(){
    	return $this->hasOne('App\User');
    }
    public function comment(){
    	return $this->hasMany('App\Comment','company_id','id');
    }
}
