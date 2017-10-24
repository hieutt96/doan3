<?php
/**
 * Created by PhpStorm.
 * User: dat
 * Date: 24/10/2017
 * Time: 22:43
 */

namespace App\Http\Controllers\PM;

use App\Http\Controllers\Controller;

class PMController extends Controller
{
    public function __construct()
    {
//        Do something!
    }

    public function index_dat($roll_id)
    {
        if ($roll_id == 1) {
            return view('pm.pm_index_sv')->withTab($roll_id);
        } elseif($roll_id == 11) {
            return view('pm.pm_sv_thongTin')->withTab($roll_id);
        } elseif($roll_id == 12) {
            return view('pm.pm_sv_congViec')->withTab($roll_id);
        } elseif($roll_id == 13) {
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
        } elseif ($roll_id == 5) {
            return view('pm.pm_index_phanCong')->withTab($roll_id);
        }
    }
}