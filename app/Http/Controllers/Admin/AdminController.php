<?php 

namespace App\Http\Controllers\Admin;

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