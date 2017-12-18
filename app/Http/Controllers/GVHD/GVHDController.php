<?php
/**
 * Created by PhpStorm.
 * User: dat
 * Date: 24/10/2017
 * Time: 22:58
 */

namespace App\Http\Controllers\GVHD;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckGVHD;
use App\Http\Request\EvaluationRequest;
use App\Intership;
use App\User;
use App\Notice;
use App\Result;
use App\Semester;
use App\Student_Job_Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Http\Request\ChangePasswordRequest;

class GVHDController extends Controller{
    public function __construct()
    {
//        Do something
        $this->middleware(CheckGVHD::class);

    }

    public function indexSV(Request $request)
    {
        $semesters = Semester::all();

        if (sizeof($request->input('semester'))) {
            $idSemester = $request->input('semester');
        } else {
            $idSemester = 1;
        }

        $orderBy = 'desc';
        if(sizeof($request->input('orderBy'))){
            $orderBy = $request->input('orderBy');
        }

        $gvhd = Auth::user();
        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->join('interships', 'students.id', '=', 'interships.student_id')
                ->where([['users.name', 'like', '%' . $search . '%']
                    , ['students.tenGVPhuTrach', '=', $gvhd->name]
                    , ['interships.semester_id', '=', $idSemester]])
                ->select('students.*', 'interships.company_id')
                ->orderBy('interships.company_id', $orderBy)
                ->sortable()->simplePaginate(10);
            if (count($students) == 0) {
                $students = Student::join('interships', 'students.id', '=', 'interships.student_id')
                    ->where([['students.MSSV', 'like', '%' . $search . '%']
                        , ['students.tenGVPhuTrach', '=', $gvhd->name]
                        , ['interships.semester_id', '=', $idSemester]])
                    ->orderBy('interships.company_id', $orderBy)
                    ->select('students.*', 'interships.company_id')
                    ->sortable()->simplePaginate(10);
            }
            $isSearch = true;
        } else {
            $students = Student::join('interships', 'students.id', '=', 'interships.student_id')
                ->where([['students.tenGVPhuTrach', '=', $gvhd->name]
                    , ['interships.semester_id', '=', $idSemester]])
                ->orderBy('interships.company_id', $orderBy)
                ->select('students.*', 'interships.company_id')
                ->sortable()->simplePaginate(10);
            $isSearch = false;
        }

        $companies = array();
        for ($i = 0; $i < count($students); $i++) {
            $companies[] = Company::join('interships', 'companies.id', '=', 'interships.company_id')
                ->where('interships.student_id', '=', $students[$i]->id)
                ->select('companies.name')
                ->first();
        }

