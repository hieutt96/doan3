<?php

namespace App;

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
}
