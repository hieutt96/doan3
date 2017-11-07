<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateInfoSvRequest;
use App\Student; 
class StudentController extends Controller
{
    public function getChangePassword(){
       
        return view('student.change_password');
    }
    public function postChangePassword(Request $request){
       
        return view('student.change_password');
    }
    public function getStudentInfo(){
       
        return view('student.student_info');
    }
    public function getUpdateStudentInfo($id){
        $student = Student::find($id);
        return view('student.update_info',['student'=>$student]);
    }
    public function postUpdateStudentInfo(UpdateInfoSvRequest $request){
       
       
    }
   
}
