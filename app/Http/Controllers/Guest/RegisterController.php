<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Request\RegisterSVRequest;

use App\Http\Controllers\Controller;
use App\Http\Request\RegisterDNRequest;
use App\User;
use App\Student;
use App\Company;
use App\Leader;
use App\Semester;
class RegisterController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function getRegisterSV()
    {   
        $hockys = Semester::select('ten_hoc_ki')->distinct('ten_hoc_ki')->get();
    	return view('guest.registersv')->with('hockys',$hockys);
    }

    public function getRegisterDN()
    {
        $hockys = Semester::select('ten_hoc_ki')->distinct('ten_hoc_ki')->get();
    	return view('guest.registerdn')->with('hockys',$hockys);
    }
    public function postRegisterSV(RegisterSVRequest $request)
    {
    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->level = 1;
        $user->status = 1;
    	$user->save();

    	$student = new Student;
    	$student->user_id = $user->id;
    	$student->lop=$request->class;
    	$student->grade=$request->grade;
    	$student->ctdt=$request->ctdt;
    	$student->bomon=$request->bm;
    	$student->gender = $request->gender;
    	$student->laptop = $request->laptop;
    	$student->address=$request->address;
    	$student->phone = $request->phone;
    	$student->mssv = $request->mssv;
    	$student->CPA = $request->cpa;
    	$student->TA = $request->english;
    	$student->knlt_cothesudung = $request->ep1;
    	$student->knlt_thanhthao = $request->ep2;
    	$student->knlt_master = $request->ep3;
    	$student->quan_tri_he_thong = $request->ep4;
    	$student->Other = $request->ep5;
        // dd($request->favorite);
    	$student->favorite = implode(",", ($request->favorite));
    	$student->cty_da_thuc_tap = $request->cty2;
    	$student->ten_nv_phu_trach = $request->nv;
    	$student->email = $request->mailnv;
    	$student->save();	
    	return redirect('dang-nhap')->with('status','Bạn đã đăng ký thành công hãy đăng nhập để tiếp tục.');
    }

    public function postRegisterDN(RegisterDNRequest $request)
    {
        // dd("hieu");
        $user = new User;
        $user->email = $request->emaildn;
        $user->password = bcrypt($request->password);
        $user->level = 2;
        $user->status = 0;  
        $user->name = $request->hotennvpt;
        $user->save();
        $company = new Company;
        $company->name = $request->tencongty;
        $company->diaChi = $request->diachi;
        $company->soLuongNV = $request->sonhanvien;
        $company->hocky = $request->hocky;
        $company->moTa = $request->mota;
        $company->namthanhlap = $request->namthanhlap;
        $company->phone = $request->sodienthoai;
        $company->emailnv = $request->emailnv;
        $company->diaChiTT = $request->diachithuctap;
        $company->thoiGianMongMuon = $request->thoigiantt;
        // dd($request->linhvuchoatdong);
        $company->congNgheDaoTao = implode(',', $request->congnghedaotao);
        $company->linhVucHoatDong = $request->linhvuchoatdong;
        $company->soLuongSinhVienTT = $request->soluong;
        $company->yeuCauNNSV = $request->yeucaungoaingu;
        $company->save();
        $leader = new Leader;
        $leader->phone = $request->sodienthoai;
        $leader->user_id = $user->id;
        $leader->company_id = $company->id;
        $leader->save();
        return redirect('/')->with('doanhnghiep','Bạn đã đăng ký thành công ,yêu cầu của bạn đanhg chờ xét duyệt');

    }
}
