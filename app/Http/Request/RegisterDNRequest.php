<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class RegisterDNRequest extends FormRequest
{
	public function rules()
	{
		return [
			'tencongty' => 'unique:companies,name|min:5',
			'diachi' => 'min:10',
			'phone'=>'min:8',
			'emailnv' =>'email|unique:users,email|max:50',
			'emaildn' => 'email|unique:users,email|max:50',
			'password' => 'min:6 |same:re-password',
			'image'=>'image|mimes:jpeg,png,jpg,gif,svg'
		];
	}

	public function messages(){
		return  [
			'tenconty.min' => 'Có vẻ như tên công ty chưa đúng',
			'diachi.min' => 'Có vẻ như địa chỉ của bạn chưa đúng',
			'email.emailnv' =>'Email không hợp lệ',
			'emaildn.email'=>'Email không hợp lệ',
			'password.min' => 'Password quá ngắn',
			'password.same' => 'Password nhập lại chưa khớp nhau'
		];
	}
	public function authorize(){
		return true;
	}
}  
