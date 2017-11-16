<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Job extends Model
{
    use Sortable;

    public $sortable = ['tgBatDau', 'tgKetThuc'];
    protected $table = "jobs";

    public function student_job_assignment(){
        return $this->hasMany('App\Student_Job_Assignment');
    }
    public function leader(){
        return $this->belongsTo('App\Leader');
    }
}