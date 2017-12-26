<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\Company;
class trangChuController extends Controller
{
    function __construct(){

        $notices =Notice::where('ma_nguoi_nhan',0)->orderBy('created_at', 'desc')->get();

        view()->share('notices',$notices);

        $doanhnghiep = Company::orderByRaw('RAND()')->take(3)->get();

        view()->share('dn_khac',$doanhnghiep);
    }
    
    function trangchu(){
        return view('guest.home');
    }
}
