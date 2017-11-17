<?php
/**
 * Created by PhpStorm.
 * User: dat
 * Date: 24/10/2017
 * Time: 22:43
 */

namespace App\Http\Controllers\PM;

use App\Http\Controllers\Controller;
use App\Result;
use App\Student_Job_Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\User;
use App\Leader;

class PMController extends Controller
{
    public function __construct()
    {
//        Do something!
    }

    public function index_dat($roll_id)
    {
        if ($roll_id == 11) {
            return view('pm.pm_sv_thongTin')->withTab($roll_id);
        } elseif ($roll_id == 12) {
            return view('pm.pm_sv_congViec')->withTab($roll_id);
        } elseif ($roll_id == 13) {
            return view('pm.pm_sv_ketQua')->withTab($roll_id);
        } elseif ($roll_id == 2) {
            return view('pm.pm_index_nv')->withTab($roll_id);
        } elseif ($roll_id == 21) {
            return view('pm.pm_nv_thongTin')->withTab($roll_id);
        } elseif ($roll_id == 22) {
            return view('pm.pm_nv_svhd')->withTab($roll_id);
        } elseif ($roll_id == 3) {
            return view('pm.pm_index_baiViet')->withTab($roll_id);
        } elseif ($roll_id == 4) {
            return view('pm.pm_guithongBao')->withTab($roll_id);
        } else {
            $sv = Student::sortable()->simplePaginate(10);
            return view('pm.pm_index_sv')->withTab(1)->withSv($sv);
        }
    }

    public function indexSV(Request $request)
    {
        $semesters = array(20163, 20171, 20172);
        if (sizeof($request->input('semester'))) {
            $idSemester = $request->input('semester');
        } else {
            $idSemester = 20171;
        }
        $idCompany = rand(1, 3);
        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->join('interships', 'students.user_id', '=', 'interships.student_id')
                ->where([['users.name', 'like', '%' . $search . '%']
                    , ['interships.company_id', '=', $idCompany]
                    , ['interships.semester_id', '=', $idSemester]])
                ->sortable()->simplePaginate(10);
            if (count($students) == 0) {
                $students = Student::join('interships', 'students.user_id', '=', 'interships.student_id')
                    ->where([['students.MSSV', 'like', '%' . $search . '%']
                        , ['interships.company_id', '=', $idCompany]
                        , ['interships.semester_id', '=', $idSemester]])
                    ->sortable()->simplePaginate(10);
            }
            $isSearch = true;
        } else {
            $students = Student::join('interships', 'students.user_id', '=', 'interships.student_id')
                ->where([['interships.company_id', '=', $idCompany]
                    , ['interships.semester_id', '=', $idSemester]])
                ->sortable()->simplePaginate(10);
            $isSearch = false;
        }
        return view('pm.pm_index_sv', ['semesters' => $semesters, 'selectedSem' => $idSemester, 'isSearch' => $isSearch, 'students' => $students, 'tab' => 1]);
    }

    public function showSVInfo($idSV)
    {
        $student = Student::find($idSV);
        return view('sv.sv_thongTin', ['tab' => 11, 'student' => $student, 'userType' => 'pm']);
    }

    public function showSVCongViec($idSV)
    {
        $student = Student::find($idSV);
        $jobs = Student_Job_Assignment::where('student_id', '=', $idSV)
            ->sortable()->simplePaginate(10);

        return view('sv.sv_congViec', ['jobs' => $jobs, 'tab' => 12, 'student' => $student, 'userType' => 'pm']);
    }

    public function showSVKetQua($idSV)
    {
        $student = Student::find($idSV);
        $result = Result::find($idSV);


        return view('sv.sv_ketQua', ['result' => $result, 'tab' => 13, 'student' => $student, 'userType' => 'pm']);
    }

    public function indexNV(Request $request)
    {
        if (sizeof($request->input('name'))) {
            $search = $request->input('name');
            $leaders = Leader::join('users', 'leaders.user_id', '=', 'users.id')
                ->where('users.name', 'like', '%' . $search . '%')
                ->sortable()->simplePaginate(10);
            $isSearch = true;
        } else {
            $leaders = Leader::sortable()->simplePaginate(10);
            $isSearch = false;
        }
        return view('pm.pm_index_nv', ['isSearch' => $isSearch, 'leaders' => $leaders, 'tab' => 2]);

    }

    public function nvChiTiet($idLead)
    {
        $leader = Leader::find($idLead);
        return view('pm.pm_nv_thongTin', ['tab' => 21, 'leader' => $leader]);
    }

    public function postSuaNV(Request $request)
    {
        $idLeader = $request->input('idLeader');
        $user = User::find($idLeader);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return back();
    }

    public function nvSVHD(Request $request, $idLead)
    {
        $leader = Leader::find($idLead);

        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $manaStus = Student::join('users', 'students.user_id', '=', 'users.id')
                ->where([['users.name', 'like', '%' . $search . '%'],
                    ['students.tenNVPhuTrach', '=', $leader->user->name]])
                ->sortable()->simplePaginate(10);
            $isSearch = true;
        } else {
            $manaStus = Student::where('students.tenNVPhuTrach', '=', $leader->user->name)
                ->sortable()->simplePaginate(10);
            $isSearch = false;
        }

        return view('pm.pm_nv_svhd', ['isSearch' => $isSearch, 'tab' => 22, 'leader' => $leader, 'manaStus' => $manaStus]);
    }

    public function getPhanCong(Request $request)
    {
        // Current Semester get from the system time or from the request
        $currentSem = 20171;
        // idCompany get form current PM being login
        $idCompany = rand(1, 3);

        $leaders = Leader::join('users', 'leaders.user_id', '=', 'users.id')
            ->where([['users.level', '=', 2]
                , ['leaders.idCompany', '=', $idCompany]])->get();
        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->join('interships', 'students.user_id', '=', 'interships.student_id')
                ->where([['users.name', 'like', '%' . $search . '%']
                    , ['interships.company_id', '=', $idCompany]
                    , ['interships.semester_id', '=', $currentSem]])
                ->sortable()->simplePaginate(10);

            if (count($students) == 0) {
                $students = Student::join('users', 'students.user_id', '=', 'users.id')
                    ->join('interships', 'students.user_id', '=', 'interships.student_id')
                    ->where([['students.MSSV', 'like', '%' . $search . '%']
                        , ['interships.company_id', '=', $idCompany]
                        , ['interships.semester_id', '=', $currentSem]])
                    ->sortable()->simplePaginate(10);
            }

            $isSearch = true;
        } else {
            $students = Student::join('interships', 'students.user_id', '=', 'interships.student_id')
                ->where([['interships.company_id', '=', $idCompany]
                    , ['interships.semester_id', '=', $currentSem]])->sortable()->simplePaginate(10);
            $isSearch = false;
        }
        return view('pm.pm_index_phanCong', ['isSearch' => $isSearch, 'leaders' => $leaders, 'students' => $students, 'tab' => 5]);
    }

    public function postPhanCong(Request $request)
    {
        $leader = $request->input('leaderSelect');
        $students_id = $request->input('rowsCheck');
        foreach ($students_id as $stu_id) {
            $stu = Student::find((int)$stu_id);
            $stu->tenNVPhuTrach = (string)$leader;
            $stu->save();
        }
        return back();
    }
}