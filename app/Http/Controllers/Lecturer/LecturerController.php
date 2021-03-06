<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Semester;
use App\Lecturer;
use App\User;
use App\Notice;
use App\Result;
use App\Intership;
use Illuminate\Support\Facades\View;
use Auth;
class LecturerController extends Controller
{
	protected $semesters;
	protected $semester_current;
	public function __construct(){
		$semesters = Semester::select('id','ten_hoc_ki')->distinct()->get();
		$this->semesters = $semesters;
		$allhocky = Semester::all();
		foreach($allhocky as $hocky){
			if((date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_thuc_tap) &&(date('Y-m-d')>$hocky->thoi_gian_dn_bat_dau_dk) ){
                $semester_current = $hocky;
				$this->semester_current = $semester_current;
			}
		}
		View::share('semesters',$semesters);
        View::share('semester_current',$semester_current);
	}
    public function manageStudent(Request $request){
        if(sizeof($request->semester)){
            $semester = Semester::find($request->semester);
            
        }else{
            $semester = $this->semester_current;
        }
        $lecturer = Lecturer::where('user_id',Auth::user()->id)->first();
        // dd($lecturer);
        if(sizeof($request->search)){
            $search = $request->search;
            $students = Intership::join('students','interships.student_id','=','students.id')
            ->join('users','users.id','=','students.user_id')
            ->join('companies','interships.company_id','=','companies.id')
            ->join('results','results.id','=','interships.result_id')
            ->where('students.mssv','like','%'.$search.'%')
            ->orwhere('users.name','like','%'.$search.'%')
            ->where('lecturer_id',$lecturer->id)
            ->where('semester_id',$semester->id)
            ->paginate(20);
        }else{
            $search = false;
            $students = Intership::where('lecturer_id',$lecturer->id)
            ->where('semester_id',$semester->id)
            ->paginate(20);
        }
    	return view('lecturer.manage_student',compact('students','search','semester'));
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
