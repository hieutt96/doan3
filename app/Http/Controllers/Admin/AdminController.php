<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Company;
use App\User;
use App\Leader;
use App\Http\Controllers\Admin\MailController;
class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}
	public function show()
	{
		// dd("hieu");
		$companys = Company::where('status',0)->get();
		return view('admin.index')->with('companys',$companys);
	}

	public function accept($id){
		$company = Company::find($id);
		$company->status = 1;
		$company->save();
		if($company){
			MailController::mailAccept($company);
		}
		$user = User::find($company->idNV);
		$user ->status = 1;
		$user->save();
		return "Success !";
	}

	public function cancel($id){
		$company = Company::find($id);
		$company->delete();
		$user = User::find($company->idNV);
		$user->delete();
		Leader::where('company_id',$id)->delete();
	}
}
