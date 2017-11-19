<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // public function __construct(){
    
    //     $this->DangNhap();
   
    // }
    // public function DangNhap(){
    //     if(Auth::check())
    // {
    //     view()::share('user_login',Auth::user()->student);
    //     console.log(Auth::user()->student->lop);
    // }
//}

}
