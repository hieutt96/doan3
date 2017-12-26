<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Request\LoginRequest;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{


    public function getLogin(){
    	return view('auth.login');
    }
    public function postLogin(LoginRequest $request){
    	$user = [
    		'email' => $request->email,
    		'password'=> $request->password,
            'status' => 1
    	];
        // dd($user);
		//dd($user);
    	if(Auth::attempt($user)){
    		if(Auth::user()->level == 1){//Sinh viên
    			return redirect('/');
    		}elseif(Auth::user()->level == 2){//PM
    			return redirect('/pm/sv');
    		}elseif(Auth::user()->level == 3){//leader
    			return redirect('/leader/sv');
    		}elseif(Auth::user()->level == 4){//Admin
    			return redirect('/admin-dashboard');
    		}elseif(Auth::user()->level ==5){//GV hướng dẫn

                if(Auth::user()->name ==''){
                    return redirect('/lecturer/cap-nhap-thong-tin')->with('loinhac',' Cập Nhập Thông Tin Trước Khi Tiếp Tục');
                }
    			return redirect('/lecturer/manage_student');

    			// return redirect('/gvhd/sv');

    		}else{
    			return redirect('/');//Guest
    		}
		}
		else {
		
			return redirect('dang-nhap')->with('invalid','Sai thông tin đăng nhập');
		}	
    }

    public function logout(){
    	Auth::logout();
    	return redirect("/");
	}
}
