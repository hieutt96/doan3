<?php

namespace App\Http\Controllers;

use App\Leader;
use Illuminate\Http\Request;
use App\Http\Request\UpdateInfoSvRequest;
use App\Http\Request\ChangePasswordRequest;
use App\Student;
use App\Comment;
use App\Company;
use App\User;
use App\Job;
use App\Student_Job_Assignment;
use App\Notice;
use Auth;
use File;
use App\Semester;
use App\Intership;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Result;
use View;
use Illuminate\Support\Collection;

class StudentController extends Controller
{
    protected $semesters;
    protected $semester_current;

    public function __construct(){
        $semesters = Semester::all();
        $this->semesters = $semesters;
        foreach($semesters as $semester){
            if((date('Y-m-d') < $semester->thoi_gian_sv_ket_thuc_thuc_tap) &&(date('Y-m-d')>$semester->thoi_gian_dn_bat_dau_dk) ){
                $semester_current = $semester;
            }
        }
        $this->semester_current = $semester_current;
        View::share('semesters',$semesters);
        View::share('semester_current',$semester_current);
    }

    public function hopTacDoanhNghiep(Request $request)
    {
        if(sizeof($request->semester)){
            $semester = Semester::findOrFail($request->semester);
        }else{
            $semester = $this->semester_current;
        }
        if(sizeof($request->search)){
            $search = trim($request->search);
            $companys = Company::where('status',1)
            ->where('hocky',$semester->ten_hoc_ki)
            ->where('name','like', '%'.$search.'%')
            ->paginate(20);
        }else{
            $search = false;
            $companys = Company::where('status',1)
            ->where('hocky',$semester->ten_hoc_ki)
            ->paginate(20);
        }
        return view('student.hopTacDoanhNghiep',compact('semester','search','companys'));
    }

    public function chiTietDoanhNghiep($id)
    {
        $company = Company::find($id);
        $doanhnghiepkhac = Company::orderByRaw('RAND()')->where('id', '!=', $id)->take(3)->get();
        $comments = Comment::where('company_id', '=', $id)->get();
        return view('student.chiTietDoanhNghiep', ['company' => $company, 'dn_khac' => $doanhnghiepkhac, 'comments' => $comments]);
    }

    public function lienHeNhaTruong()
    {
        return view('student.lienHeNhaTruong');
    }

    public function comment(Request $request){
        $user = User::findOrFail($request->user_id);
        $comment = new Comment;
        $comment->user_id = $request->user_id;
        $comment->company_id = $request->company_id;
        $comment->noi_dung = ($request->comment);
        $comment->save();
        return [$user,$comment];
    }

    public function findcomment(Request $request){
        $id = $request->id;
        $comment = Comment::find($id);
        return $comment;
    }

    public function editcomment(Request $request){
        $id = $request->id;
        $noi_dung = $request->comment;
        $comment = Comment::find($id);
        $comment->noi_dung = $noi_dung;
        $comment->save();
        return $comment;
    }

    public function getChangePassword(){
        return view('user.changepassword');
    }

