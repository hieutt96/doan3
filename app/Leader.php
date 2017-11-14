<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    protected $table = 'leaders';
    public function company()
    {
    	return $this->belongsTo('App\Company','company_id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function job(){
    	return $this->hasMany('App\Job');
    }

    public function assignment(){
    	return $this->hasMany('App\AssignMent');
    }
}
