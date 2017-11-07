<?php 
namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

 /**
 * 
 */
 class UpdateInfoSvRequest extends FormRequest
 {
 	public function rules(){
 		return [
             'name'=>'required|min:5|max:30',
             'lop'=>'required',
             'khoa'=>'required',
             'ctdt'=>'required',
             'bomon'=>'required',
             'laptop'=>'required',
             'phone'=>'required|min:10|max:12',
             'cpa'=>'required',
             'english'=>'required',
             'ep1'=>'required',
             'ep2'=>'required',
             'ep3'=>'required',
             'ep4'=>'required'
 		];
 	}
 	public function messages(){
 		return [
        'name.required'=>'Bạn chưa nhập Họ Tên',
 		'name.min'=>'Họ tên phải có số ký tự từ 5->30',
 		'name.max'=>'Họ tên phải có số ký tự từ 5->30',
 		'khoa.required'=>'Bạn chưa nhập tên Khoa',
 		'ctdt.required'=>'Bạn chưa nhập tên Chương trình đào tạo',
 		'bomon.required'=>'Bạn chưa nhập tên Bộ môn',
 		'laptop.required'=>'Bạn chưa chọn có hay không có laptop',
 		'phone.required'=>'Bạn chưa nhập điện thoại',
 		'phone.min'=>'Số điện thoại phải có từ 10->12 số',
        'phone.max'=>'Số điện thoại phải có từ 10->12 số',
        'cpa.required'=>'Bạn chưa nhập CPA',
        'english.required'=>'Bạn chưa nhập kỹ năng tiếng anh',
        'ep1.required'=>'Bạn cần điền vào ô này',
        'ep2.required'=>'Bạn chưa điền vào ô này',
        'ep3.required'=>'Bạn chưa điền vào ô này',
        'ep4.required'=>'Bạn chưa điền vào ô này'
 			
 		];
 	}
 	public function authorize() {
 		return true;
 	}
 }