    public function postChangePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->re_password);
        $user->save();
        return back()->with('thongbao', 'Mật khẩu mới đã được cập nhật thành công');
    }

    public function getStudentInfo()
    {
        $student = Student::where('user_id',Auth::user()->id)->first();
        return view('student.student_Info',compact('student'));
    }

    public function getUpdateStudentInfo()
    {
        return view('student.update_info');
    }

    public function postUpdateStudentInfo(UpdateInfoSvRequest $request)
    {
        $user = Auth::user();
        if ($request->hasFile('anh')) {
            $file = $request->file('anh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('student/update-student-info')->with('loi', 'Bạn
                chỉ được chọn file có đuôi là jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $picture = str_random(4) . "_" . $name;
            while (file_exists("upload/anhsinhvien/" . $picture)) {
                $picture = str_random(4) . "_" . $name;
            }

            //Lưu hình
            $file->move("upload/anhsinhvien", $picture);
            //Xóa ảnh cũ
            if (File::exists("upload/anhsinhvien/" . $user->picture)) {
                File::delete("upload/anhsinhvien/" . $user->picture);
            }
            $user->picture = $picture;
        }
        $user->name = $request->name;
        $user->student->mssv = $request->mssv;
        $user->student->lop = $request->lop;
        $user->student->grade = $request->khoa;
        $user->student->ctdt = $request->ctdt;
        $user->student->gender = $request->gender;
        $user->student->laptop = $request->laptop;
        $user->student->address = $request->diachi;
        $user->student->phone = $request->phone;
        $user->student->CPA = $request->cpa;
        $user->student->TA = $request->english;
        $user->student->knlt_cothesudung = $request->ep1;
        $user->student->knlt_thanhthao = $request->ep2;
        $user->student->knlt_master = $request->ep3;
        $user->student->quan_tri_he_thong = $request->ep4;
        $user->student->Other = $request->ep5;
        $user->student->cty_da_thuc_tap = $request->cty;
        $user->save();
        $user->student->save();
        return redirect("student/update-student-info")->with('thongbao', 'Bạn
       đã cập nhật thành công');
    }

    public function getCongViecThucTap()
    {
        $student = Student::where('user_id', Auth::user()->id)->first();
        $intership = Intership::where('student_id',$student->id)->where('status',1)->first();
        $job_assignment = Student_Job_Assignment::where('student_id', '=', $student->id)->get();
        return view('student.congViecThucTap', compact('student','intership','job_assignment'));
    }

    public function postCongViecThucTap(Request $request)
    {
        $idSV = Auth::user()->id;
        $job_assignment = Student_Job_Assignment::where('student_id', '=', $idSV)->get();
        $job_assignment->id = $request->id;
        $job_assignment->trang_thai = $request->trang_thai;
        $job_assignment->save();
        return back()->with('thongbao', 'Cập nhật công việc thành công !');
    }

    public function getThongBaoPhiaNhaTruong(Request $request)
    {
        $notice_admin = DB::table('users')
            ->join('notices', 'notices.user_id', '=', 'users.id')
            ->where('users.level', 4)
            ->where('notices.ma_nguoi_nhan', 0)
            ->get();

        $notice_gv = DB::table('interships')
            ->join('lecturers', 'interships.lecturer_id', '=', 'lecturers.user_id')
            ->join('notices', 'notices.user_id', '=', 'lecturers.user_id')
            ->join('users', 'users.id', '=', 'notices.user_id')
            ->where('interships.student_id', Auth::user()->id)
            ->where('interships.status', 1)
            ->where('notices.ma_nguoi_nhan', 2)
            ->get();
        foreach ($notice_admin as $notile) {
            $notice_gv->push($notile);
        }
        return view('student.thongBao.thongBaoPhiaNhaTruong', ['notice' => $notice_gv]);

    }

    public function detailIntershipStudent(Request $request){
        $student = Student::find($request->id);
        $intership = Intership::where('status',1)->where('student_id',$student->id)->first();
        $result = Result::findOrFail($intership->result_id);
        return view('student.detail_intership_student',compact('student','intership','result'));
    }


    public function getThongBaoChung()
    {
        $notice = DB::table('users')
            ->join('notices', 'notices.user_id', '=', 'users.id')
            ->where('users.level', 4)
            ->where('notices.ma_nguoi_nhan', 0)
            ->get();
        return view('student.thongBao.thongBaoChung', ['notice' => $notice]);

    }

    public function chiTietThongBaoChung($id)
    {
        $notice = Notice::find($id);
        return view('student.thongBao.chiTietThongBaoChung', ['notice' => $notice]);
    }
     
    public function getThongBaoPhiaDoanhNghiep()
    {
        $notice_leader = DB::table('interships')
            ->join('notices', 'notices.user_id', '=', 'interships.leader_id')
            ->join('users', 'notices.user_id', '=', 'users.id')
            ->where('interships.student_id', Auth::user()->id)
            ->where('interships.status', '=', 1)
            ->where('notices.ma_nguoi_nhan', '=', 2)
            ->get();
        $notice_pm = DB::table('interships')
            ->join('companies', 'companies.id', '=', 'interships.company_id')
            ->join('leaders', 'leaders.company_id', '=', 'companies.id')
            ->join('notices', 'notices.user_id', '=', 'leaders.user_id')
            ->join('users', 'notices.user_id', '=', 'users.id')
            ->where('interships.student_id', Auth::user()->id)
            ->where('interships.status', '=', 1)
            ->where('notices.ma_nguoi_nhan', '=', 2)
            ->get();
        foreach ($notice_leader as $notile) {

            $notice_pm->push($notile);
        }
        return view('student.thongBao.thongBaoPhiaDoanhNghiep', ['notice' => $notice_pm]);
    }

    public function chiTietThongBaoPhiaDoanhNghiep($id)
    {
        $notice = Notice::find($id);
        return view('student.thongBao.chiTietThongBaoPhiaDoanhNghiep', ['notice' => $notice]);
    }

    public function chiTietThongBaoPhiaNhaTruong($id)
    {
        $notice = Notice::find($id);
        return view('student.thongBao.chiTietThongBaoPhiaNhaTruong', ['notice' => $notice]);
    }

    public function timKiemThongBao(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $notice_leader = DB::table('interships')
            ->join('notices', 'notices.user_id', '=', 'interships.leader_id')
            ->join('users', 'users.id', '=', 'notices.user_id')
            ->where('interships.student_id', Auth::user()->id)
            ->where('interships.status', '=', 1)
            ->where('notices.ma_nguoi_nhan', '=', 2)
            ->where('notices.tieu_de', 'like', '%' . $tukhoa . '%')
            ->select('notices.*')
            ->get();

        //pm
        $notice_pm = DB::table('interships')
            ->join('companies', 'companies.id', '=', 'interships.company_id')
            ->join('leaders', 'leaders.company_id', '=', 'companies.id')
            ->join('notices', 'notices.user_id', '=', 'leaders.user_id')
            ->join('users', 'users.id', '=', 'notices.user_id')
            ->where('interships.student_id', Auth::user()->id)
            ->where('interships.status', '=', 1)
            ->where('notices.ma_nguoi_nhan', '=', 2)
            ->where('notices.tieu_de', 'like', '%' . $tukhoa . '%')
            ->select('notices.*')
            ->get();
        //admin
        $notice_admin = DB::table('users')
            ->join('notices', 'notices.user_id', '=', 'users.id')
            ->where('users.level', 4)
            ->where('notices.ma_nguoi_nhan', 0)
            ->where('notices.tieu_de', 'like', '%' . $tukhoa . '%')
            ->select('notices.*')
            ->get();

        //giangvien
        $notice_gv = DB::table('interships')
            ->join('lecturers', 'interships.lecturer_id', '=', 'lecturers.user_id')
            ->join('notices', 'notices.user_id', '=', 'lecturers.user_id')
            ->join('users', 'users.id', '=', 'notices.user_id')
            ->where('interships.student_id', Auth::user()->id)
            ->where('interships.status', 1)
            ->where('notices.ma_nguoi_nhan', 2)
            ->where('notices.tieu_de', 'like', '%' . $tukhoa . '%')
            ->select('notices.*')
            ->get();
        foreach ($notice_admin as $notile) {
            $notice_gv->push($notile);
        }
        foreach ($notice_leader as $notile) {
            $notice_pm->push($notile);
        }
        foreach ($notice_gv as $notile) {
            $notice_pm->push($notile);
        }
        $notice_pm = $notice_pm->sortByDesc('created_at');
        return view('student.thongBao.timKiemThongBao', ['notice' => $notice_pm, 'tukhoa' => $tukhoa]);
    }

    //Tìm kiếm thông báo chung
    public function timKiemThongBaoChung(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $notice = DB::table('users')
            ->join('notices', 'notices.user_id', '=', 'users.id')
            ->where('users.level', 4)
            ->where('notices.ma_nguoi_nhan', 0)
            ->where('notices.tieu_de', 'like', '%' . $tukhoa . '%')
            ->get();
        return view('student.thongBao.timKiemThongBaoChung', ['notice' => $notice, 'tukhoa' => $tukhoa]);

    }



}
