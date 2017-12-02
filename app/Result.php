<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
	protected $table = 'results';	
	
    public function intership(){
    	return $this->hasOne('App\Intership');
    }
}

?>

