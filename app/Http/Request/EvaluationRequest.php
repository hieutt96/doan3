<?php
/**
 * Created by PhpStorm.
 * User: dat
 * Date: 09/12/2017
 * Time: 23:12
 */

namespace App\Http\Request;
use Illuminate\Foundation\Http\FormRequest;


class EvaluationRequest extends FormRequest
{
    public function rules(){
        return [
            'rowsCheck' => 'required',
            'nangLucIT' => 'required|numeric|max:5',
            'ppLamViec' => 'required|numeric|max:5',
            'nangLucNamBatCV' => 'required|numeric|max:5',
            'nangLucQuanLi' => 'required|numeric|max:5',
            'tiengAnh' => 'required|numeric|max:5',
            'nangLucLamViecNhom' => 'required|numeric|max:5',
            'danhGiaCongTy' => 'required|numeric|max:5',
            'nhanXetCongTy' => 'required',
        ];
    }
    public function messages(){
        return [
            'rowsCheck.required'=>'Bạn chưa chọn sinh viên nào.',

            'nangLucIT.required'=>'Bạn chưa nhập Năng Lực IT.',
            'ppLamViec.required' => 'Bạn chưa nhập PP Làm Việc.',
            'nangLucNamBatCV.required' => 'Bạn chưa nhập Năng Lực Nắm Bắt Công Việc.',
            'nangLucQuanLi.required' => 'Bạn chưa nhập Năng Lực Quản Lý.',
            'tiengAnh.required' => 'Bạn chưa nhập Năng Lực Tiếng Anh.',
            'nangLucLamViecNhom.required' => 'Bạn chưa nhập Năng Lực Làm Việc Nhóm.',
            'danhGiaCongTy.required' => 'Bạn chưa nhập Đánh Giá Công Ty.',
            'nhanXetCongTy.required' => 'Bạn chưa nhập Nhận Xét Công Ty.',

            'nangLucIT.max' => 'Thang điểm của Năng Lực IT là 5.',
            'ppLamViec.max' => 'Thang điểm của PP Làm Việc là 5.',
            'nangLucNamBatCV.max'=>'Thang điểm của Năng Lực Nắm Bắt là 5.',
            'nangLucQuanLi.max' => 'Thang điểm của Năng Lực Quản Lý là 5.',
            'tiengAnh.max' => 'Thang điểm của Năng Lực Tiếng Anh là 5.',
            'nangLucLamViecNhom.max' => 'Thang điểm của Năng Lực Làm Việc Nhóm là 5.',
            'danhGiaCongTy.max' => 'Thang điểm của Đánh Giá Công Ty là 5.',
        ];
    }
    public function authorize() {
        return true;
    }
}