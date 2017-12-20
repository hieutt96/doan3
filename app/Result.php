<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';



    // public function student(){
    // 	return $this->hasOne('App\Student');
    // }


    public function intership()
    {
        return $this->hasOne('App\Intership');
    }

    // public function student(){
    //     return $this->belongsTo('App\Student');
    // }
}


