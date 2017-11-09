<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    protected $table = 'leaders';
    public function company()
    {
    	return $this->hasMany('App\Company');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
