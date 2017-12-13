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
>>>>>>> 23611ef6f3d87b595d09ac39416fbb0927e01071

    // public $sortable = ['tgBatDau', 'tgKetThuc'];
 
	protected $table = "jobs";
	
    public function student_job_assignment(){
    	return $this->hasMany('App\Student_Job_Assignment');
    }
    public function leader(){
    	return $this->belongsTo('App\Leader','leader_id','user_id');
    }
}

