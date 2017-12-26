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
			'name.numeric'=>'Học Kì Chưa Hợp Lệ,Học kỳ phải là số.',
			'name.unique'=>'Tên học kì đã tồn tại',
			'thoi_gian_sv_ket_thuc_dk.after'=>'Thời gian sinh viên kết thúc đăng ký phải sau thời gian bắt đầu.',
			'thoi_gian_dn_ket_thuc_dk.after'=>'Thời gian doanh nghiệp kết thúc đăng ký phải sau thời gian bắt đầu.',
			'thoi_gian_sv_bat_dau_thuc_tap'=>'Thời gian sinh viên bắt đầu đi thực tập phải sau thời gian sinh viên kết thúc đăng ký.',
			'thoi_gian_sv_ket_thuc_thuc_tap'=>'Thời gian kết thúc phải sau thời gian bắt đầu thực tập'
		];
	}

	public function authorize(){
		return true;
	}
}