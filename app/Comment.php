<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = 'comments';
	
    public function company(){
    	return $this->belongsTo('App\Company');
    }
}
