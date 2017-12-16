<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','trangChuController@trangchu');
//Route::get('/','StudentController@getThongBaoChung');


Route::get('dang-ky-doanh-nghiep',['as'=>'dang-ky-dn','uses'=>'Guest\RegisterController@getRegisterDN','middleware'=>'checkdateregisterdn']);

Route::post('dang-ky-doanh-nghiep', ['as' => 'dang-ky-dn.post', 'uses' => 'Guest\RegisterController@postRegisterDN']);

Route::get('dang-ky-sinh-vien',['as'=>'dang-ky-sv','uses'=>'Guest\RegisterController@getRegisterSV','middleware'=>'checkdateregistersv']);

Route::post('dang-ky-sinh-vien', ['as' => 'dang-ky-sv.post', 'uses' => 'Guest\RegisterController@postRegisterSV']);

Route::get('dang-nhap', ['as' => 'dang-nhap', 'uses' => 'Guest\LoginController@getLogin']);

Route::post('dang-nhap', ['as' => 'dang-nhap.post', 'uses' => 'Guest\LoginController@postLogin']);

Route::get('dang-xuat', ['as' => 'dang-xuat', 'uses' => 'Guest\LoginController@logout']);


Route::get('admin/cancel/{id}','Admin\AdminController@cancel');


Route::get('pm-home',['as'=>'pm-home','uses'=>'PM\PMController@show']);

Route::get('admin/cancel/{id}','Admin\AdminController@cancel');



Route::get('hop-tac-doanh-nghiep',['as'=>'hop-tac-doanh-nghiep','uses'=>'Guest\HomeController@dsdoanhnghiep']);

Route::group(['middleware'=>'admin'],function(){
        Route::get('admin/accept/{id}','Admin\AdminController@accept');

        Route::get('admin-dashboard',['as'=>'admin-dashboard','uses'=>'Admin\AdminController@show_dn']);

        Route::get('/admin/tao-lich-dang-ky-hoc-ky',['as'=>'tao-lich-dang-ky-hoc-ky','uses'=>'Admin\AdminController@createSemester']);

        Route::post('/admin/tao-lich-dang-ky-hoc-ky',['as'=>'tao-lich-dang-ky-hoc-ky.post','uses'=>'Admin\AdminController@postCreateSemester']);

        Route::get('admin/filter/company/{hocky}','Admin\AdminController@filter_company_hocky');

        Route::get('admin/accept/companyRequest/{id}',"Admin\AdminController@acceptCompanyRequest");

        Route::get('admin/delete/companyRequest/{id}',"Admin\AdminController@deleteCompanyRequest");

        Route::get('admin/delete/company/{id}','Admin\AdminController@deleteCompany');

        Route::get('admin/quan-li-giang-vien',['as'=>'quan-li-giang-vien','uses'=>'Admin\AdminController@manageLecturer']);

        Route::get('/admin/addlecturer','Admin\AdminController@addlecturer');

        Route::get('/admin/thong-bao',['as'=>'thong-bao','uses'=>'Admin\AdminController@thongBao']);

        Route::post('/admin/thong-bao',['as'=>'thong-bao.post','uses'=>'Admin\AdminController@postThongBao']);

        Route::get('/admin/chinh-sua-lich-dang-ky/{id}',['as'=>'chinh-sua-hoc-ky','uses'=>'Admin\AdminController@editSemester']);

        Route::post('/admin/chinh-sua-lich-dang-ky/{id}',['as'=>'chinh-sua-hoc-ky.post','uses'=>'Admin\AdminController@editSemesterPost']);
        
        Route::get('/admin/phan-cong-giang-vien/{hocky}','Admin\AdminController@assignmentLecturer');
        Route::get('admin/managestudent','Admin\AdminController@manageSV');

        Route::get('/admin/find-student-semester','Admin\AdminController@findStudentSemester');

        Route::get('/admin/assignment_student/{hocky}','Admin\AdminController@assignment_student');

        Route::get('/admin/assignment_student','Admin\AdminController@assignmentStudent');

        Route::get('/admin/assignment_lecturer','Admin\AdminController@assignmentLecturerForCompany');

        Route::get('/admin/danh-sach-giang-vien','Admin\AdminController@listLecturer');



		Route::get('guest/register/congty/hocky','Guest\RegisterController@findCongty');
		Route::get('guest/find/leader','Guest\RegisterController@findLeader');


});


