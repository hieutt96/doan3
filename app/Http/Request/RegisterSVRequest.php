<?php 
namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

 /**
 * 
 */
 class RegisterSVRequest extends FormRequest
 {
 	public function rules(){
 		return [
 			'name'=>'min:5|max:30',
 			'mail'=>'email',
 			'email'=>'email|unique:users|max:50',
 			'password'=>'min:6|same:re-password',
 		];
 	}
 	public function messages(){
 		return [
 			'name.min'=>'Có vẻ như tên bạn quá ngắn',
 			'name.max'=>'Có vẻ như tên bạn quá dài',
 			'mail.email'=>'Email không hợp lệ',
 			'email.email'=>'Email không hợp lệ',
 			'password.min'=>'Password của bạn quá ngắn',
 			'password.same'=>'Mật khẩu không khớp,Vui lòng nhập lại'
 		];
 	}
 	public function authorize() {
 		return true;
 	}
 }

