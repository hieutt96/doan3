<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\Company;
class trangChuController extends Controller
{
    function __construct(){

        $notice_home =Notice::orderBy('created_at', 'desc')->get();

        view()->share('notice_home',$notice_home);

        $doanhnghiep = Company::orderByRaw('RAND()')->take(3)->get();

        view()->share('dn_khac',$doanhnghiep);
    }
    
    function trangchu(){
        return view('guest.home');
    }
}
