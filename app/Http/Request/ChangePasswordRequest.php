<?php 
namespace App\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

 /**
 * 
 */
 class ChangePasswordRequest extends FormRequest
 {
 	public function rules(){
 		return [
             'new_password'=>'required|min:6|max:32',
             're_password'=>'required|same:new_password'

 		];
 	}
 	public function messages(){
 		return [
 		'new_password.required'=>'Bạn chưa nhập mật khẩu mới',
 		'new_password.min'=>'Mật khẩu phải có số ký tự từ 6->32',
 		'new_password.max'=>'Mật khẩu phải có số ký tự từ 6->32',
 		're_password.required'=>'Bạn chưa nhập lại mật khẩu',
 		're_password.same'=>'Nhập chưa đúng với mật khẩu mới'	
 		];
 	}
 	public function authorize() {
 		return true;
 	}
 }

