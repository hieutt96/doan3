<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Intership extends Model
{
	protected $table = 'interships';
    public function company(){
    	return $this->belongsTo('App\Company','company_id');
    }
    public function lecturer(){
    	return $this->belongsTo('App\Lecturer');
    }
    public function semester(){
    	return $this->belongsTo('App\Semester');
    }
    public function student(){
    	return $this->belongsTo('App\Student');
    }
    public function leader(){
        return $this->belongsTo('App\Leader');
    }
}