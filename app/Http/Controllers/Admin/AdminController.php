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
use App\Result;
use App\Http\Controllers\Admin\MailController;
use App\Http\Request\CreateSemesterRequest;
use App\Http\Request\EditSemesterRequest;
use App\Http\Request\NoticeRequest;

use Illuminate\Support\Facades\View;
use Auth;

class AdminController extends Controller
{

	protected $semesters;
	protected $semester_current;

	public function __construct(){
		$semesters = Semester::all();
		$this->semesters = $semesters;
		foreach($semesters as $hocky){
			if((date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_thuc_tap) &&(date('Y-m-d')>$hocky->thoi_gian_dn_bat_dau_dk) ){
				$semester_current = $hocky;
			}
		}
		$this->semester_current = $semester_current;
		View::share('semesters',$semesters);
		View::share('semester_current',$semester_current);
	}
	public function show_dn(Request $request)
	{
		if(sizeof($request->semester_id)){
			$semester_id = $request->semester_id;
		}else{
			$semester_id = $this->semester_current->id;
		}
		$semester = Semester::find($semester_id);
		// dd($semester->ten_hoc_ki);
		if(sizeof($request->search)){
			$search = trim($request->search);
			$company_accepts = Company::where('status',1)
			->where('hocky',$semester->ten_hoc_ki)
			->where('name','like','%'.$search.'%')
			->paginate(15);
			return view('admin.index',compact('semester_id','search','company_accepts'));
		}else{
			$search = false;
			$company_accepts = Company::where('status',1)
			->where('hocky',$semester->ten_hoc_ki)
			->paginate(15);
			return view('admin.index',compact('semester_id','company_accepts','search'));
		}
	}

	public function findCompanyRequest(Request $request){
		// dd(1);
		if(sizeof($request->semester_id)){
			$semester_id = $request->semester_id;
		}else{
			$semester_id = $this->semester_current->id;
		}
		$semester = Semester::find($semester_id);
		// dd($semester->ten_hoc_ki);
		if(sizeof($request->search)){
			$search = trim($request->search);
			$company_requests = Company::where('status',0)
			->where('hocky',$semester->ten_hoc_ki)
			->where('name','like','%'.$search.'%')
			->paginate(15);
			return view('admin.index',compact('semester_id','search','company_requests'));
		}else{
			$search = false;
			$company_requests = Company::where('status',0)
			->where('hocky',$semester->ten_hoc_ki)
			->paginate(4);
			return view('admin.companyRequest',compact('semester_id','company_requests','search'));
		}

	}

	public function manageSV(Request $request) {
		// dd(1);
		if(sizeof($request->semester_id)){
			$semester_id = $request->semester_id;
		}else{
			$semester_id = $this->semester_current->id;
		}
		if(sizeof($request->search)){
			$search = ($request->search);
			$students = Intership::join('students','interships.student_id','=','students.id')
			->join('users','students.user_id','=','users.id')
			->join('companies','companies.id','=','interships.company_id')
			->join('lecturers','interships.lecturer_id','=','lecturers.id')
			->join('results','interships.result_id','=','results.id')
			->where('interships.status',1)
			->where('users.name','like','%'.$search.'%')
			->orwhere('students.mssv','like','%'.$search.'%')
			->where('interships.semester_id',$semester_id)
			->paginate(15);
		}else{
			$search = false;
			$students = Intership::where('interships.status',1)
			->where('interships.semester_id',$semester_id)
			->paginate(15);
		}
		return view('admin.manage_student',compact('semester_id','students','search'));
	}

