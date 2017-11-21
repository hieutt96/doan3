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
use App\Lecturer;
use App\Notice;
use App\Http\Controllers\Admin\MailController;
class AdminController extends Controller
{

	public function show_dn()
	{
		$hockys = Company::select('hocky')->distinct()->get();
		return view('admin.index',compact('hockys'));
	}

	public function createSemester(){
		$lists = Semester::all();
		return view('admin.create_semester',compact(['lists']));
	}

	public function postCreateSemester(Request $r){
		$semester = new Semester;
		$semester->ten_hoc_ki = $r->name;
		$semester->thoi_gian_dn_bat_dau_dk = $r->thoi_gian_dn_bat_dau_dk;
		$semester->thoi_gian_dn_ket_thuc_dk = $r->thoi_gian_dn_ket_thuc_dk;
		$semester->thoi_gian_sv_bat_dau_dk = $r->thoi_gian_sv_bat_dau_dk;
		$semester->thoi_gian_sv_ket_thuc_dk =$r->thoi_gian_sv_ket_thuc_dk;
		$semester->save();
		return redirect()->route('tao-lich-dang-ky-hoc-ky');
	}

	public function filter_company_hocky($hocky){
		$companys_request = Company::where('hocky',$hocky)->where('status',0)->get();
		$companys_accept = Company::where('hocky',$hocky)->where('status',1)->get();
		return [$companys_request,$companys_accept];
	}

	public function acceptCompanyRequest($id){
		$company = Company::find($id);
		$company->status =1;
		$company->save();
        if($company) {
            MailController::mailAccept($company);
        }
		return $company;
	}

	public function deleteCompanyRequest($id){
		$company = Company::find($id);
		$company->delete();
		return 1;
	}
	public function deleteCompany($id){
		$company = Company::find($id);
		$company->delete();
		return 1;
	}

	public function manageLecturer(){
		$hockys = Company::select('hocky')->distinct()->get();
		return view('admin.manage_lecturer',compact('hockys'));
	}

	public function addlecturer(Request $request){
		$data = $request->data;
		$hocky = $request->hocky;
		foreach($data as $d){
			$user = new User;
			$user->email = $d['email'];
			$user->password = bcrypt($d['password']);
			$user->level = 5;
			$user->status = 1;
			$user->save();

			$lecturer = new Lecturer;
			$lecturer->user_id = $user->id;
			$lecturer->hocky = $hocky;
			$lecturer->save();
		}
		return 1;
	}

	public function thongBao(){
		return view('admin.notice');
	}

	public function postThongBao(NoticeRequest $request)
	{
		$nocite = new Notice;
		$notice->user_id = Auth::user()->id;
		$notice->noidung = $request->noidung;
		$notice->ma_nguoi_nhan = $request->manguoinhan;
		$notice->save();
	}
}
