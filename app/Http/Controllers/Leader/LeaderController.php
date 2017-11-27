<?php
/**
 * Created by PhpStorm.
 * User: dat
 * Date: 24/10/2017
 * Time: 22:43
 */

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use App\Job;
use App\Notice;
use App\Result;
use App\Student_Job_Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\User;
use App\Leader;
use function Sodium\add;

class LeaderController extends Controller
{
    public function __construct()
    {
//        Do something!
    }

    public function indexSV(Request $request)
    {
        $semesters = array(20163, 20171, 20172);
        if (sizeof($request->input('semester'))) {
            $idSemester = $request->input('semester');
        } else {
            $idSemester = 20171;
        }
//        $idCompany = rand(1, 3);
//        $idLeader = rand(200, 219);
        $idLeader = 215;
        $leader = Leader::find($idLeader);
        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->join('interships', 'students.user_id', '=', 'interships.student_id')
                ->where([['users.name', 'like', '%' . $search . '%']
                    , ['students.tenNVPhuTrach', '=', $leader->user->name]
                    , ['interships.semester_id', '=', $idSemester]])
                ->sortable()->simplePaginate(10);
            if (count($students) == 0) {
                $students = Student::join('interships', 'students.user_id', '=', 'interships.student_id')
                    ->where([['students.MSSV', 'like', '%' . $search . '%']
                        , ['students.tenNVPhuTrach', '=', $leader->user->name]
                        , ['interships.semester_id', '=', $idSemester]])
                    ->sortable()->simplePaginate(10);
            }
            $isSearch = true;
        } else {
            $students = Student::join('interships', 'students.user_id', '=', 'interships.student_id')
                ->where([['students.tenNVPhuTrach', '=', $leader->user->name]
                    , ['interships.semester_id', '=', $idSemester]])
                ->sortable()->simplePaginate(10);
            $isSearch = false;
        }
        return view('leader.leader_index_sv', ['leader' => $leader, 'semesters' => $semesters, 'selectedSem' => $idSemester, 'isSearch' => $isSearch, 'students' => $students, 'tab' => 1]);
    }

    public function showSVInfo($idSV)
    {
        $student = Student::find($idSV);
        return view('sv.sv_thongTin', ['tab' => 11, 'student' => $student, 'userType' => 'leader']);
    }

    public function showSVCongViec($idSV)
    {
        $student = Student::find($idSV);
        $jobs = Student_Job_Assignment::where('student_id', '=', $idSV)
            ->sortable()->simplePaginate(10);

        return view('sv.sv_congViec', ['jobs' => $jobs, 'tab' => 12, 'student' => $student, 'userType' => 'leader']);
    }

    public function postCapNhatCV(Request $request)
    {
        if (count($request->input('rowsCheck')) > 0)
        {
            $trangThai = $request->input('trangThai');
            $rowsCheck = $request->input('rowsCheck');
            for ($i = 0; $i < count($rowsCheck); $i++)
            {
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
        $result = Result::find($idSV);
        if (sizeof($result) == 0)
        {
            $result = new Result();
        }


        return view('sv.sv_ketQua', ['result' => $result, 'tab' => 13, 'student' => $student, 'userType' => 'leader']);
    }

    public function getTaoCV(Request $request)
    {
        // Current Semester get from the system time or from the request
        $currentSem = 20171;
        // idCompany get form current PM being login
//        $idCompany = rand(1, 3);

//        $idLeader = rand(201, 219);
        $idLeader = 215;

        $leader = Leader::find($idLeader);
        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->join('interships', 'students.user_id', '=', 'interships.student_id')
                ->where([['users.name', 'like', '%' . $search . '%']
                    , ['students.tenNVPhuTrach', '=', $leader->user->name]
                    , ['interships.semester_id', '=', $currentSem]])
                ->sortable()->simplePaginate(10);
            if (count($students) == 0) {
                $students = Student::join('interships', 'students.user_id', '=', 'interships.student_id')
                    ->where([['students.MSSV', 'like', '%' . $search . '%']
                        , ['students.tenNVPhuTrach', '=', $leader->user->name]
                        , ['interships.semester_id', '=', $currentSem]])
                    ->sortable()->simplePaginate(10);
            }
            $isSearch = true;
        } else {
            $students = Student::join('interships', 'students.user_id', '=', 'interships.student_id')
                ->where([['students.tenNVPhuTrach', '=', $leader->user->name]
                    , ['interships.semester_id', '=', $currentSem]])
                ->sortable()->simplePaginate(10);
            $isSearch = false;
        }
        return view('leader.leader_taoCV', ['leader' => $leader, 'isSearch' => $isSearch, 'students' => $students, 'tab' => 2]);
    }

    public function postTaoCV(Request $request)
    {
//        $this->validate($request, array(
//            'noiDung' => 'required',
//            'tgBatDau' => 'required',
//            'tgKetThuc' => 'required',
//            'rowsCheck' => 'required',
//        ));

        $job = new Job();
        $job->ten = $request->input('ten');
        $job->noiDung = $request->input('noiDung');
        $job->tgBatDau = $request->input('tgBatDau');
        $job->tgKetThuc = $request->input('tgKetThuc');
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
        $idSemester = 20171;
        $idLeader = 215;
        $leader = Leader::find($idLeader);
        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->join('interships', 'students.user_id', '=', 'interships.student_id')
                ->where([['users.name', 'like', '%' . $search . '%']
                    , ['students.tenNVPhuTrach', '=', $leader->user->name]
                    , ['interships.semester_id', '=', $idSemester]])
                ->sortable()->simplePaginate(10);
            if (count($students) == 0) {
                $students = Student::join('interships', 'students.user_id', '=', 'interships.student_id')
                    ->where([['students.MSSV', 'like', '%' . $search . '%']
                        , ['students.tenNVPhuTrach', '=', $leader->user->name]
                        , ['interships.semester_id', '=', $idSemester]])
                    ->sortable()->simplePaginate(10);
            }
            $isSearch = true;
        } else {
            $students = Student::join('interships', 'students.user_id', '=', 'interships.student_id')
                ->where([['students.tenNVPhuTrach', '=', $leader->user->name]
                    , ['interships.semester_id', '=', $idSemester]])
                ->sortable()->simplePaginate(10);
            $isSearch = false;
        }

        $totalJobs = array();
        $outDateJobs = array();

        for ($i = 0; $i < count($students); $i++) {
            $totalJobs[] = count($students[$i]->job);
            $outDateJobs[] = count(Student_Job_Assignment::where([['student_id', '=', $students[$i]->user_id]
                , ['trang_thai', '=', 0]])->get());
        }

        return view('leader.leader_danhGia', ['outDateJobs' => $outDateJobs, 'totalJobs' => $totalJobs, 'isSearch' => $isSearch, 'students' => $students, 'tab' => 3]);
    }

    public function postDanhGia(Request $request)
    {

        if (count($request->input('rowsCheck')) > 0) {
            $stuIDs = $request->input('rowsCheck');
            foreach ($stuIDs as $stuID) {
                $result = Result::find($stuID);
                if (count($result) == 0) {
                    $result = new Result();
                    $result->student_id = $stuID;
                }
                $result->nangLucIT = $request->input('nangLucIT');
                $result->ppLamViec = $request->input('ppLamViec');
                $result->nangLucNamBatCV = $request->input('nangLucNamBatCV');
                $result->nangLucQuanLi = $request->input('nangLucQuanLi');
                $result->tiengAnh = $request->input('tiengAnh');
                $result->nangLucLamViecNhom = $request->input('nangLucLamViecNhom');
                $result->danhGiaCongTy = $request->input('danhGiaCongTy');
                $result->nhanXetCongTy = $request->input('nhanXetCongTy');
                $result->save();
            }
        }
        return back();
    }

    public function getGuiTB(Request $request)
    {
        $receUsers = ['Tất cả sinh viên'];
        return view('layouts.guiThongBao', ['tab' => 4, 'receUsers' => $receUsers, 'userType' => 'leader']);
    }

    public function postGuiTB(Request $request)
    {
        $sentID = $request->input('nguoiGui');
        $receID = $request->input('nguoiNhan');
        $name = $request->input('ten');
        $content = $request->input('noiDung');

        $notice = new Notice();
        $notice->user_id = $sentID;
        $notice->ma_nguoi_nhan = $receID;
        $notice->ten_tb = $name;
        $notice->noi_dung = $content;
        $notice->save();

        return back();
    }

    public function getThongBao()
    {
        $leaderID = 215;
        $leader = Leader::find($leaderID);
        $boss = Leader::join('users', 'leaders.user_id', '=', 'users.id')
                        ->where([['users.level', '=', 3]
                                ,['leaders.idCompany', '=', $leader->idCompany]])
                        ->first();
        $notices = Notice::where([['ma_nguoi_nhan', '=', 1], ['user_id', '=', $boss->user_id]])
                        ->get();
//                        ->simplePaginate(10);
        return view('layouts.thongBao', ['notices' => $notices, 'userType' => 'leader']);
    }

    public function chiTietTB($noti_id){
        $noti = Notice::find($noti_id);
        return view('layouts.chiTietTB', ['noti' => $noti, 'userType' => 'leader']);
    }
}