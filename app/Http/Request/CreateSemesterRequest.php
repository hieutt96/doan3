<?php 

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
/**
* 
*/
class CreateSemesterRequest extends FormRequest
{
	public function rules(){
		return [
			'name'=>'numeric|unique:semesters,ten_hoc_ki',
			'thoi_gian_dn_bat_dau_dk'=>'',
			'thoi_gian_dn_ket_thuc_dk'=>'after:thoi_gian_dn_bat_dau_dk',
			'thoi_gian_sv_bat_dau_dk'=>'after:thoi_gian_dn_ket_thuc_dk',
			'thoi_gian_sv_ket_thuc_dk'=>'after:thoi_gian_sv_bat_dau_dk',
			'thoi_gian_sv_bat_dau_thuc_tap'=>'after:thoi_gian_sv_ket_thuc_dk',
			'thoi_gian_sv_ket_thuc_thuc_tap'=>'after:thoi_gian_sv_bat_dau_thuc_tap'
		];
	}

	public function messages(){
		return [
			'name.numeric'=>'Học Kì Chưa Hợp Lệ',
			'name.unique'=>'Học kì đã tồn tại',
			'thoi_gian_sv_ket_thuc_dk.after'=>'Thời gian kết thúc phải sau thời gian bắt đầu.',
			'thoi_gian_dn_ket_thuc_dk.after'=>'Thời gian kết thúc phải sau thời gian bắt đầu.'
		];
	}

	public function authorize(){
		return true;
	}
}