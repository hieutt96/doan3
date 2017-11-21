<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = 'students';
    public function user(){
    	return $this->belongTo('App\User');
    }
    public function intership(){
    	return $this->hasMany('App\Intership');
    }
    public function result(){
    	return $this->hasOne('App\Result');
    }
    public function student_job_assignment(){
    	return $this->hasMany('App\Student_Job_Assignment');
    }
}
