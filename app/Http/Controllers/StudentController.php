<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateInfoSvRequest;
use App\Student; 
class StudentController extends Controller
{
    function _construct(){
        //nếu sinh viên đã đăng nhập rồi thì share biến chứa thông tin của sv này
        
        if(Auth::check()){
            $id = Auth::user()->id;
            view()->share('nguoidung',Auth::user());
            $student = Student::find($id);//Lấy ra thông tin sinh viên đã đăng nhập có id_SV = id_Usẻ
            view()->share('sinhvien',$student);
        }
    }
    public function getChangePassword(){
       
        return view('student.change_password');
    }
    public function postChangePassword(Request $request){  
        
    }
    public function getStudentInfo(){
       
        return view('student.student_info');
    }
    public function getUpdateStudentInfo($id){
        return view('student.update_info');
    }
    public function postUpdateStudentInfo(UpdateInfoSvRequest $request,$id){
        if($request->hasFile('anh')){
            $file = $request->file('anh');
            $duoi = $file->getClientOriginalExtension();
           if($duoi !='jpg' && $duoi !='png' && $duoi != 'jpeg')
            {
                return redirect('student/update-student-info')->with('loi','Bạn
                chỉ được chọn file có đuôilà jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $anh = str_random(4)."_".$name;
            while(file_exists("upload/anhsinhvien/".$anh))
            {
                 $anh = str_random(4)."_".$name;
             }
             
            //Lưu hình
            $file->move("upload/anhsinhvien",$anh);
          //Xóa ảnh cũ
            unlink("upload/anhsinhvien/".$sinhvien->Hinh);
            $sinhvien->anh = $anh;
            }
            $nguoidung->Name = $request->name;
            $sinhvien->lop= $request->lop;
            $sinhvien->khoa= $request->khoa;
            $sinhvien->ctdt= $request->ctdt;
            $sinhvien->bomon= $request->bomon;
            $sinhvien->gender= $request->gender;
            $sinhvien->laptop= $request->laptop;
            $sinhvien->diachi= $request->diachi;
            $sinhvien->phone= $request->phone;
            $sinhvien->cpa= $request->cpa;
            $sinhvien->english= $request->english;
            $sinhvien->ep1= $request->ep1;
            $sinhvien->ep2= $request->ep2;
            $sinhvien->ep3= $request->ep3;
            $sinhvien->ep4= $request->ep4;
            $sinhvien->ep5= $request->ep5;
            $sinhvien->cty= $request->cty;
            $sinhvien->save();
            return redirect("student/update-student-info")->with('thongbao','Bạn
            đã cập nhật thành công');
    }
   
}
