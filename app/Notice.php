<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = "notices";

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
