<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Request\UpdateInfoSvRequest;
use App\Http\Request\ChangePasswordRequest;
use App\Student; 
use App\Comment;
use App\Company; 
use App\User;
use Auth;
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
            unlink("upload/anhsinhvien/".$user->picture);
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
    
    //hợp tác doanh nghiệp
    public function chiTietDoanhNghiep($id){
        $doanhnghiep = Company::find($id);
        $user = User::all();
        $comment= Comment::all();
        //$nguoidung= User::all();
        return view('student.chiTietDoanhNghiep',['doanhnghiep'=>$doanhnghiep,'comment'=>$comment,'user'=>$user]);
        
    }
   
}
