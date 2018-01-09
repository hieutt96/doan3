<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    public function leader(){
    	return $this->hasMany('App\Leader');
    }
    public function intership(){
    	return $this->hasMany('App\Intership','company_id');
    }
    public function comment(){
    	return $this->hasMany('App\Comment');
    }
}