        return view('gvhd.gvhd_index_sv', ['orderBy' => $orderBy, 'companies' => $companies, 'gvhd' => $gvhd, 'semesters' => $semesters, 'selectedSem' => $idSemester, 'isSearch' => $isSearch, 'students' => $students, 'tab' => 1]);
    }

    public function showSVInfo($idSV)
    {
        $student = Student::find($idSV);
        return view('sv.sv_thongTin', ['tab' => 11, 'student' => $student, 'userType' => 'gvhd']);
    }

    public function showSVCongViec(Request $request, $idSV)
    {
        $student = Student::find($idSV);
        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $jobs = Student_Job_Assignment::join('jobs', 'student_job_assignments.job_id', '=', 'jobs.id')
                ->where([['jobs.ten_cong_viec', 'like', '%' . $search . '%']
                    , ['student_job_assignments.student_id', '=', $idSV]])
                ->sortable()->simplePaginate(10);
        } else {
            $jobs = Student_Job_Assignment::where('student_id', '=', $idSV)
                ->sortable()->simplePaginate(10);
        }

        return view('sv.sv_congViec', ['jobs' => $jobs, 'tab' => 12, 'student' => $student, 'userType' => 'gvhd']);
    }

    public function showSVKetQua($idSV)
    {
        $student = Student::find($idSV);
        $result = Result::join('interships', 'results.id', '=', 'interships.result_id')
            ->where('interships.student_id', '=', $idSV)
            ->select('results.*')
            ->first();
        if (sizeof($result) == 0) {
            $result = new Result();
        }


        return view('sv.sv_ketQua', ['result' => $result, 'tab' => 13, 'student' => $student, 'userType' => 'gvhd']);
    }

    public function getDanhGia(Request $request){

        $allhocky = Semester::all();
        $idCurrentSem = 1;
        foreach ($allhocky as $hocky) {
            if ((date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_thuc_tap) && (date('Y-m-d') > $hocky->thoi_gian_dn_bat_dau_dk)) {
                $idCurrentSem = $hocky->id;
                break;
            }
        }

        $gvhd = Auth::user();

        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $students = Student::join('users', 'students.id', '=', 'users.id')
                ->join('interships', 'students.id', '=', 'interships.student_id')
                ->where([['users.name', 'like', '%' . $search . '%']
                    , ['students.tenGVPhuTrach', '=', $gvhd->name]
                    , ['interships.semester_id', '=', $idCurrentSem]])
                ->select('students.*')
                ->sortable()->simplePaginate(10);
            if (count($students) == 0) {
                $students = Student::join('interships', 'students.id', '=', 'interships.student_id')
                    ->where([['students.MSSV', 'like', '%' . $search . '%']
                        , ['students.tenGVPhuTrach', '=', $gvhd->name]
                        , ['interships.semester_id', '=', $idCurrentSem]])
                    ->select('students.*')
                    ->sortable()->simplePaginate(10);
            }
            $isSearch = true;
        } else {
            $students = Student::join('interships', 'students.id', '=', 'interships.student_id')
                ->where([['students.tenGVPhuTrach', '=', $gvhd->name]
                    , ['interships.semester_id', '=', $idCurrentSem]])
                ->select('students.*')
                ->sortable()->simplePaginate(10);
            $isSearch = false;
        }

        $results = array();

        for ($i = 0; $i < count($students); $i++) {
            $results[] = Result::join('interships', 'results.id', '=', 'interships.result_id')
                                ->where('interships.student_id', '=', $students[$i]->id)
                                ->select('results.*')
                                ->first();
        }

        return view('gvhd.gvhd_danhGia', ['results' => $results, 'isSearch' => $isSearch, 'students' => $students, 'tab' => 2]);

    }

    public function postDanhGia(Request $request)
    {
        $this->validate($request, array(
           'rowsCheck' => 'required',
           'diem' => 'required',
           'nhanXetGiangVien' => 'required',
        ));

        $stuIDs = $request->input('rowsCheck');
        foreach ($stuIDs as $stuID) {
            $intership = Intership::where('student_id', '=', $stuID)->first();

            $result = Result::find($intership->result_id);
//                dd($result->nhan_xet_cong_ty);
            if (count($result) == 0) {
                $result = new Result();
                $result->save();
                $intership->result_id = $result->id;
                $intership->save();
            }

//                dd($result->nhan_xet_cong_ty);
            $result->diem = $request->input('diem');
            $result->nhan_xet_nha_truong = $request->input('nhanXetGiangVien');
            $result->save();
        }
        return back();
    }

    public function getGuiTB(Request $request)
    {
        return view('layouts.guiThongBao', ['tab' => 4, 'userType' => 'gvhd']);
    }

    public function postGuiTB(Request $request)
    {
        $this->validate($request, array(
            'tenTB' => 'required',
            'noiDung' => 'required'
        ));
        $sentID = $request->input('nguoiGui');
        $receID = $request->input('nguoiNhan');
        $name = $request->input('tenTB');
        $content = $request->input('noiDung');

        $notice = new Notice();
        $notice->user_id = $sentID;
        $notice->ma_nguoi_nhan = $receID;
        $notice->tieu_de = $name;
        $notice->noi_dung = $content;
        $notice->save();

        return back();
    }

    public function getThongBao()
    {

        $admins = User::where('level', 4)->first();
        $revNotices = Notice::where([['ma_nguoi_nhan', '=', 1]
            , ['user_id', '=', $admins->id]])->paginate(5);
        $sendNotices = Notice::where('user_id', Auth::user()->id)->paginate(5);
        return view('layouts.thongBao', ['tab' => 3,'sendNotices' => $sendNotices,'revNotices' => $revNotices,'userType' => 'gvhd']);
    }

    public function chiTietTB($noti_id)
    {
        $noti = Notice::find($noti_id);
        return view('layouts.chiTietTB', ['tab' => 3, 'noti' => $noti, 'userType' => 'gvhd']);
    }


    public function getChangePass(){
        return view('layouts.company_thayMK', ['userType' => 'gvhd']);
    }

    public function postChangePass(ChangePasswordRequest $request){
        $sinhvien = Auth::user();
        $sinhvien->password = bcrypt($request->re_password);
        $sinhvien->save();
        return back()->with('thongbao','Mật khẩu mới đã được cập nhật thành công');
    }
}