	public function assignmentStudent(Request $request){
		$array_students = $request->array_student;
		$congty = $request->congty;
		$semester_current = $this->semester_current;

		$max_student = Company::find($congty)->soLuongSinhVienTT;

		if($max_student>0){
			$count_student_register = Intership::where('company_id',$congty)
			->where('status',1)->count();
			$student_register = sizeof($array_students);
			$total = $count_student_register+$student_register;
			if( $total <= $max_student)
			{
				foreach($array_students as $student){
				$result = new Result;
				$result->save();
				$intership = new Intership;
				$intership->company_id = $congty;
				$intership->semester_id = $semester_current->id;
				$intership->student_id = $student;
				$intership->result_id = $result->id;
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
				$result = new Result;
				$result->save();
				$intership = new Intership;
				$intership->company_id = $congty;
				$intership->semester_id = $semester_current->id;
				$intership->student_id = $student;
				$intership->status = 1;
				$intership->result_id = $result->id;
				$intership->save();
				return 1;
			}
		}
		return $max_student;
	}

	public function editAssignmentStudent(Request $request){
		$array_students = $request->array_student;
		$congty = $request->congty;
		$company = Company::find($congty);
		$semester_current = $this->semester_current;

		$max_student = Company::find($congty)->soLuongSinhVienTT;

		if($max_student>0){
			$count_student_register = Intership::where('company_id',$congty)
			->where('status',1)->count();
			$student_register = sizeof($array_students);
			$total = $count_student_register+$student_register;
			if( $total <= $max_student)
			{
				foreach($array_students as $student){
					Intership::where('student_id',$student)->where('status',1)->where('semester_id',$semester_current->id)->update(['company_id'=>$congty]);
				}
			return [$array_students,$company];
			}else{
				$sinh_vien_co_the_them = $max_student - $count_student_register;
				return response()->json(['error'=>$sinh_vien_co_the_them]);
			}
		}else{
			foreach($array_students as $student){
				Intership::where('student_id',$student)->where('status',1)->where('semester_id',$semester_current->id)->update(['company_id'=>$congty]);
			}
			return [$array_students,$company];
		}
		return $max_student;
	}

	public function assignment_student(Request $request){
		$semester_current = $this->semester_current;
		$listsv1 =  DB::table('interships')
			->join('companies','interships.company_id','=','companies.id')
			->join('students','interships.student_id','=','students.id')
			->join('users','students.user_id','=','users.id')
			->select(DB::raw('group_concat(distinct companies.name separator ",") as tencongty'),'users.name as tensinhvien','interships.student_id as student_id',DB::raw('SUM(interships.status) as sum'))
			->where('interships.semester_id',$semester_current->id)
			->groupBy('interships.student_id')
			->havingRaw('sum < 1')
			->get();
		$listsv2 = DB::table('interships')
			->join('companies','interships.company_id','=','companies.id')
			->join('semesters','interships.semester_id','=','semesters.id')
			->join('students','interships.student_id','=','students.id')
			->join('users','students.user_id','=','users.id')
			->select('users.name as tensinhvien','interships.student_id as student_id',DB::raw('group_concat(distinct companies.name separator ",") as tencongty'),DB::raw('SUM(interships.status) as sum'))
			->where('semesters.ten_hoc_ki',$semester_current->ten_hoc_ki)
			->groupBy('interships.student_id')
			->havingRaw('sum = 5')		
			->get();
		$listsv3 = DB::table('interships')
			->join('semesters','interships.semester_id','=','semesters.id')
			->join('students','interships.student_id','=','students.id')
			->join('users','students.user_id','=','users.id')
			->select('users.name as tensinhvien','interships.student_id as student_id',DB::raw('SUM(interships.status) as sum'))
			->where('semesters.ten_hoc_ki',$semester_current->ten_hoc_ki)
			->groupBy('interships.student_id')
			->havingRaw('sum = 10')
			->get();
		$listCompany = Company::where('status',1)->where('hocky',$semester_current->ten_hoc_ki)->get();
		return view('admin.assignment_student',compact(['listsv1','listsv2','listsv3','listCompany']));
	}

	public function edit_assignment_student(){
		$semester_current = $this->semester_current;
		$students = Intership::where('status',1)->where('semester_id',$semester_current->id)->get();
		$companys = Company::where('status',1)->where('hocky',$semester_current->ten_hoc_ki)->get();
		// dd($students);
		return view('admin.edit_assignment_student',compact('students','companys'));
	}

	public function acceptCompanyRequest(Request $request){
		$id = $request->id;
		$company = Company::findOrFail($id);	
    	$company->status =1;
    	$company->save();
    	MailController::mailAccept($company);

		$users = DB::table('users')->join('leaders','users.id','=','leaders.user_id')->where('company_id',$id)->update(['status'=>1]);
		return 1;
	}

	public function deleteCompany($id){
		$company = Company::find($id);
		$company->delete();
		return 1;
	}

	public function deleteCompanyRequest(Request $request){
		$id = $request->id;		
		$company = Company::find($id);
		$company->delete();
		return 1;
	}

	public function addlecturer(){
		return view('admin.add_lecturer');
	}
	public function addlecturerPost(Request $request){
		$data = $request->data;
		$hocky = $request->hocky;
		foreach ($data as $key => $d) {
			$validator = Validator::make($data[$key],[
				"name"=>"required",
				"email"=>"required|email|unique:users,email",
				"password"=>"required|min:6"
			],[]);
		}
		if(sizeof($data)>0 && $validator->passes()){
			foreach($data as $d){
				$user = new User;
				$user->name = $d['name'];
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

	public function manageLecturer(Request $request){
		if(sizeof($request->semester_id)){
			$semester_id = $request->semester_id;
		}else{
			$semester_id = $this->semester_current->id;
		}
		$semester = Semester::find($semester_id);
		if(sizeof($request->search)){
		$search = $request->search;
		$lecturers = DB::table('lecturers')->join('users','lecturers.user_id','=','users.id')
		->join('interships','lecturers.id','=','interships.lecturer_id')
		->join('companies','companies.id','=','interships.company_id')
		->where('lecturers.hocky','=',$semester->ten_hoc_ki)
		->where('users.status','=',1)
		->where('users.name','like','%'.$request->search.'%')
		->groupBy('interships.lecturer_id')
		->select('lecturers.phone','users.name','users.email',DB::raw('group_concat(distinct companies.name separator ",") as tencongty'))
		->distinct()
		->paginate(20);
		}else{
		$search = false;
		$lecturers = DB::table('lecturers')->join('users','lecturers.user_id','=','users.id')
		->join('interships','lecturers.id','=','interships.lecturer_id')
		->join('companies','companies.id','=','interships.company_id')
		->where('lecturers.hocky','=',$semester->ten_hoc_ki)
		->where('users.status','=',1)
		->groupBy('interships.lecturer_id')
		->select('lecturers.phone','users.name','users.email',DB::raw('group_concat(distinct companies.name separator ",") as tencongty'))
		->distinct()
		->paginate(20);
		}
		// dd($lecturers);
		return view('admin.manage_lecturer',compact('lecturers','semester_id','search'));
	}

	public function thongBao(){

		return view('admin.notice');
	}


	public function createSemester(){

		return view('admin.create_semester');
	}

	public function assignmentLecturer(){
		$semester_current = $this->semester_current;
		$lecturers = DB::table('lecturers')
		->join('users','users.id','=','lecturers.user_id')
		->where('lecturers.hocky','=',$semester_current->ten_hoc_ki)
		->select('users.name as name','users.email as email','lecturers.id as id')
		->get();

		$companies  = DB::table('companies')
		->join('interships','interships.company_id','=','companies.id')
		->select('companies.name',DB::raw('count(interships.status) as sosinhviendangky'),'companies.soLuongSinhVienTT as gioihan','companies.id')
		->where('companies.status',1)
		->where('interships.status','=',1)
		->where('companies.hocky',$semester_current->ten_hoc_ki)
		->groupBy('interships.company_id','interships.lecturer_id')
		// ->havingRaw('sum(interships.lecturer_id)<1')
		->orhavingraw('sum(interships.lecturer_id)=0')
		->get();
		return view('admin.assignment_lecturer',compact('lecturers','companies'));
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
		return redirect()->route('thong-bao')->with('success','Bạn Đã Gửi Thông Báo Thành Công');
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
}
