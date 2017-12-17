<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Company;
use App\User;
use App\Leader;
use App\Semester;
use App\Lecturer;
use App\Notice;
use Validator;
use App\Intership;
use App\Http\Controllers\Admin\MailController;
use App\Http\Request\CreateSemesterRequest;
use App\Http\Request\EditSemesterRequest;
use App\Http\Request\NoticeRequest;
use Auth;
class AdminController extends Controller
{

	public function show_dn()
	{
		$allhocky = Semester::all();
		foreach($allhocky as $hocky){
			if((date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_thuc_tap) &&(date('Y-m-d')>$hocky->thoi_gian_dn_bat_dau_dk) ){
				$hocky_current = $hocky->ten_hoc_ki;
			}
		}
		$hockys = Semester::select('ten_hoc_ki')->distinct()->get();
		return view('admin.index',compact('hockys','hocky_current'));
	}

	public function createSemester(){
		$allhocky = Semester::all();
		foreach($allhocky as $hocky){
			if((date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_thuc_tap) &&(date('Y-m-d')>$hocky->thoi_gian_dn_bat_dau_dk) ){
				$hocky_current = $hocky->ten_hoc_ki;
			}
		}
		$lists = Semester::all();
		return view('admin.create_semester',compact(['lists','hocky_current']));
	}


	public function postCreateSemester(CreateSemesterRequest $r){
		$semester = new Semester;
		$semester->ten_hoc_ki = $r->name;
		$semester->thoi_gian_dn_bat_dau_dk = $r->thoi_gian_dn_bat_dau_dk;
		$semester->thoi_gian_dn_ket_thuc_dk = $r->thoi_gian_dn_ket_thuc_dk;
		$semester->thoi_gian_sv_bat_dau_dk = $r->thoi_gian_sv_bat_dau_dk;
		$semester->thoi_gian_sv_ket_thuc_dk =$r->thoi_gian_sv_ket_thuc_dk;
		$semester->thoi_gian_sv_bat_dau_thuc_tap = $r->thoi_gian_sv_bat_dau_thuc_tap;
		$semester->thoi_gian_sv_ket_thuc_thuc_tap=$r->thoi_gian_sv_ket_thuc_thuc_tap;
		$semester->save();
		return redirect()->route('tao-lich-dang-ky-hoc-ky');
	}

	public function filter_company_hocky($hocky){
		$companys_request = Company::where('hocky',$hocky)->where('status',0)->get();
		$companys_accept = Company::where('hocky',$hocky)->where('status',1)->get();
		return [$companys_request,$companys_accept];
	}


	public function acceptCompanyRequest($id){
		$company = Company::find($id);	
        if($company) {
        	$company->status =1;
        	$company->save();
        	MailController::mailAccept($company);
        }
		$users = DB::table('users')->join('leaders','users.id','=','leaders.user_id')->where('company_id',$id)->update(['status'=>1]);
		return $company;
	}

	public function deleteCompanyRequest($id){
		$company = Company::find($id);
		$company->delete();
		return 1;
	}
	public function deleteCompany($id){
		$company = Company::find($id);
		$company->delete();
		return 1;
	}

	public function manageLecturer(){
		$allhocky = Semester::all();
		foreach($allhocky as $hocky){
			if((date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_thuc_tap) &&(date('Y-m-d')>$hocky->thoi_gian_dn_bat_dau_dk) ){
				$hocky_current = $hocky->ten_hoc_ki;
			}
		}
		$hockys = Semester::select('ten_hoc_ki')->distinct()->get();
		return view('admin.manage_lecturer',compact('hockys','hocky_current'));
	}

	public function addlecturer(Request $request){
		$data = $request->data;
		$hocky = $request->hocky;
		foreach ($data as $key => $d) {
			$validator = Validator::make($data[$key],[
				"email"=>"required|email|unique:users,email",
				"password"=>"required|min:6"
			],[]);
		}
		if(sizeof($data)>0 && $validator->passes()){
			foreach($data as $d){
				$user = new User;
				$user->email = $d['email'];
				$user->password = bcrypt($d['password']);
				$user->level = 5;
				$user->status = 1;
				$user->save();

				$lecturer = new Lecturer;
				$lecturer->user_id = $user->id;
				$lecturer->hocky = $hocky;
				$lecturer->save();
			}
				return response()->json(["success"=>"Thanh cong"]);	
		};		
		return response()->json(["error"=>$validator->errors()->all()]);
	}

	public function thongBao(){
		$hocky = new Semester();
		$semester_current= $hocky->getSemesterCurrent();
		return view('admin.notice',compact('semester_current'));
	}

