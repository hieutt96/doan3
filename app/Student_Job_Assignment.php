<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Student_Job_Assignment extends Model
{
    protected $table = 'student_job_assignments';
    public function job(){
    	return $this->belongsTo('App\Job','job_id','id');
    }
    public function student(){
    	return $this->belongsTo('App\Student','student_id','user_id');
    }
}