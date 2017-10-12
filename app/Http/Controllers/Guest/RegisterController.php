<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Request\RegisterSVRequest;

use App\Http\Controllers\Controller;

use App\User;
use App\Student;
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getRegisterSV()
    {
    	return view('guest.registersv');
    }

    public function getRegisterDN()
    {
    	return view('guest.registerdn');
    }
    public function postRegisterSV(RegisterSVRequest $request)
    {
    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->level = 1;
    	$user->save();

    	$student = new Student;
    	$student->user_id = $user->id;
    	$student ->hoten = $request->name;
    	$student->lop=$request->class;
    	$student->grade=$request->grade;
    	$student->ctdt=$request->ctdt;
    	$student->bomon=$request->bm;
    	$student->gender = $request->gender;
    	$student->laptop = $request->laptop;
    	$student->address=$request->address;
    	$student->phone = $request->phone;
    	$student->email_lien_he = $request->mail;
    	$student->CPA = $request->cpa;
    	$student->TA = $request->english;
    	$student->ktlt_base = $request->ep1;
    	$student->ktlt = $request->ep2;
    	$student->ktlt_master = $request->ep3;
    	$student->quan_tri_he_thong = $request->ep4;
    	$student->Other = $request->ep5;
    	$student->cty_da_thuc_tap = $request->cty;
    	$student->favorite = implode(",", ($request->favorite));
    	$student->cty_dang_thuc_tap = $request->cty2;
    	$student->ten_nv_phu_trach = $request->nv;
    	$student->email = $request->mailnv;
    	$student->save();	
    	return redirect('dang-nhap');
    }

    public function postRegisterDN()
    {

    }
}
