<?php
/**
 * Created by PhpStorm.
 * User: dat
 * Date: 24/10/2017
 * Time: 22:43
 */

namespace App\Http\Controllers\PM;

use App\Http\Controllers\Controller;
use App\Notice;
use App\Result;
use App\Student_Job_Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\User;
use App\Leader;
use Session;

class PMController extends Controller
{
    public function __construct()
    {
//        Do something!
    }

//    public function index_dat($roll_id)
//    {
//        if ($roll_id == 11) {
//            return view('pm.pm_sv_thongTin')->withTab($roll_id);
//        } elseif ($roll_id == 12) {
//            return view('pm.pm_sv_congViec')->withTab($roll_id);
//        } elseif ($roll_id == 13) {
//            return view('pm.pm_sv_ketQua')->withTab($roll_id);
//        } elseif ($roll_id == 2) {
//            return view('pm.pm_index_nv')->withTab($roll_id);
//        } elseif ($roll_id == 21) {
//            return view('pm.pm_nv_thongTin')->withTab($roll_id);
//        } elseif ($roll_id == 22) {
//            return view('pm.pm_nv_svhd')->withTab($roll_id);
//        } elseif ($roll_id == 3) {
//            return view('pm.pm_index_baiViet')->withTab($roll_id);
//        } elseif ($roll_id == 4) {
//            return view('pm.pm_guithongBao')->withTab($roll_id);
//        } else {
//            $sv = Student::sortable()->paginate(10);
//            return view('pm.pm_index_sv')->withTab(1)->withSv($sv);
//        }
//    }

    public function indexSV(Request $request)
    {

        $semesters = array(20163, 20171, 20172);
        if (sizeof($request->input('semester'))) {
            $idSemester = $request->input('semester');
        } else {
            $idSemester = 20171;
        }
//        $idCompany = rand(1, 3);

        if (sizeof($request->input('pagiNum'))) {
            $pagiNum = $request->input('pagiNum');
        } else {
            $pagiNum = 10;
        }

        $company_id = 2;
        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->join('interships', 'students.user_id', '=', 'interships.student_id')
                ->where([['users.name', 'like', '%' . $search . '%']
                    , ['interships.company_id', '=', $company_id]
                    , ['interships.semester_id', '=', $idSemester]])
                ->sortable()->paginate($pagiNum);
            if (count($students) == 0) {
                $students = Student::join('interships', 'students.user_id', '=', 'interships.student_id')
                    ->where([['students.MSSV', 'like', '%' . $search . '%']
                        , ['interships.company_id', '=', $company_id]
                        , ['interships.semester_id', '=', $idSemester]])
                    ->sortable()->paginate($pagiNum);
            }
            $isSearch = true;
        } else {
            $students = Student::join('interships', 'students.user_id', '=', 'interships.student_id')
                ->where([['interships.company_id', '=', $company_id]
                    , ['interships.semester_id', '=', $idSemester]])
                ->sortable()->paginate($pagiNum);
            $isSearch = false;
        }
        return view('pm.pm_index_sv', ['selectedPag' => $pagiNum,'semesters' => $semesters, 'selectedSem' => $idSemester, 'isSearch' => $isSearch, 'students' => $students, 'tab' => 1]);
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
            ->sortable()->paginate(10);

        return view('sv.sv_congViec', ['jobs' => $jobs, 'tab' => 12, 'student' => $student, 'userType' => 'pm']);
    }

    public function showSVKetQua($idSV)
    {
        $student = Student::find($idSV);
        $result = Result::find($idSV);
        if (sizeof($result) == 0)
        {
            $result = new Result();
        }

        return view('sv.sv_ketQua', ['result' => $result, 'tab' => 13, 'student' => $student, 'userType' => 'pm']);
    }

    public function indexNV(Request $request)
    {
        if (sizeof($request->input('name'))) {
            $search = $request->input('name');
            $leaders = Leader::join('users', 'leaders.user_id', '=', 'users.id')
                ->where('users.name', 'like', '%' . $search . '%')
                ->sortable()->paginate(10);
            $isSearch = true;
        } else {
            $leaders = Leader::sortable()->paginate(10);
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
                ->sortable()->paginate(10);
            $isSearch = true;
        } else {
            $manaStus = Student::where('students.tenNVPhuTrach', '=', $leader->user->name)
                ->sortable()->paginate(10);
            $isSearch = false;
        }

        return view('pm.pm_nv_svhd', ['isSearch' => $isSearch, 'tab' => 22, 'leader' => $leader, 'manaStus' => $manaStus]);
    }

    public function getPhanCong(Request $request)
    {
        if (sizeof($request->input('pagiNum'))) {
            $pagiNum = $request->input('pagiNum');
        } else {
            $pagiNum = 10;
        }
        // Current Semester get from the system time or from the request
        $currentSem = 20171;
        // idCompany get form current PM being login
//        $idCompany = rand(1, 3);
        $company_id = 2;
        $leaders = Leader::join('users', 'leaders.user_id', '=', 'users.id')
            ->where([['users.level', '=', 2]
                , ['leaders.idCompany', '=', $company_id]])->get();
        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->join('interships', 'students.user_id', '=', 'interships.student_id')
                ->where([['users.name', 'like', '%' . $search . '%']
                    , ['interships.company_id', '=', $company_id]
                    , ['interships.semester_id', '=', $currentSem]])
                ->sortable()->paginate($pagiNum);

            if (count($students) == 0) {
                $students = Student::join('users', 'students.user_id', '=', 'users.id')
                    ->join('interships', 'students.user_id', '=', 'interships.student_id')
                    ->where([['students.MSSV', 'like', '%' . $search . '%']
                        , ['interships.company_id', '=', $company_id]
                        , ['interships.semester_id', '=', $currentSem]])
                    ->sortable()->paginate($pagiNum);
            }

            $isSearch = true;
        } else {
            $students = Student::join('interships', 'students.user_id', '=', 'interships.student_id')
                ->where([['interships.company_id', '=', $company_id]
                    , ['interships.semester_id', '=', $currentSem]])->sortable()->paginate($pagiNum);
            $isSearch = false;
        }
        return view('pm.pm_index_phanCong', ['selectedPag' => $pagiNum, 'isSearch' => $isSearch, 'leaders' => $leaders, 'students' => $students, 'tab' => 3]);
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

    public function getGuiTB(Request $request)
    {
        $receUsers = ['Tất cả sinh viên', 'Tất cả leader'];
        return view('layouts.guiThongBao', ['tab' => 4, 'receUsers' => $receUsers, 'userType' => 'pm']);
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
//        $pmID = 220;
//        $notices = Notice::where('ma_nguoi_nha', '=', $pmID)->paginate(10);
        $notices = [];
        return view('layouts.thongBao', ['notices' => $notices,'userType' => 'pm']);
    }

    public function chiTietTB($noti_id){
        $noti = Notice::find($noti_id);
        return view('chiTietTB', ['noti' => $noti, 'userType' => 'pm']);
    }
}