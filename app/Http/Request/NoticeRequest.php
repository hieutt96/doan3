<?php 

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

/**
* 
*/
class NoticeRequest extends FormRequest
{

	public function rules(){
		return [
		    'tieuDe' => 'required',
			'noidung'=>'required',
			'manguoinhan'=>'required',
		];
	}
	public function messages(){
		return [
		];
	}

	public function authorize(){
		return true;
	}
}
