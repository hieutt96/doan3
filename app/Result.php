<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';
    protected $primaryKey = 'student_id';

    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }
}

?>