<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Student extends Model
{
    use Sortable;

    public $sortable = ['lop', 'grade', 'boMon', 'ctdt', 'tenNVPhuTrach', 'tiengAnh'];

    protected $table = 'students';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function intership()
    {
        return $this->hasOne('App\Intership');
    }

    public function student_job_assignment()
    {
        return $this->hasMany('App\Student_Job_Assignment');
    }

//    public function leader()
//    {
//        return $this->belongsTo('App\Leader', 'leader_id');
//    }
    public function result(){
        return $this->hasOne('App\Result');
    }
}
