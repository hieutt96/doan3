<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Student extends Model
{
    use Sortable;

    public $sortable = ['lop', 'khoa', 'boMon', 'ctdt', 'tenNVPhuTrach', 'tiengAnh'];

    protected $table = 'students';
    protected $primaryKey = 'user_id';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function leader()
    {
        return $this->belongsTo('App\Leader', 'idNVPhuTrach', 'user_id');
    }

    public function intership()
    {
        return $this->hasMany('App\Intership');
    }

    public function job()
    {
        return $this->hasMany('App\Student_Job_Assignment');
    }
}
