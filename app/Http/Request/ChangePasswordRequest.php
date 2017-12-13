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
             'old_password'=>'required',
             'new_password'=>'required|min:6|max:32|different:old_password',
             're_password'=>'required|same:new_password'

 		];
 	}
 	public function messages(){
 		return [
        'old_password.required'=>'Bạn chưa nhập mật khẩu cũ',
 		'old_password.same'=>'Nhập chưa đúng mật khẩu cũ',
 		'new_password.required'=>'Bạn chưa nhập mật khẩu mới',
 		'new_password.min'=>'Mật khẩu phải có số ký tự từ 6->32',
 		'new_password.max'=>'Mật khẩu phải có số ký tự từ 6->32',
 		'new_password.different'=>'Mật khẩu mới phải khác với mật khẩu cũ ',
 		're_password.required'=>'Bạn chưa nhập lại mật khẩu',
 		're_password.same'=>'Nhập chưa đúng với mật khẩu mới'	
 		];
 	}
 	public function authorize() {
 		return true;
 	}
 }