	public function postThongBao(Request $request)
	{	
		$notice = new Notice();
		$notice->tieu_de = $request->tieu_de;
		$notice->noi_dung = $request->noi_dung;
		$notice->ma_nguoi_nhan = $request->ma_nguoi_nhan;
		$notice->user_id = Auth::user()->id;
		$notice->save();
		$hocky = new Semester();
		$semester_current= $hocky->getSemesterCurrent();
		// return redirect('/');
		return redirect()->route('thong-bao',['semester_current'=>$semester_current])->with('success','Bạn Đã Gửi Thông Báo Thành Công');
	}

	public function editSemester($id){
		$hocky = Semester::find($id);	
		// dd($hocky);
		return view('admin.edit_semester')->with('hocky',$hocky);
	}

	public function editSemesterPost(EditSemesterRequest $request,$id){
		$hocky = Semester::find($id);
		$hocky->thoi_gian_dn_bat_dau_dk = $request->thoi_gian_dn_bat_dau_dk;
		$hocky->thoi_gian_dn_ket_thuc_dk = $request->thoi_gian_dn_ket_thuc_dk;
		$hocky->thoi_gian_sv_bat_dau_dk = $request->thoi_gian_sv_bat_dau_dk;
		$hocky->thoi_gian_sv_ket_thuc_dk = $request->thoi_gian_sv_ket_thuc_dk;
		$hocky->thoi_gian_sv_bat_dau_thuc_tap=$request->thoi_gian_sv_bat_dau_thuc_tap;
		$hocky->thoi_gian_sv_ket_thuc_thuc_tap = $request->thoi_gian_sv_ket_thuc_thuc_tap;
		$hocky->save();
		return redirect()->route('tao-lich-dang-ky-hoc-ky');
	}

	public function manageSV() {
		$hockys = Semester::select('id','ten_hoc_ki')->distinct()->get();
		$allhocky = Semester::all();
		foreach($allhocky as $hocky){
			if((date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_thuc_tap) &&(date('Y-m-d')>$hocky->thoi_gian_dn_bat_dau_dk) ){
				$hocky_current = $hocky->ten_hoc_ki;
			}
		}
		return view('admin.manage_student')->with('hockys',$hockys)->with('hocky_current',$hocky_current);
	}

	public function findStudentSemester(Request $request){

		$data = $request->all();

		$listsv1 = DB::table('interships')
			->join('companies','interships.company_id','=','companies.id')
			->join('students','interships.student_id','=','students.id')
			->join('semesters','interships.semester_id','=','semesters.id')
			->join('users','students.user_id','=','users.id')
			->join('results','interships.result_id','=','results.id')
			->select('students.MSSV','users.name as ten','students.lop','students.grade','companies.name','results.diem')
			->where('interships.semester_id','=',$data)
			->where('interships.status',1)
			->get();

		$listsv2 =  DB::table('interships')
			->join('companies','interships.company_id','=','companies.id')
			->join('semesters','interships.semester_id','=','semesters.id')
			->join('students','interships.student_id','=','students.id')
			->join('users','students.user_id','=','users.id')
			->select(DB::raw('group_concat(distinct companies.name separator ",") as tencongty'),'users.name as ten','students.MSSV as mssv','students.lop','students.grade',DB::raw('SUM(interships.status) as sum'))
			->where('interships.semester_id',$data)
			->whereIn('interships.status',[0,2])
			->groupBy('interships.student_id')
			->get();
		return [$listsv1,$listsv2];
	}

	public function assignment_student($hocky){
		// dd("hieu");
		$listsv1 =  DB::table('interships')
			->join('companies','interships.company_id','=','companies.id')
			->join('semesters','interships.semester_id','=','semesters.id')
			->join('students','interships.student_id','=','students.id')
			->join('users','students.user_id','=','users.id')
			->select(DB::raw('group_concat(distinct companies.name separator ",") as tencongty'),'users.name as tensinhvien','interships.student_id as student_id',DB::raw('SUM(interships.status) as sum'))
			->where('semesters.ten_hoc_ki',$hocky)
			->groupBy('interships.student_id')
			->havingRaw('SUM(interships.status) < 1')
			->get();
		$listsv2 = DB::table('interships')
			->join('companies','interships.company_id','=','companies.id')
			->join('semesters','interships.semester_id','=','semesters.id')
			->join('students','interships.student_id','=','students.id')
			->join('users','students.user_id','=','users.id')
			->select('users.name as tensinhvien','interships.student_id as student_id',DB::raw('group_concat(distinct companies.name separator ",") as tencongty'),DB::raw('SUM(interships.status) as sum'))
			->where('semesters.ten_hoc_ki',$hocky)
			->groupBy('interships.student_id')
			->havingRaw('sum < 3')
			->havingRaw('sum > 1')			
			->get();
		$listsv3 = DB::table('interships')
			->join('semesters','interships.semester_id','=','semesters.id')
			->join('students','interships.student_id','=','students.id')
			->join('users','students.user_id','=','users.id')
			->select('users.name as tensinhvien','interships.student_id as student_id',DB::raw('SUM(interships.status) as sum'))
			->where('semesters.ten_hoc_ki',$hocky)
			->groupBy('interships.student_id')
			->havingRaw('sum < 4')
			->havingRaw('sum > 2')
			->get();
		// dd($listsv3);
		$listCompany = Company::where('status',1)->where('hocky',$hocky)->get();
		return view('admin.assignment_student',compact(['listsv1','listsv2','listsv3','hocky','listCompany']));
	}

