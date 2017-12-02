<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class Semester extends Model
{
	public $timestamps = false;
	protected $table = 'semesters';
	
    public function intership(){
    	return $this->hasMany('App\Intership');
    }
}
