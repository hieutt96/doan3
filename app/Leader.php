<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Leader extends Model
{
    use Sortable;
    public $sortable = ['lop', 'khoa', 'boMon', 'ctdt', 'idNVPhuTrach', 'tiengAnh'];

    protected $table = 'leaders';
    protected $primaryKey = 'user_id';

    public function company()
    {
        return $this->hasMany('App\Company');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function student()
    {
        return$this->hasMany('App\Student');
    }
}
