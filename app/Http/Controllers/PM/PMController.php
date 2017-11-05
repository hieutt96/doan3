<?php 
	namespace App\Http\Controllers\PM;

	use App\Http\Controllers\Controller;
	use Illuminate\Support\Facades\DB;
	class PMController extends Controller{
		public function __construct(){
			$this->middleware('guest')->except('logout');
		}

		public function show(){
			return view('layouts.pm');
		}
	}