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
             'mssv'=>'required',
             'lop'=>'required',
             'khoa'=>'required',
             'ctdt'=>'required',
             'laptop'=>'required',
             'phone'=>'required|numeric',
             'cpa'=>'required|numeric',
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
            'mssv.required'=>'Bạn chưa nhập MSSV',
            'mssv.unique'=>'MSSV đã tồn tại',
 		'lop.required'=>'Bạn chưa nhập tên Lớp',
 		'khoa.required'=>'Bạn chưa nhập tên Khóa',
 		'ctdt.required'=>'Bạn chưa nhập tên Chương trình đào tạo',
 		'laptop.required'=>'Bạn chưa chọn có hay không có laptop',
 		'phone.required'=>'Bạn chưa nhập điện thoại',
 		'phone.numeric'=>'Số điện thoại phải là số không phải chữ',
            'cpa.required'=>'Bạn chưa nhập CPA',
            'cpa.numeric'=>'Bạn phải nhập số không phải chữ',
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