Route::get('/lecturer/manage_student','Lecturer\LecturerController@manageStudent');


// sv
Route::get('/pm/sv', 'PM\PMController@indexSV');
Route::get('/pm/sv/{idSV}/thong-tin', 'PM\PMController@showSVInfo');
Route::get('/pm/sv/{idSV}/cong-viec', 'PM\PMController@showSVCongViec');
Route::get('/pm/sv/{idSV}/ket-qua', 'PM\PMController@showSVKetQua');

// nv
Route::get('/pm/nv', 'PM\PMController@indexNV');
Route::get('/pm/nv/{idLead}/thong-tin-chi-tiet', 'PM\PMController@nvChiTiet');
Route::get('/pm/nv/{idLead}/sinh-vien-huong-dan', 'PM\PMController@nvSVHD');
Route::post('/pm/nv/edit', 'PM\PMController@postSuaNV');
Route::post('/pm/tao-tk', 'PM\PMController@postTaoTK');
Route::post('/pm/sua-tk', 'PM\PMController@postSuaTK');
Route::post('/pm/xoa-tk', 'PM\PMController@postXoaTK');


// phan cong leader
Route::get('/pm/phan-cong-leader', 'PM\PMController@getPhanCong');
Route::post('/pm/phan-cong', 'PM\PMController@postPhanCong');

// thong bao
Route::get('/pm/gui-thong-bao', 'PM\PMController@getGuiTB');
Route::post('/pm/gui-tb', 'PM\PMController@postGuiTB');
Route::get('/pm/thong-bao', 'PM\PMController@getThongBao');
Route::get('/pm/thong-bao/{noti_id}/chi-tiet', 'PM\PMController@chiTietTB');

// thay mat khau
Route::get('/pm/thay-mat-khau', 'PM\PMController@getChangePass');
Route::post('/pm/thay-mk', 'PM\PMController@postChangePass');


// =========Route Leader
//sv
Route::get('/leader/sv', 'Leader\LeaderController@indexSV');
Route::get('/leader/sv/{idSV}/thong-tin', 'Leader\LeaderController@showSVInfo');
Route::get('/leader/sv/{idSV}/cong-viec', 'Leader\LeaderController@showSVCongViec');
Route::get('/leader/sv/{idSV}/ket-qua', 'Leader\LeaderController@showSVKetQua');
Route::post('/leader/cap-nhat-cv', 'Leader\LeaderController@postCapNhatCV');

// tao cong viec
Route::get('/leader/tao-cong-viec', 'Leader\LeaderController@getTaoCV');
Route::post('/leader/tao-cv', 'Leader\LeaderController@postTaoCV');

// danh gia sv
Route::get('/leader/danh-gia-sv', 'Leader\LeaderController@getDanhGia');
Route::post('/leader/danh-gia', 'Leader\LeaderController@postDanhGia');

// thong bao
Route::get('/leader/gui-thong-bao', 'Leader\LeaderController@getGuiTB');
Route::post('/leader/gui-tb', 'Leader\LeaderController@postGuiTB');
Route::get('/leader/thong-bao', 'Leader\LeaderController@getThongBao');
Route::get('/leader/thong-bao/{noti_id}/chi-tiet', 'Leader\LeaderController@chiTietTB');

// thay mat khau
Route::get('/leader/thay-mat-khau', 'Leader\LeaderController@getChangePass');
Route::post('/leader/thay-mk', 'Leader\LeaderController@postChangePass');


