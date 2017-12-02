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
    	return $this->hasMany('App\Leader');
    }
    public function comment(){
    	return $this->hasMany('App\Comment');
    }
    public function intership(){
    	return $this->hasMany('App\Intership');
    }
    public function comment(){
    	return $this->hasMany('App\Comment','company_id','id');
    }
}
