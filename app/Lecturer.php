<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
	protected $table = "lecturers";
	
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function intership(){
    	return $this->hasMany('App\Intership');
    }
}

