<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Semester;
use App\Lecturer;
use App\User;
use App\Notice;
use App\Result;
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
                $hocky_current = $hocky;
				$this->hocky_current = $hocky;
			}
		}
		View::share('hockys',$hockys);
        View::share('hocky_current',$hocky_current);
	}
    public function manageStudent(){
    	$hocky_current = $this->hocky_current;
        // dd($hocky_current);
    	$students = DB::table('interships')
    	->join('students','students.id','=','interships.student_id')
    	->join('companies','companies.id','=','interships.company_id')
    	->join('results','results.id','=','interships.result_id')
    	->join('users','users.id','=','students.user_id')
        ->join('lecturers','interships.lecturer_id','=','lecturers.id')
    	->select('students.mssv as mssv','users.name as ten','students.lop','students.grade','companies.name as congty','results.diem as diem','results.nhan_xet_cong_ty','results.danh_gia_cua_cong_ty','results.id as result_id','results.nhan_xet_nha_truong')
    	->where('interships.status',1)
        ->where('lecturers.user_id',Auth::user()->id)
        ->where('interships.semester_id',$hocky_current->id)
    	->paginate(20);
        // dd($students);
    	return view('lecturer.manage_student',compact(['students']));
    }

    public function updateInfo(){
        return view('lecturer.update_info');
    }

    public function updateInfoPost(Request $request){
        $user = User::find(Auth::user()->id);
        // dd($user);
        $user->name = $request->name;
        $user->save();
        $lecturer = Lecturer::where('user_id',$user->id)->first();
        $lecturer->phone = $request->phone;
        $lecturer->about = $request->about;
        $lecturer->save();
        return redirect('/lecturer/manage_student')->with('cap_nhap_thong_tin','Cập Nhập Thông Tin Thành Công');
    }

    public function findStudentSemester(Request $request){
        $hocky_id = $request->hocky_id;
        $students = DB::table('interships')
        ->join('students','students.id','=','interships.student_id')
        ->join('companies','companies.id','=','interships.company_id')
        ->join('results','results.id','=','interships.result_id')
        ->join('users','users.id','=','students.user_id')
        ->join('lecturers','interships.lecturer_id','=','lecturers.id')
        ->select('students.mssv as mssv','users.name as ten','students.lop','students.grade','companies.name as congty','results.diem as diem','results.nhan_xet_cong_ty','results.danh_gia_cua_cong_ty','results.id as result_id','results.nhan_xet_nha_truong')
        ->where('interships.status',1)
        ->where('lecturers.user_id',Auth::user()->id)
        ->where('interships.semester_id',$hocky_id)
        ->get();
        return $students;
    }

    public function getResultStudent(Request $request){
        $id = $request->result_id;
        $result = Result::findOrFail($id);
        return $result;
    }

    public function updateResultStudent(Request $request){
        $id = $request->id;
        $diem = $request->diem;
        $nhan_xet_nha_truong = $request->nhan_xet_nha_truong;
        $result = Result::findOrFail($id);
        $result->diem = $diem;
        $result->nhan_xet_nha_truong = $nhan_xet_nha_truong;
        $result->save();
        return $result;
    }

    public function findNoticeOfLecturer(){

    }

    public function sentNotice(){
        return view('lecturer.sent_notice');
    }

    public function sentNoticePost(Request $request){
        $notice = new Notice;
        $notice->user_id = Auth::user()->id;
        $notice->tieu_de = $request->tieu_de;
        $notice->noi_dung = $request->noi_dung;
        $notice->ma_nguoi_nhan = $request->ma_nguoi_nhan;
        $notice->save();
        return redirect()->route('sent-notice')->with('success','Gửi thông báo thành công ');
    }

    public function receviceNotice(){
        $notices = Notice::where('ma_nguoi_nhan',0)->orwhere('ma_nguoi_nhan',1)->paginate();
        return view('lecturer.receive_notice',compact('notices'));
    }
}
