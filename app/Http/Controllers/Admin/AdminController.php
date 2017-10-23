<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Company;
use App\User;
use App\Http\Controllers\Admin\MailController;
class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}
	public function show()
	{
		$companys = Company::where('status',0)->get();
		return view('admin.index')->with('companys',$companys);
	}

// 	Dat add ham index chi show giao dien admin chua có sử lý back end
	public function index_dat($roll_id)
	{
	    if($roll_id == 1) {
            return view('admin.dat_index_sv');
        } elseif($roll_id == 11) {
            return view('admin.dat_sv_tt');
        } elseif($roll_id == 12) {
	        return view('admin.dat_sv_cv');
        } elseif($roll_id == 13) {
	        return view('admin.dat_sv_kq');
        } elseif($roll_id == 2) {
	        return view('admin.dat_index_cty');
        } elseif($roll_id == 31) {
	        return view('admin.dat_index_daDanhGia');
        } elseif($roll_id == 32) {
	        return view('admin.dat_index_chuaDanhGia');
        } elseif($roll_id == 4) {
	        return view('admin.dat_thongBao');
        } elseif($roll_id == 5) {
	        return view('admin.dat_guiThongBao');
        }
	}


	public function accept($id){
		// dd("1asds");
		// DB::table('conpanies')->where('id',$id)->update(['status'=>1]);
		$company = Company::find($id);
		$company->status = 1;
		$company->save();

		if($company){
			MailController::mailAccept($company);

		}
		$user = User::find($company->idNV);
		$user ->status = 1;
		$user->save();
		return "OK";
	}
}
