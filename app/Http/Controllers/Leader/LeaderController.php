<?php
/**
 * Created by PhpStorm.
 * User: dat
 * Date: 24/10/2017
 * Time: 22:43
 */

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckLeader;
use App\Http\Request\EvaluationRequest;
use App\Intership;
use App\Job;
use App\Notice;
use App\Result;
use App\Semester;
use App\Student_Job_Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Leader;
use App\Http\Request\ChangePasswordRequest;

class LeaderController extends Controller
{
    public function __construct()
    {
//        Do something!
        $this->middleware(CheckLeader::class);
    }

    public function indexSV(Request $request)
    {
        $semesters = Semester::all();

        if (sizeof($request->input('semester'))) {
            $idSemester = $request->input('semester');
        } else {
            $idSemester = 1;
            foreach ($semesters as $hocky) {
                if ((date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_thuc_tap) && (date('Y-m-d') > $hocky->thoi_gian_dn_bat_dau_dk)) {
                    $idSemester = $hocky->id;
                    break;
                }
            }
        }

        $leader = Auth::user();
        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->join('interships', 'students.id', '=', 'interships.student_id')
                ->where([['users.name', 'like', '%' . $search . '%']
                    , ['students.tenNVPhuTrach', '=', $leader->name]
                    , ['interships.semester_id', '=', $idSemester]])
                ->select('students.*')
                ->sortable()->simplePaginate(10);
            if (count($students) == 0) {
                $students = Student::join('interships', 'students.id', '=', 'interships.student_id')
                    ->where([['students.MSSV', 'like', '%' . $search . '%']
                        , ['students.tenNVPhuTrach', '=', $leader->name]
                        , ['interships.semester_id', '=', $idSemester]])
                    ->select('students.*')
                    ->sortable()->simplePaginate(10);
            }
            $isSearch = true;
            return view('leader.leader_index_sv', ['search' => $search, 'leader' => $leader, 'semesters' => $semesters, 'selectedSem' => $idSemester, 'isSearch' => $isSearch, 'students' => $students, 'tab' => 1]);

        } else {
            $students = Student::join('interships', 'students.id', '=', 'interships.student_id')
                ->where([['students.tenNVPhuTrach', '=', $leader->name]
                    , ['interships.semester_id', '=', $idSemester]])
                ->select('students.*')
                ->sortable()->simplePaginate(10);
            $isSearch = false;
            return view('leader.leader_index_sv', ['leader' => $leader, 'semesters' => $semesters, 'selectedSem' => $idSemester, 'isSearch' => $isSearch, 'students' => $students, 'tab' => 1]);

        }
    }

    public function showSVInfo($idSV)
    {
        $student = Student::find($idSV);
        return view('sv.sv_thongTin', ['tab' => 11, 'student' => $student, 'userType' => 'leader']);
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
            $isSearch = true;
            return view('sv.sv_congViec', ['isSearch' => $isSearch, 'search' => $search, 'jobs' => $jobs, 'tab' => 12, 'student' => $student, 'userType' => 'leader']);

        } else {
            $jobs = Student_Job_Assignment::where('student_id', '=', $idSV)
                ->sortable()->simplePaginate(10);
            $isSearch = true;
            return view('sv.sv_congViec', ['isSearch' => $isSearch, 'jobs' => $jobs, 'tab' => 12, 'student' => $student, 'userType' => 'leader']);

        }

    }

    public function postCapNhatCV(Request $request)
    {
        if (count($request->input('rowsCheck')) > 0) {
            $trangThai = $request->input('trangThai');
            $rowsCheck = $request->input('rowsCheck');
            for ($i = 0; $i < count($rowsCheck); $i++) {
                $jobStu = Student_Job_Assignment::find($rowsCheck[$i]);
                $jobStu->trang_thai = $trangThai;
                $jobStu->save();
            }
        }

        return back();
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


        return view('sv.sv_ketQua', ['result' => $result, 'tab' => 13, 'student' => $student, 'userType' => 'leader']);
    }

    public function getTaoCV(Request $request)
    {
        // Current Semester
        $allhocky = Semester::all();
        $idCurrentSem = 1;
        foreach ($allhocky as $hocky) {
            if ((date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_thuc_tap) && (date('Y-m-d') > $hocky->thoi_gian_dn_bat_dau_dk)) {
                $idCurrentSem = $hocky->id;
                break;
            }
        }

        $leader = Auth::user();
        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->join('interships', 'students.id', '=', 'interships.student_id')
                ->where([['users.name', 'like', '%' . $search . '%']
                    , ['students.tenNVPhuTrach', '=', $leader->name]
                    , ['interships.semester_id', '=', $idCurrentSem]])
                ->select('students.*')
                ->sortable()->simplePaginate(10);
            if (count($students) == 0) {
                $students = Student::join('interships', 'students.id', '=', 'interships.student_id')
                    ->where([['students.MSSV', 'like', '%' . $search . '%']
                        , ['students.tenNVPhuTrach', '=', $leader->name]
                        , ['interships.semester_id', '=', $idCurrentSem]])
                    ->select('students.*')
                    ->sortable()->simplePaginate(10);
            }
            $isSearch = true;
            return view('leader.leader_taoCV', ['search' => $search, 'leader' => $leader, 'isSearch' => $isSearch, 'students' => $students, 'tab' => 2]);

        } else {
            $students = Student::join('interships', 'students.id', '=', 'interships.student_id')
                ->where([['students.tenNVPhuTrach', '=', $leader->name]
                    , ['interships.semester_id', '=', $idCurrentSem]])
                ->select('students.*')
                ->sortable()->simplePaginate(10);
            $isSearch = false;
            return view('leader.leader_taoCV', ['leader' => $leader, 'isSearch' => $isSearch, 'students' => $students, 'tab' => 2]);

        }
    }

    public function postTaoCV(Request $request)
    {
        $this->validate($request, array(
            'noiDung' => 'required',
            'tgBatDau' => 'required|date',
            'tgKetThuc' => 'required|date|after:tgBatDau',
            'rowsCheck' => 'required',
        ));

        $job = new Job();
        $job->ten_cong_viec = $request->input('ten');
        $job->noi_dung_chi_tiet = $request->input('noiDung');
        $job->thoi_gian_bat_dau = $request->input('tgBatDau');
        $job->thoi_gian_ket_thuc = $request->input('tgKetThuc');
        $job->leader_id = $request->input('idLeader');
        $job->save();

        $students_id = $request->input('rowsCheck');
        foreach ($students_id as $stu_id) {
            $stu_job = new Student_Job_Assignment();
            $stu_job->job_id = $job->id;
            $stu_job->student_id = $stu_id;
            $stu_job->trang_thai = 0;
            $stu_job->save();
        }
        return back();
    }

    public function getDanhGia(Request $request)
    {
        // Current Semester
        $allhocky = Semester::all();
        $idCurrentSem = 1;
        foreach ($allhocky as $hocky) {
            if ((date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_thuc_tap) && (date('Y-m-d') > $hocky->thoi_gian_dn_bat_dau_dk)) {
                $idCurrentSem = $hocky->id;
                break;
            }
        }

        $leader = Auth::user();

        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->join('interships', 'students.id', '=', 'interships.student_id')
                ->where([['users.name', 'like', '%' . $search . '%']
                    , ['students.tenNVPhuTrach', '=', $leader->name]
                    , ['interships.semester_id', '=', $idCurrentSem]])
                ->select('students.*')
                ->sortable()->simplePaginate(10);
            if (count($students) == 0) {
                $students = Student::join('interships', 'students.id', '=', 'interships.student_id')
                    ->where([['students.MSSV', 'like', '%' . $search . '%']
                        , ['students.tenNVPhuTrach', '=', $leader->name]
                        , ['interships.semester_id', '=', $idCurrentSem]])
                    ->select('students.*')
                    ->sortable()->simplePaginate(10);
            }
            $isSearch = true;
            $totalJobs = array();
            $outDateJobs = array();
            for ($i = 0; $i < count($students); $i++) {
                $totalJobs[] = count($students[$i]->student_job_assignment);
                $outDateJobs[] = count(Student_Job_Assignment::where([['student_id', '=', $students[$i]->id]
                    , ['trang_thai', '=', 0]])->get());
            }
            return view('leader.leader_danhGia', ['search' => $search, 'outDateJobs' => $outDateJobs, 'totalJobs' => $totalJobs, 'isSearch' => $isSearch, 'students' => $students, 'tab' => 3]);

        } else {
            $students = Student::join('interships', 'students.id', '=', 'interships.student_id')
                ->where([['students.tenNVPhuTrach', '=', $leader->name]
                    , ['interships.semester_id', '=', $idCurrentSem]])
                ->select('students.*')
                ->sortable()->simplePaginate(10);
            $isSearch = false;
            $totalJobs = array();
            $outDateJobs = array();
            for ($i = 0; $i < count($students); $i++) {
                $totalJobs[] = count($students[$i]->student_job_assignment);
                $outDateJobs[] = count(Student_Job_Assignment::where([['student_id', '=', $students[$i]->id]
                    , ['trang_thai', '=', 0]])->get());
            }
            return view('leader.leader_danhGia', ['outDateJobs' => $outDateJobs, 'totalJobs' => $totalJobs, 'isSearch' => $isSearch, 'students' => $students, 'tab' => 3]);
        }

    }

    public function postDanhGia(EvaluationRequest $request)
    {

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


            $result->nang_luc_it = $request->input('nangLucIT');
            $result->phuong_phap_lam_viec = $request->input('ppLamViec');
            $result->nang_luc_nam_bat_cv = $request->input('nangLucNamBatCV');
            $result->nang_luc_quan_li = $request->input('nangLucQuanLi');
            $result->tieng_anh = $request->input('tiengAnh');
            $result->nang_luc_lam_viec_nhom = $request->input('nangLucLamViecNhom');
            $result->danh_gia_cua_cong_ty = $request->input('danhGiaCongTy');
            $result->nhan_xet_cong_ty = $request->input('nhanXetCongTy');
            $result->save();
        }
        return back();
    }

    public function getGuiTB()
    {
        return view('layouts.guiThongBao', ['tab' => 5, 'userType' => 'leader']);
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

        $company_id = Auth::user()->leader->company_id;
        $boss = Leader::join('users', 'leaders.user_id', '=', 'users.id')
            ->where([['users.level', '=', 2]
                , ['leaders.company_id', '=', $company_id]])
            ->first();
        $revNotices = Notice::where([['ma_nguoi_nhan', '=', 1], ['user_id', '=', $boss->id]])
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $sendNotices = Notice::where('user_id', Auth::user()->id)->paginate(5);

        return view('layouts.thongBao', ['tab' => 4, 'sendNotices' => $sendNotices, 'revNotices' => $revNotices, 'userType' => 'leader']);
    }

    public function chiTietTB($noti_id)
    {
        $noti = Notice::find($noti_id);
        return view('layouts.chiTietTB', ['tab' => 4, 'noti' => $noti, 'userType' => 'leader']);
    }

    public function getChangePass()
    {
        return view('layouts.company_thayMK', ['userType' => 'leader']);
    }

    public function postChangePass(ChangePasswordRequest $request)
    {
        $sinhvien = Auth::user();
        $sinhvien->password = bcrypt($request->re_password);
        $sinhvien->save();
        return back()->with('thongbao', 'Mật khẩu mới đã được cập nhật thành công');
    }

}