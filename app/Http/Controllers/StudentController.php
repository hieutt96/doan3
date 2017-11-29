<?php

namespace App\Http\Controllers;
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

class StudentController extends Controller
{
    //Thay đổi mật khẩu
    public function getChangePassword(){
        return view('student.change_password');
    }
    public function postChangePassword(ChangePasswordRequest $request){  
        $sinhvien = Auth::user();
        $sinhvien->password = bcrypt($request->re_password);
        $sinhvien->save();
        return back()->with('thongbao','Mật khẩu mới đã được cập nhật thành công');
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
           if($duoi !='jpg' && $duoi !='png' && $duoi != 'jpeg')
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
            $user->student->ctdt= $request->ctdt;
            $user->student->bomon= $request->bomon;
            $user->student->gender= $request->gender;
            $user->student->laptop= $request->laptop;
            $user->student->address= $request->diachi;
            $user->student->phone= $request->phone;
            $user->student->CPA= $request->cpa;
            $user->student->TA= $request->english;
            $user->student->ktlt_base= $request->ep1;
            $user->student->ktlt= $request->ep2;
            $user->student->ktlt_master= $request->ep3;
            $user->student->quan_tri_he_thong= $request->ep4;
            $user->student->Other= $request->ep5;
            $user->student->cty_da_thuc_tap= $request->cty;
            $user->save();
            $user->student->save();
            return redirect("student/update-student-info")->with('thongbao','Bạn
            đã cập nhật thông tin thành công');
    }

    //hợp tác doanh nghiệp
    public function hopTacDoanhNghiep(){
        $doanhnghiep = Company::all();
        return view('student.hopTacDoanhNghiep',['doanhnghiep'=>$doanhnghiep]);
    }
    //chi tiết doanh nghiệp
    public function chiTietDoanhNghiep($id){
        $doanhnghiep = Company::find($id);
        $doanhnghiepkhac = Company::orderByRaw('RAND()')->where('id','!=',$id)->take(2)->get();//thay đổi param in take() khi có dữ liệu
        $comment= Comment::where('company_id','=',$id)->get();
        return view('student.chiTietDoanhNghiep',['doanhnghiep'=>$doanhnghiep,'dn_khac'=>$doanhnghiepkhac,'comment'=>$comment]);  
    }
    //Công việc thực tập
    public function getCongViecThucTap(){
        $idSV = Auth::user()->id;
        $job_assignment= Student_Job_Assignment::where('student_id','=',$idSV)->get();
        return view('student.congViecThucTap',['job_assignment'=>$job_assignment]);
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
        $notice = Notice::orderBy('created_at', 'desc')->paginate(7);
        return view('student.thongBao.thongBaoChung',['notice'=>$notice]);
       
    }
    public function chiTietThongBaoChung($id){
        $notice = Notice::find($id);
        return view('student.thongBao.chiTietThongBaoChung',['notice'=>$notice]);
    } 
    //Thông báo sinh viên phía doanh nghiep      
    public function getThongBaoPhiaDoanhNghiep(){
       $notice = Notice::where('ma_nguoi_nhan','=',Auth::user()->id)->orderBy('created_at', 'desc')->paginate(7);
        return view('student.thongBao.thongBaoPhiaDoanhNghiep',['notice'=> $notice]);
    }
    public function chiTietThongBaoPhiaDoanhNghiep($id){
        $notice = Notice::find($id);
        return view('student.thongBao.chiTietThongBaoPhiaDoanhNghiep',['notice'=>$notice]);
    }
    //Thông báo sinh viên phía nhà trường  
    public function getThongBaoPhiaNhaTruong(Request $request){
        $notice = Notice::where('ma_nguoi_nhan','=',Auth::user()->id)->orderBy('created_at', 'desc')->paginate(7);
        return view('student.thongBao.thongBaoPhiaNhaTruong',['notice'=>$notice]);
    }
    public function chiTietThongBaoPhiaNhaTruong($id){
        $notice = Notice::find($id);
        return view('student.thongBao.chiTietThongBaoPhiaNhaTruong',['notice'=>$notice]);
    }
    //Liên hệ nhà trường
    public function lienHeNhaTruong(){
        return view('student.lienHeNhaTruong');
    }
   
}
