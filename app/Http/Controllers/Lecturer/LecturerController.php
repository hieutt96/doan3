<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Semester;
use App\Lecturer;
use Illuminate\Support\Facades\View;
use Auth;
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
				$this->hocky_current = $hocky;
			}
		}
		// view::share(['hockys',$hockys]);
	}
    public function manageStudent(){
    	$hockys = $this->hockys;
    	$hocky_current = $this->hocky_current;
    	$students = DB::table('interships')
    	->join('students','students.id','=','interships.student_id')
    	->join('companies','companies.id','=','interships.company_id')
    	->join('results','results.id','=','interships.result_id')
    	->join('users','users.id','=','students.user_id')
    	->select('students.mssv as mssv','users.name as ten','students.lop','students.grade','companies.name as congty','results.diem as diem')
    	// ->where('interships.lecturer_id',Auth::user()->id)
    	->where('interships.status',1)
    	->paginate(20);
    	// dd($students);
    	return view('lecturer.manage_student',compact(['hockys','hocky_current','students']));
    }

    public function updateInfo(){

    }
}
