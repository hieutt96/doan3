<?php
/**
 * Created by PhpStorm.
 * User: dat
 * Date: 24/10/2017
 * Time: 22:58
 */

namespace App\Http\Controllers\GVHD;

use App\Http\Controllers\Controller;

class GVHDController extends Controller{
    public function __construct()
    {
//        Do something
    }

    // 	Dat add ham index chi show giao dien GVHD chua có sử lý back end
    public function index_dat($roll_id)
    {
        if($roll_id == 1) {
            return view('gvhd.gvhd_index_sv')->withTab($roll_id);
        } elseif($roll_id == 11) {
            return view('gvhd.gvhd_sv_thongTin')->withTab($roll_id);
        } elseif($roll_id == 12) {
            return view('gvhd.gvhd_sv_congViec')->withTab($roll_id);
        } elseif($roll_id == 13) {
            return view('gvhd.gvhd_sv_ketQua')->withTab($roll_id);
        } elseif($roll_id == 2) {
            return view('gvhd.gvhd_index_cty')->withTab($roll_id);
        } elseif($roll_id == 31) {
            return view('gvhd.gvhd_index_daDanhGia')->withTab($roll_id);
        } elseif($roll_id == 32) {
            return view('gvhd.gvhd_index_chuaDanhGia')->withTab($roll_id);
        } elseif($roll_id == 4) {
            return view('gvhd.gvhd_index_thongBao')->withTab($roll_id);
        } elseif($roll_id == 5) {
            return view('gvhd.gvhd_guiThongBao')->withTab($roll_id);
        }
    }
}