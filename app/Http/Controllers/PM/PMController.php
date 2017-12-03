<?php
/**
 * Created by PhpStorm.
 * User: dat
 * Date: 24/10/2017
 * Time: 22:43
 */

namespace App\Http\Controllers\PM;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPM;
use App\Notice;
use App\Result;
use App\Semester;
use App\Student_Job_Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\User;
use App\Leader;


class PMController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPM::class);
    }


    public function indexSV(Request $request)
    {
        $semesters = Semester::all();
        if (sizeof($request->input('semester'))) {
            $idSemester = $request->input('semester');
        } else {
            $idSemester = 1;
        }

        if (sizeof($request->input('pagiNum'))) {
            $pagiNum = $request->input('pagiNum');
        } else {
            $pagiNum = 10;
        }

        $company_id = Auth::user()->leader->company_id;
        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->join('interships', 'students.id', '=', 'interships.student_id')
                ->where([['users.name', 'like', '%' . $search . '%']
                    , ['interships.company_id', '=', $company_id]
                    , ['interships.semester_id', '=', $idSemester]])
                ->select('students.*')
                ->sortable()->paginate($pagiNum);
            if (count($students) == 0) {
                $students = Student::join('interships', 'students.id', '=', 'interships.student_id')
                    ->where([['students.MSSV', 'like', '%' . $search . '%']
                        , ['interships.company_id', '=', $company_id]
                        , ['interships.semester_id', '=', $idSemester]])
                    ->select('students.*')
                    ->sortable()->paginate($pagiNum);
            }
            $isSearch = true;
        } else {
            $students = Student::join('interships', 'students.id', '=', 'interships.student_id')
                ->where([['interships.company_id', '=', $company_id]
                    , ['interships.semester_id', '=', $idSemester]])
                ->select('students.*')
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

    public function showSVCongViec(Request $request, $idSV)
    {
        $student = Student::find($idSV);
        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $jobs = Student_Job_Assignment::join('jobs', 'student_job_assignments.job_id', '=', 'jobs.id')
                ->where([['jobs.ten_cong_viec', 'like', '%' . $search . '%']
                    ,['student_job_assignments.student_id', '=', $idSV]])
                ->sortable()->simplePaginate(10);
        }else{
            $jobs = Student_Job_Assignment::where('student_id', '=', $idSV)
                ->sortable()->simplePaginate(10);
        }
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

        $company_id = Auth::user()->leader->company_id;

        if (sizeof($request->input('name'))) {
            $search = $request->input('name');
            $leaders = Leader::join('users', 'leaders.user_id', '=', 'users.id')
                ->where([['users.name', 'like', '%' . $search . '%']
                        ,['leaders.company_id', '=', $company_id]
                        ,['users.level', '=', 3]])
                ->sortable()->paginate(10);
            $isSearch = true;
        } else {
            $leaders = Leader::join('users', 'leaders.user_id', '=', 'users.id')
                            ->where([['leaders.company_id', '=', $company_id]
                                    ,['users.level', '=', 3]])
                            ->select('leaders.*', 'users.name', 'users.email')
                            ->sortable()->paginate(10);
            $isSearch = false;
        }
        return view('pm.pm_index_nv', ['isSearch' => $isSearch, 'leaders' => $leaders, 'tab' => 2]);

    }

    public function nvChiTiet($idLead)
    {
        $leader = Leader::find($idLead);
        return view('pm.pm_nv_thongTin', ['tab' => 21, 'leader' => $leader]);
    }

    public function postTaoTK(Request $request){
        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ));

        $company_id = Auth::user()->leader->company_id;

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->picture = $request->input('avatar');
        $user->level = 3;
        $user->status = 1;
        $user->save();

        $leader = new Leader();
        $leader->user_id = $user->id;
        $leader->company_id = $company_id;
        $leader->phone = $request->input('phone');
        $leader->phong_ban = $request->input('phongBan');
        $leader->chuc_vu = $request->input('chucVu');
        $leader->chuyenmon = $request->input('chuyenMon');
        $leader->save();

        return back()->with('thong_bao', 'Tạo Tài Khoản thành công!');
    }

    public function postSuaTK(Request $request)
    {
        $idLeader = $request->input('idLeader');

        $leader = Leader::find($idLeader);
        $leader->phone = $request->input('phone');
        $leader->phong_ban = $request->input('phongBan');
        $leader->chuc_vu = $request->input('chucVu');
        $leader->chuyenmon = $request->input('chuyenMon');
        $leader->save();

        $user = User::find($leader->user_id);
        $user->name = $request->input('name');
        $user->picture = $request->input('avatar');
        $user->save();

        return back();
    }

    public function postXoaTK(Request $request){
        $idLeader = $request->input('idLeader');

        $leader = Leader::find($idLeader);
        $leader->delete();
        $user = User::find($leader->user_id);
        $user->delete();

        return redirect('/pm/nv');

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
        // Current Semester
        $allhocky = Semester::all();
        $idCurrentSem = 1;
        foreach($allhocky as $hocky){
            if((date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_thuc_tap) &&(date('Y-m-d')>$hocky->thoi_gian_dn_bat_dau_dk) ){
                $idCurrentSem = $hocky->id;
                    break;
            }
        }
        // idCompany get form current PM being login
        $company_id = Auth::user()->leader->company_id;

        $leaders = Leader::join('users', 'leaders.user_id', '=', 'users.id')
            ->where([['users.level', '=', 3]
                , ['leaders.company_id', '=', $company_id]])->get();
        if (sizeof($request->input('search'))) {
            $search = $request->input('search');
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->join('interships', 'students.id', '=', 'interships.student_id')
                ->where([['users.name', 'like', '%' . $search . '%']
                    , ['interships.company_id', '=', $company_id]
                    , ['interships.semester_id', '=', $idCurrentSem]])
                ->select('students.*')
                ->sortable()->paginate($pagiNum);

            if (count($students) == 0) {
                $students = Student::join('users', 'students.user_id', '=', 'users.id')
                    ->join('interships', 'students.id', '=', 'interships.student_id')
                    ->where([['students.mssv', 'like', '%' . $search . '%']
                        , ['interships.company_id', '=', $company_id]
                        , ['interships.semester_id', '=', $idCurrentSem]])
                    ->select('students.*')
                    ->sortable()->paginate($pagiNum);
            }

            $isSearch = true;
        } else {
            $students = Student::join('interships', 'students.id', '=', 'interships.student_id')
                ->where([['interships.company_id', '=', $company_id]
                    , ['interships.semester_id', '=', $idCurrentSem]])
                ->select('students.*')
                ->sortable()->paginate($pagiNum);
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
        $name = $request->input('tenTB');
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