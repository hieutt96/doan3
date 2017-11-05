<?php 

	namespace App\Http\Controllers\Guest;
	use App\Http\Controllers\Controller;
	use App\Company;
	class HomeController extends Controller {
		public function dsdoanhnghiep() {
			$lists = Company::where('status',1)->get();
	        return view('layouts.dsdoanhnghiep')->with('lists',$lists);
		}
	}