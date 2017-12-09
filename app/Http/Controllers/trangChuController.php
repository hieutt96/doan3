<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\Company;
class trangChuController extends Controller
{
    function __construct(){
       //Thông báo ngoài giao diện trang chủ
        $notice_home =Notice::orderBy('created_at', 'desc')->paginate(7);
        view()->share('notice_home',$notice_home);
        $doanhnghiep = Company::orderByRaw('RAND()')->take(3)->get();//thay đổi param in take() khi có dữ liệu
        view()->share('dn_khac',$doanhnghiep);
    }
    
    function trangchu(){
        return view('guest.home');
    }
}