	public function assignmentStudent(Request $request){
		$array_students = $request->array_student;
		$congty = $request->congty;
		$hocky = $request->hocky;
		$semester_current = Semester::where('ten_hoc_ki',$hocky)->first();

		$max_student = Company::find($congty)->soLuongSinhVienTT;

		if($max_student>0){
			$count_student_register = Intership::where('company_id',$congty)
			->where('status',1)->count();
			$student_register = sizeof($array_students);
			$total = $count_student_register+$student_register;
			if( $total <= $max_student)
			{
				foreach($array_students as $student){
				$intership = new Intership;
				$intership->company_id = $congty;
				$intership->semester_id = $semester_current->id;
				$intership->student_id = $student;
				$intership->status = 1;
				$intership->save();
				}
			return 1;
			}else{
				$sinh_vien_co_the_them = $max_student - $count_student_register;
				return response()->json(['error'=>$sinh_vien_co_the_them]);
			}
		}else{
				foreach($array_students as $student){
				$intership = new Intership;
				$intership->company_id = $congty;
				$intership->semester_id = $semester_current->id;
				$intership->student_id = $student;
				$intership->status = 1;
				$intership->save();
				return 1;
			}
		}
		return $max_student;
	}

	public function listLecturer(Request $request){
		$hocky = $request->hocky;
		$listLecturer = DB::table('lecturers')->join('users','lecturers.user_id','=','users.id')
		->join('interships','lecturers.id','=','interships.lecturer_id')
		->join('companies','companies.id','=','interships.company_id')
		->where('lecturers.hocky','=',$hocky)
		->where('users.status','=',1)
		->groupBy('interships.lecturer_id')
		->select('lecturers.phone','users.name','users.email',DB::raw('group_concat(distinct companies.name separator ",") as tencongty'))
		->distinct()
		->get();
		return $listLecturer;
	}

	public function assignmentLecturer($hocky){

		$lecturers = DB::table('lecturers')
		->join('users','users.id','=','lecturers.user_id')
		->where('lecturers.hocky','=',$hocky)
		->select('users.name as name','users.email as email','lecturers.id as id')
		->get();
		// dd($hocky);
		$companies  = DB::table('companies')
		->join('interships','interships.company_id','=','companies.id')
		->select('companies.name',DB::raw('count(interships.status) as sosinhviendangky'),'companies.soLuongSinhVienTT as gioihan','companies.id')
		->where('companies.status',1)
		->where('interships.status','=',1)
		// ->where(DB::raw('SUM(interships.lecturer_id)=0'))
		->where('companies.hocky',$hocky)
		->groupBy('interships.company_id','interships.lecturer_id')
		->havingRaw('sum(interships.lecturer_id)<1')
		->get();
		$hockys = Semester::select('id','ten_hoc_ki')->distinct()->get();
		$allhocky = Semester::all();
		foreach($allhocky as $hocky){
			if((date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_thuc_tap) &&(date('Y-m-d')>$hocky->thoi_gian_dn_bat_dau_dk) ){
				$hocky_current = $hocky->ten_hoc_ki;
			}
		}
		// dd($companies);
		return view('admin.assignment_lecturer',compact('lecturers','hockys','hocky_current','companies'));
	}

	public function assignmentLecturerForCompany(Request $request){
		$data = $request->all();
		$idGiangVien = $data['idGiangVien'];
		$array_companies = $data['array_company'];
		foreach($array_companies as $company_id){
			Intership::where('company_id',$company_id)
			->where('status',1)->update(['lecturer_id'=>$idGiangVien]);
		}
		return [$array_companies];
	}
}
