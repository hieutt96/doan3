<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class LecturerController extends Controller
{
    public function manageStudent(){
    	return view('lecturer.manage_student');
    }
}
