<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
	protected $table = 'assignments';
	
    public function leader(){
    	return $this->belongsTo('App\Leader');
    }
    public function student(){
    	return $this->belongsTo('App\Student');
    }
}
