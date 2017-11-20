<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Request\LoginRequest;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
    	if(Auth::attempt($user)){
            $a = Auth::user()->level;
            switch ($a) {
                case 1:
                    return redirect('/');
                case 2:
                    return redirect('/');
                case 3:
                    return redirect('/');
                case 4:
                    return redirect()->route('admin-dashboard');
                case 5:
                    return redirect('/');
            }
    	}
    	return redirect('dang-nhap')->with('invalid','Sai thông tin đăng nhập');
    }

    public function logout(){
    	Auth::logout();
    	return redirect()->route('dang-nhap');
    }
}
