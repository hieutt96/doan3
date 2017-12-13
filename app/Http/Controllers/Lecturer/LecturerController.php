<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Semester;
use App\Lecturer;
use Illuminate\Support\Facades\View;
class LecturerController extends Controller
{
	protected $hockys;
	protected $hocky_current;
	public function __construct(){
		$hockys = Semester::select('id','ten_hoc_ki')->distinct()->get();
		$this->hockys = $hockys;
		$allhocky = Semester::all();
		foreach($allhocky as $hocky){
			if((date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_thuc_tap) &&(date('Y-m-d')>$hocky->thoi_gian_dn_bat_dau_dk) ){
				$this->hocky_current = $hocky->ten_hoc_ki;
			}
		}
		view::share(['hockys',$hockys]);
		// view::share(['hocky_current',$hocky_current]);
	}
    public function manageStudent(){
    	$hockys = $this->hockys;
    	$hocky_current = $this->hocky_current;
    	// dd(1);
    	// dd($hocky_current);
    	return view('lecturer.manage_student',compact(['hockys','hocky_current']));
    }
}
