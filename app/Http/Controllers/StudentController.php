<?php

namespace App\Http\Controllers;
use App\Leader;
use Illuminate\Http\Request;
use App\Http\Request\UpdateInfoSvRequest;
use App\Http\Request\ChangePasswordRequest;
use App\Student; 
use App\Comment;
use App\Company; 
use App\User;
use App\Job;
use App\Student_Job_Assignment;
use App\Notice;
use Auth;
use File;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Collection;
class StudentController extends Controller
{
    //Thay đổi mật khẩu
    public function getChangePassword(){
        return view('student.change_password');
    }
    public function postChangePassword(ChangePasswordRequest $request){  
        $sinhvien = Auth::user();
        if(Hash::check($request->input('old_password'), $sinhvien->password)){
            $sinhvien->password = bcrypt($request->re_password);
            $sinhvien->save();
            return back()->with('thongbao','Mật khẩu mới đã được cập nhật thành công');
        }else{
            return back()->with('thongbao','Nhập chưa đúng mật khẩu cũ');
        }
    }

    //Hiển thị thông tin người dùng
    public function getStudentInfo(){
        $user = Auth::user();
        $student = $user->student;
        return view('student.student_Info',['student'=>$student]);
    }

    //Cập nhật thông tin người dùng
    public function getUpdateStudentInfo(){
        return view('student.update_info');
    }
    public function postUpdateStudentInfo(UpdateInfoSvRequest $request){
        $user = Auth::user();
        if($request->hasFile('anh')){
            $file = $request->file('anh');
            $duoi = $file->getClientOriginalExtension();
           if($duoi !='jpg' && $duoi !='png' && $duoi != 'jpe
           g')
            {
                return redirect('student/update-student-info')->with('loi','Bạn
                chỉ được chọn file có đuôi là jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $picture = str_random(4)."_".$name;
            while(file_exists("upload/anhsinhvien/".$picture))
            {
                 $picture = str_random(4)."_".$name;
             }
             
            //Lưu hình
            $file->move("upload/anhsinhvien",$picture);
             //Xóa ảnh cũ
            if(File::exists("upload/anhsinhvien/".$user->picture)){
            File::delete("upload/anhsinhvien/".$user->picture);
            }
            $user->picture = $picture;
            }
            $user->name = $request->name;
            $user->student->mssv = $request->mssv;
            $user->student->lop= $request->lop;
            $user->student->grade= $request->khoa;
            $user->student->ctdt= $request->ctdt;
            $user->student->gender= $request->gender;
            $user->student->laptop= $request->laptop;
            $user->student->address= $request->diachi;
            $user->student->phone= $request->phone;
            $user->student->CPA= $request->cpa;
            $user->student->TA= $request->english;
            $user->student->knlt_cothesudung= $request->ep1;
            $user->student->knlt_thanhthao= $request->ep2;
            $user->student->knlt_master= $request->ep3;
            $user->student->quan_tri_he_thong= $request->ep4;
            $user->student->Other= $request->ep5;
            $user->student->cty_da_thuc_tap= $request->cty;
            $user->save();
            $user->student->save();
            return redirect("student/update-student-info")->with('thongbao','Bạn
       đã cập nhật thành công');
    }

    //hợp tác doanh nghiệp
    public function hopTacDoanhNghiep(){
        $doanhnghiep = Company::all();
        $hocky = Company::select('hocky')->distinct()->get();
        return view('student.hopTacDoanhNghiep',['doanhnghiep'=>$doanhnghiep,'hocky'=>$hocky]);
    }
    //chi tiết doanh nghiệp
    public function chiTietDoanhNghiep($id){
        $doanhnghiep = Company::find($id);
        $doanhnghiepkhac = Company::orderByRaw('RAND()')->where('id','!=',$id)->take(3)->get();//thay đổi param in take() khi có dữ liệu
        $comment= Comment::where('company_id','=',$id)->get();
        return view('student.chiTietDoanhNghiep',['doanhnghiep'=>$doanhnghiep,'dn_khac'=>$doanhnghiepkhac,'comment'=>$comment]);  
    }
    //Công việc thực tập
    public function getCongViecThucTap(){
        $student = Student::where('user_id', Auth::user()->id)->first();
        $company = Company::join('interships', 'companies.id', '=', 'interships.company_id')
                            ->where([['interships.status', '=', '1']
                                    ,['interships.student_id','=', $student->id]])
                            ->first();
        $job_assignment = Student_Job_Assignment::where('student_id', '=', $student->id)->get();
        return view('student.congViecThucTap',['student' => $student, 'company' => $company, 'job_assignment'=>$job_assignment]);
    }
    public function postCongViecThucTap(Request $request){
        $idSV = Auth::user()->id;
        $job_assignment= Student_Job_Assignment::where('student_id','=',$idSV)->get();
        $job_assignment->id = $request->id;
        $job_assignment->trang_thai = $request->trang_thai;
        $job_assignment->save();
        return back()->with('thongbao','Cập nhật công việc thành công !');
    }
    //Thông báo chung cho tất cả Guest
    public function getThongBaoChung(){
        $notice= DB::table('users')
        ->join('notices','notices.user_id','=','users.id')
        ->where('users.level',4)
        ->where('notices.ma_nguoi_nhan',0)
        ->get();
        return view('student.thongBao.thongBaoChung',['notice'=>$notice]);
       
    }
    public function chiTietThongBaoChung($id){
        $notice = Notice::find($id);
        return view('student.thongBao.chiTietThongBaoChung',['notice'=>$notice]);
    } 
    //Thông báo sinh viên phía doanh nghiep      
    public function getThongBaoPhiaDoanhNghiep(){
        //leader
        $notice_leader = DB::table('interships')
        ->join('notices','notices.user_id','=','interships.leader_id')
        ->join('users','notices.user_id','=','users.id')
        ->where('interships.student_id',Auth::user()->id)
        ->where('interships.status','=',1)
        ->where('notices.ma_nguoi_nhan','=',2)
        ->get();
        //pm
        $notice_pm = DB::table('interships')
        ->join('companies','companies.id','=','interships.company_id')
        ->join('leaders','leaders.company_id','=','companies.id')
        ->join('notices','notices.user_id','=','leaders.user_id')
        ->join('users','notices.user_id','=','users.id')
        ->where('interships.student_id',Auth::user()->id)
        ->where('interships.status','=',1)
        ->where('notices.ma_nguoi_nhan','=',2)
        ->get();
        foreach($notice_leader as $notile){

            $notice_pm->push($notile);
        }
        return view('student.thongBao.thongBaoPhiaDoanhNghiep',['notice'=>$notice_pm]);
    }
    public function chiTietThongBaoPhiaDoanhNghiep($id){
        $notice = Notice::find($id);
        return view('student.thongBao.chiTietThongBaoPhiaDoanhNghiep',['notice'=>$notice]);
    }
    //Thông báo sinh viên phía nhà trường  
    public function getThongBaoPhiaNhaTruong(Request $request){
        //admin
        $notice_admin = DB::table('users')
        ->join('notices','notices.user_id','=','users.id')
        ->where('users.level',4)
        ->where('notices.ma_nguoi_nhan',0)
        ->get();

        //giangvien
        $notice_gv = DB::table('interships')
        ->join('lecturers','interships.lecturer_id','=','lecturers.user_id')
        ->join('notices','notices.user_id','=','lecturers.user_id')
        ->join('users','users.id','=','notices.user_id')
        ->where('interships.student_id',Auth::user()->id)
        ->where('interships.status',1)
        ->where('notices.ma_nguoi_nhan',2)
        ->get();
        foreach($notice_admin as $notile){
            $notice_gv->push($notile);            
        }
        return view('student.thongBao.thongBaoPhiaNhaTruong',['notice'=>$notice_gv]);
        
    }
    public function chiTietThongBaoPhiaNhaTruong($id){
        $notice = Notice::find($id);
        return view('student.thongBao.chiTietThongBaoPhiaNhaTruong',['notice'=>$notice]);
    }
    public function timKiemThongBao(Request $request){
        //$tukhoa = $request->tukhoa;
        $tukhoa = $request->tukhoa;
        $notice_leader = DB::table('interships')
        ->join('notices','notices.user_id','=','interships.leader_id')
        ->join('users','users.id','=','notices.user_id')
        ->where('interships.student_id',Auth::user()->id)
        ->where('interships.status','=',1)
        ->where('notices.ma_nguoi_nhan','=',2)
        ->where('notices.tieu_de','like','%'.$tukhoa.'%')
        ->get();
         
        //pm
        $notice_pm = DB::table('interships')
        ->join('companies','companies.id','=','interships.company_id')
        ->join('leaders','leaders.company_id','=','companies.id')
        ->join('notices','notices.user_id','=','leaders.user_id')
        ->join('users','users.id','=','notices.user_id')
        ->where('interships.student_id',Auth::user()->id)
        ->where('interships.status','=',1)
        ->where('notices.ma_nguoi_nhan','=',2)
        ->where('notices.tieu_de','like','%'.$tukhoa.'%')
        ->get();
        //admin
        $notice_admin = DB::table('users')
        ->join('notices','notices.user_id','=','users.id')
        ->where('users.level',4)
        ->where('notices.ma_nguoi_nhan',0)
        ->where('notices.tieu_de','like','%'.$tukhoa.'%')
        ->get();

        //giangvien
        $notice_gv = DB::table('interships')
        ->join('lecturers','interships.lecturer_id','=','lecturers.user_id')
        ->join('notices','notices.user_id','=','lecturers.user_id')
        ->join('users','users.id','=','notices.user_id')
        ->where('interships.student_id',Auth::user()->id)
        ->where('interships.status',1)
        ->where('notices.ma_nguoi_nhan',2)
        ->where('notices.tieu_de','like','%'.$tukhoa.'%')
        ->get();
        foreach($notice_admin as $notile){
            $notice_gv->push($notile);            
        }
        foreach($notice_leader as $notile){
            $notice_pm->push($notile);
        }
        foreach($notice_gv as $notile){
            $notice_pm->push($notile);
        }
        $notice_pm = $notice_pm->sortByDesc('created_at'); 
       return view('student.thongBao.timKiemThongBao',['notice'=> $notice_pm,'tukhoa'=>$tukhoa]);
    }
    //Tìm kiếm thông báo chung
    public function timKiemThongBaoChung(Request $request){
        $tukhoa = $request->tukhoa;
        $notice= DB::table('users')
        ->join('notices','notices.user_id','=','users.id')
        ->where('users.level',4)
        ->where('notices.ma_nguoi_nhan',0)
        ->where('notices.tieu_de','like','%'.$tukhoa.'%')
        ->get();
        return view('student.thongBao.timKiemThongBaoChung',['notice'=> $notice,'tukhoa'=>$tukhoa]);
        
    }
    //Liên hệ nhà trường
    public function lienHeNhaTruong(){
        return view('student.lienHeNhaTruong');
    }
   
}
