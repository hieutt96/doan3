<?php

namespace App;
 use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
<<<<<<< HEAD
    //use Sortable;
=======
     use Sortable;
>>>>>>> f9fc12b4210ace30f95167abf53aaa12713f977b

    // public $sortable = ['tgBatDau', 'tgKetThuc'];
 
	protected $table = "jobs";
	
    public function student_job_assignment(){
    	return $this->hasMany('App\Student_Job_Assignment');
    }
    public function leader(){
    	return $this->belongsTo('App\Leader','leader_id','user_id');
    }
}

