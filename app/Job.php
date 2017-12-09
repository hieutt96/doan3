<?php

namespace App;
// use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
<<<<<<< HEAD
    // use Sortable;

    // public $sortable = ['tgBatDau', 'tgKetThuc'];
 
	protected $table = "jobs";
	
=======
    protected $table = 'jobs';
    public function leader(){
    	return $this->belongsTo('App\Leader','leader_id','id');
    }
>>>>>>> d5ffbad20fd6c8698f279a5ced05d20f79527f92
    public function student_job_assignment(){
    	return $this->hasMany('App\Student_Job_Assignment');
    }
    public function leader(){
    	return $this->belongsTo('App\Leader','leader_id','user_id');
    }
}

