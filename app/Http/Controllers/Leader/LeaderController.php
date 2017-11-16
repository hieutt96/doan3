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
use App\Student_Job_Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\User;
use App\Leader;

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
        return view('leader.leader_taoCV', ['leader' => $leader, 'isSearch' => $isSearch, 'students' => $students, 'tab' => 3]);
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
            $stu_job->trang_thai = 1;
            $stu_job->save();
        }
        return back();
    }
//
//    public function daPhanCong(Request $request)
//    {
//        $leaders = User::where('level', '=', 2)->get();
//        if (sizeof($request->input('name'))) {
//            $search = $request->input('name');
//            $students = Student::join('users', 'students.user_id', '=', 'users.id')
//                ->where([['idNVPhuTrach', '<>', NULL], ['users.name', 'like', '%' . $search . '%']])
//                ->sortable()->simplePaginate(10);
//            $isSearch = true;
//
//        } else {
//            $students = Student::where('idNVPhuTrach', '<>', NULL)->sortable()->simplePaginate(10);
//            $isSearch = false;
//
//        }
//        return view('pm.pm_index_daPhanCong', ['isSearch' => $isSearch, 'leaders' => $leaders, 'students' => $students, 'tab' => 51]);
//    }
}