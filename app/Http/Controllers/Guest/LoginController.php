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
    public function __construct()
    {
		$this->middleware('guest')->except('logout');
		view()->share('student',Auth::user());
    }
    public function getLogin(){
    	return view('auth.login');
    }
    public function postLogin(LoginRequest $request){
    	$user = [
    		'email' => $request->email,
    		'password'=> $request->password,
            'status' => 1
		];
		//dd($user);
    	if(Auth::attempt($user)){
    		if(Auth::user()->level == 1){
    			return redirect('/');
    		}elseif(Auth::user()->level == 2){
    			return redirect('/');
    		}elseif(Auth::user()->level == 3){
    			return redirect('/');
    		}elseif(Auth::user()->level == 4){
    			return redirect('/');
    		}elseif(Auth::user()->level ==5){
    			return redirect('/');
    		}else{
    			return redirect('/');
    		}
		}
		else {
		
			return redirect('dang-nhap')->with('invalid','Sai thông tin đăng nhập');
		}
			
	
    }

    public function logout(){
    	Auth::logout();
    	return redirect()->route('dang-nhap');
	}
}
