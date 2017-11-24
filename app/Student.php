<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = 'students';
    public function user(){
    	return $this->belongTo('App\User','user_id','id');
    }
}
