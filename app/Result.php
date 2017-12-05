<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Result extends Model
{
	protected $table = 'results';
	
    public function student(){
    	return $this->hasOne('App\Student');
    }
}