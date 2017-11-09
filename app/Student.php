<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Student extends Model
{
    use Sortable;

    public $sortable = ['lop', 'khoa', 'boMon', 'ctdt', 'idNVPhuTrach', 'tiengAnh'];

	protected $table = 'students';

    public function user(){
    	return $this->belongsTo('App\User', 'id', 'id');
    }

}