//--------------Start Students-Nhất-------------------------//
Route::group(['prefix'=>'student'],function(){
    Route::get('change-password','StudentController@getChangePassword');
    Route::post('change-password','StudentController@postChangePassword');

    Route::get('student-info','StudentController@getStudentInfo');

    Route::get('update-student-info','StudentController@getUpdateStudentInfo');
    Route::post('update-student-info','StudentController@postUpdateStudentInfo');

    //Công việc thực tập
    Route::get('cong-viec-thuc-tap','StudentController@getCongViecThucTap');
    //Thông báo sinh viên
    Route::get('thong-bao-phia-nha-truong','StudentController@getThongBaoPhiaNhaTruong');
    Route::get('thong-bao-phia-nha-truong/{id}','StudentController@chiTietThongBaoPhiaNhaTruong');

    Route::get('thong-bao-phia-doanh-nghiep','StudentController@getThongBaoPhiaDoanhNghiep');
    Route::get('thong-bao-phia-doanh-nghiep/{id}','StudentController@chiTietThongBaoPhiaDoanhNghiep');

});
Route::group(['prefix'=>'comment'],function(){
  
    Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');
});
//---------------End Students-Nhất-------------------------//

//Hợp tác doanh nghiệp
Route::get('hop-tac-doanh-nghiep','StudentController@hopTacDoanhNghiep');
Route::get('hop-tac-doanh-nghiep/{id}/{tendoanhnghiep}','StudentController@chiTietDoanhNghiep');

//Comment
Route::post('hop-tac-doanh-nghiep/{id}/{tendoangnghiep}','CommentController@postComment');
//Liên hệ nhà trường
Route::get('lien-he','StudentController@lienHeNhaTruong');

//Thông báo chung cho Guest
Route::get('thong-bao','StudentController@getThongBaoChung');
Route::get('thong-bao/{id}','StudentController@chiTietThongBaoChung');

Route::get('guest/register/congty/hocky','Guest\RegisterController@findCongty');
Route::get('guest/find/leader','Guest\RegisterController@findLeader');



Route::get('/lecturer/manage_student','Lecturer\LecturerController@manageStudent');

Route::group(['prefix'=>'ajax'],function(){
    
      Route::get('hop-tac-doanh-nghiep/{hocky}','AjaxDoanhNghiepController@getDoanhNghiepTheoHocKy');
  });
//Tìm kiếm thông báo cho sinh viên
Route::post('tim-kiem-thong-bao','StudentController@timKiemThongBao');
//Tìm kiếm thông báo chung ở giao diện guest
Route::post('tim-kiem-thong-bao-chung','StudentController@timKiemThongBaoChung');

Route::group(['prefix'=>'ajax'],function(){
    
      Route::get('hop-tac-doanh-nghiep/{hocky}','AjaxDoanhNghiepController@getDoanhNghiepTheoHocKy');
  });
//Tìm kiếm thông báo cho sinh viên
Route::post('tim-kiem-thong-bao','StudentController@timKiemThongBao');
//Tìm kiếm thông báo chung ở giao diện guest
Route::post('tim-kiem-thong-bao-chung','StudentController@timKiemThongBaoChung');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// ============ Route GVHD
// sv
Route::get('/gvhd/sv', 'GVHD\GVHDController@indexSV');
Route::get('/gvhd/sv/{idSV}/thong-tin', 'GVHD\GVHDController@showSVInfo');
Route::get('/gvhd/sv/{idSV}/cong-viec', 'GVHD\GVHDController@showSVCongViec');
Route::get('/gvhd/sv/{idSV}/ket-qua', 'GVHD\GVHDController@showSVKetQua');

// danh gia sv
Route::get('/gvhd/danh-gia-thuc-tap', 'GVHD\GVHDController@getDanhGia');
Route::post('/gvhd/danh-gia', 'GVHD\GVHDController@postDanhGia');

// thong bao
Route::get('/gvhd/gui-thong-bao', 'GVHD\GVHDController@getGuiTB');
Route::post('/gvhd/gui-tb', 'GVHD\GVHDController@postGuiTB');
Route::get('/gvhd/thong-bao', 'GVHD\GVHDController@getThongBao');
Route::get('/gvhd/thong-bao/{noti_id}/chi-tiet', 'GVHD\GVHDController@chiTietTB');

// thay mat khau
Route::get('/gvhd/thay-mat-khau', 'GVHD\GVHDController@getChangePass');
Route::post('/gvhd/thay-mk', 'GVHD\GVHDController@postChangePass');
