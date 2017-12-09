<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
	protected $table = 'results';	
	
<<<<<<< HEAD
    public function intership(){
    	return $this->hasOne('App\Intership');
=======
    public function student(){
    	return $this->hasOne('App\Student');
>>>>>>> d5ffbad20fd6c8698f279a5ced05d20f79527f92
    }
}

?>

