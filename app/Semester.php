<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class Semester extends Model
{
	// public $timestamps = false;
	protected $table = 'semesters';
	
    public function intership(){
    	return $this->hasMany('App\Intership');
    }
    public function getAllSemester(){
    	$hockys = $this::all();
    	return $hockys;
    }

    public function getSemesterCurrent(){
        $allhocky = $this->getAllSemester();
        foreach($allhocky as $hocky){
            if((date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_thuc_tap) &&(date('Y-m-d')>$hocky->thoi_gian_dn_bat_dau_dk) ){
                $semester_current = $hocky;
                return $semester_current;
            }
        }
        return false;
    }
}
