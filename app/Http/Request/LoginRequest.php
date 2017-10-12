<?php 

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
	public function rules()
	{
		return [
			'email'=>'required|email',
			'password'=>'required|min:6'
		];
	}
	public function messages()
	{
		return [
			'email.required'=>'Bạn chưa điền email',
			'email.email'=>'Email của bạn không hợp lệ',
			'password.required'=>'Vui lòng nhập password',
			'password.min'=>'Mật khẩu của bạn quá ngắn'
		];
	}

	public function authorize()
	{
		return true;
	}
}
