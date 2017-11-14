<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Company;
use App\User;
use App\Leader;
use App\Semester;
use App\Http\Controllers\Admin\MailController;
class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}
	public function show_dn()
	{
		$hockys = Company::select('hocky')->distinct('hocky')->get();
		return view('admin.index',compact('hockys'));
	}

	public function create(){
		$lists = Semester::all();
		return view('admin.create_semester',compact(['lists']));
	}
	public function filter_company_hocky($hocky){
		$companys_request = Company::where('hocky',$hocky)->where('status',0)->get();
		$companys_accept = Company::where('hocky',$hocky)->where('status',1)->get();
		return [$companys_request,$companys_accept];
	}
}
