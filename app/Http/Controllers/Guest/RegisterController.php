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
use App\Intership;
use DB;
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getRegisterSV()
    {   
        $a=[];
        $semester = new Semester();

        $hockys = $semester->getAllSemester();
        // dd($hockys);
        foreach($hockys as $hocky){
            if ((date('Y-m-d') > $hocky->thoi_gian_sv_bat_dau_dk) && date('Y-m-d') < $hocky->thoi_gian_sv_ket_thuc_dk){
                $a[] = $hocky;
            }
        }
    	return view('guest.registersv')->with('hockys',$a);
    }

    public function getRegisterDN()
    {
        $a=[];
        $semester = new Semester();

        $hockys = $semester->getAllSemester();
        foreach($hockys as $hocky){
            if ((date('Y-m-d')>$hocky->thoi_gian_dn_bat_dau_dk) && date('Y-m-d')<$hocky->thoi_gian_dn_ket_thuc_dk){
                $a[] = $hocky;
            }
        }
    	return view('guest.registerdn')->with('hockys',$a);
    }
    public function postRegisterSV(RegisterSVRequest $request)
    {
        // dd("hieu");
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
    	if($request->favorite){
            $student->favorite = implode(",", ($request->favorite));
        }
    	$student->cty_da_thuc_tap = $request->cty2;
    	$student->ten_nv_phu_trach = $request->nv;
    	$student->email = $request->mailnv;
    	$student->save();	

        if($request->luachon==0)    {
            if($request->congty){
                 $congtys = $request->congty;
                foreach($congtys as $congty){
                    $intership = new Intership;
                    $intership->company_id = $congty;
                    $intership->student_id =$student->id;
                    $intership->semester_id = $request->hocky;
                    $intership->status=0;
                    $intership->save();
                }
            }else{
                $intership = new Intership;
                $intership->student_id = $student->id;
                $intership->semester_id = $request->hocky;
                $intership->status = 3;
                $intership->save();
            }
        }elseif($request->luachon==1){
            $intership = new Intership;
            $intership->student_id = $student->id;
            $intership->semester_id = $request->hocky;
            $intership->company_id = $request->cty2;
            $intership->status = 2;
            $intership->save();
        }
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
        if($request->hasFile('image')){
            $file = $request->file('image');
            $time = time();
            $file->move(public_path().'/image/doanhnghiep/',$time.$file->getClientOriginalExtension());
            $company->picture= '/image/doanhnghiep/'.$time.$file->getClientOriginalExtension();
        }
        // dd($file);
        $company->congNgheDaoTao = implode(',', $request->congnghedaotao);
        $company->linhVucHoatDong = implode(',', $request->linhvuchoatdong);
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

    public function findCongty(Request $request){
        $id = $request->hocky;
        $hocky = Semester::find($id);
        $ten_hoc_ky=$hocky->ten_hoc_ki;
        $congty = Company::where('hocky','=',$ten_hoc_ky)->where('status',1)->get();
        return $congty;
    }

    public function findLeader(Request $r){
        $data = $r->all();
        $user  = DB::table('leaders')->join('users','leaders.user_id','=','users.id')->join('companies','leaders.company_id','=','companies.id')->select('users.name','users.email')->where('companies.id','=',$data)->where('users.level','=',2)->get();
        return $user;
    }
}
