<?php
/**
 * Created by PhpStorm.
 * User: dat
 * Date: 24/10/2017
 * Time: 22:43
 */

namespace App\Http\Controllers\PM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\User;
use App\Leader;
use Illuminate\Support\Facades\Input;

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
        if (sizeof($request->input('name'))) {
            $search = $request->input('name');
            $students = Student::join('users', 'students.id', '=', 'users.id')
                ->where('users.name', 'like', '%' . $search . '%')
                ->sortable()->simplePaginate(10);
            $isSearch = true;
        } else {
            $students = Student::sortable()->simplePaginate(10);
            $isSearch = false;
        }
        return view('pm.pm_index_sv', ['isSearch' => $isSearch, 'students' => $students, 'tab' => 1]);
    }

    public function showSVInfo($idSV)
    {
        $student = Student::find($idSV);
        return view('pm.pm_sv_thongTin', ['tab'=> 11, 'student' => $student]);
    }

    public function chuaPhanCong(Request $request)
    {
        $leaders = User::where('level', '=', 2)->get();
        if (sizeof($request->input('name'))) {
            $search = $request->input('name');
            $students = Student::join('users', 'students.id', '=', 'users.id')
                ->where([['idNVPhuTrach', '=', NULL], ['users.name', 'like', '%' . $search . '%']])
                ->sortable()->simplePaginate(10);
            $isSearch = true;
        } else {
            $students = Student::where('idNVPhuTrach', '=', NULL)->sortable()->simplePaginate(10);
            $isSearch = false;
        }
        return view('pm.pm_index_chuaPhanCong', ['isSearch' => $isSearch, 'leaders' => $leaders, 'students' => $students, 'tab' => 52]);
    }

    public function indexNV(Request $request)
    {
        if (sizeof($request->input('name'))) {
            $search = $request->input('name');
            $leaders = Leader::join('users', 'leaders.id', '=', 'users.id')
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

    public function nvSVHD(Request $request, $idLead)
    {
//        $idLead = $request->input('idLead');
        $leader = Leader::find($idLead);
//        $manaStus = Student::where('idNVPhuTrach', '=', $idLead)->

        if (sizeof($request->input('name'))) {
            $search = $request->input('name');
            $manaStus = Student::join('users', 'students.id', '=', 'users.id')
                ->where([['users.name', 'like', '%' . $search . '%'],
                    ['students.idNVPhuTrach', '=', $idLead]])
                ->sortable()->simplePaginate(10);
            $isSearch = true;
        } else {
            $manaStus = Student::where('students.idNVPhuTrach', '=', $idLead)
                ->sortable()->simplePaginate(10);
            $isSearch = false;
        }

        return view('pm.pm_nv_svhd', ['isSearch' => $isSearch,'tab' => 22, 'leader' => $leader, 'manaStus' => $manaStus]);
    }

    public function phanCong(Request $request)
    {
        $leader_id = $request->input('leaderSelect');
        $students_id = $request->input('rowsCheck');
        foreach ($students_id as $stu_id) {
            $stu = Student::find((int)$stu_id);
            $stu->idNVPhuTrach = (string)$leader_id;
            $stu->save();
        }
        return back();
    }

    public function daPhanCong(Request $request)
    {
        $leaders = User::where('level', '=', 2)->get();
        if (sizeof($request->input('name'))) {
            $search = $request->input('name');
            $students = Student::join('users', 'students.id', '=', 'users.id')
                ->where([['idNVPhuTrach', '<>', NULL], ['users.name', 'like', '%' . $search . '%']])
                ->sortable()->simplePaginate(10);
            $isSearch = true;

        } else {
            $students = Student::where('idNVPhuTrach', '<>', NULL)->sortable()->simplePaginate(10);
            $isSearch = false;

        }
        return view('pm.pm_index_daPhanCong', ['isSearch' => $isSearch, 'leaders' => $leaders, 'students' => $students, 'tab' => 51]);
    }
}