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

Route::get('dang-ky-doanh-nghiep',['as'=>'dang-ky-dn','uses'=>'Guest\RegisterController@getRegisterDN','middleware'=>'checkdateregisterdn']);

Route::post('dang-ky-doanh-nghiep', ['as' => 'dang-ky-dn.post', 'uses' => 'Guest\RegisterController@postRegisterDN']);

Route::get('dang-ky-sinh-vien',['as'=>'dang-ky-sv','uses'=>'Guest\RegisterController@getRegisterSV','middleware'=>'checkdateregistersv']);

Route::post('dang-ky-sinh-vien', ['as' => 'dang-ky-sv.post', 'uses' => 'Guest\RegisterController@postRegisterSV']);

Route::get('dang-nhap', ['as' => 'dang-nhap', 'uses' => 'Guest\LoginController@getLogin']);

Route::post('dang-nhap', ['as' => 'dang-nhap.post', 'uses' => 'Guest\LoginController@postLogin']);

Route::get('dang-xuat', ['as' => 'dang-xuat', 'uses' => 'Guest\LoginController@logout']);

Route::get('thong-bao/{id}','StudentController@chiTietThongBaoChung');

Route::get('guest/register/congty/hocky','Guest\RegisterController@findCongty');

Route::get('guest/find/leader','Guest\RegisterController@findLeader');

Route::get('/user/comment','StudentController@comment');

Route::get('user/findcomment','StudentController@findcomment');

Route::get('user/editcomment','StudentController@editcomment');

Route::group(['middleware'=>'admin'],function(){

        Route::get('/admin-dashboard',['as'=>'admin-dashboard','uses'=>'Admin\AdminController@show_dn']);

        Route::get('/admin/danh-sach-cong-ty-yeu-cau',['as'=>'company-request','uses'=>'Admin\AdminController@findCompanyRequest']);

        Route::get('admin/managestudent','Admin\AdminController@manageSV');

        Route::get('/admin/assignment_student','Admin\AdminController@assignmentStudent');

        Route::get('/admin/phan-cong-sinh-vien-cho-cong-ty','Admin\AdminController@assignment_student')->middleware('CheckDateAdminAssignmentStudent');
        Route::get('admin/dieu-chinh-phan-cong-sinh-vien-cho-cong-ty','Admin\AdminController@edit_assignment_student')->middleware('CheckDateAdminAssignmentStudent');

        Route::get('admin/edit_assignment_student','Admin\AdminController@editAssignmentStudent');
        
        Route::get('admin/accept/companyRequest/{id}','Admin\AdminController@acceptCompanyRequest');

        Route::get('admin/delete/CompanyRequest/{id}','Admin\AdminController@deleteCompanyRequest');

        Route::get('admin/delete/company/{id}','Admin\AdminController@deleteCompany');

        Route::get('/admin/addlecturer','Admin\AdminController@addlecturer');

        Route::get('admin/them-tai-khoan-giang-vien','Admin\AdminController@addlecturerPost');

        Route::get('admin/quan-li-giang-vien',['as'=>'quan-li-giang-vien','uses'=>'Admin\AdminController@manageLecturer']);

        Route::get('/admin/thong-bao',['as'=>'thong-bao','uses'=>'Admin\AdminController@thongBao']);
        Route::get('/admin/thong-bao-da-gui',['as'=>'thong-bao-da-gui','uses'=>'Admin\AdminController@noticeSent']);

        Route::post('/admin/thong-bao',['as'=>'thong-bao.post','uses'=>'Admin\AdminController@postThongBao']);
        
        Route::get('admin/delete-notice','Admin\AdminController@deleteNotice');

        Route::get('/admin/tao-lich-dang-ky-hoc-ky',['as'=>'tao-lich-dang-ky-hoc-ky','uses'=>'Admin\AdminController@createSemester']);

        Route::post('/admin/tao-lich-dang-ky-hoc-ky',['as'=>'tao-lich-dang-ky-hoc-ky.post','uses'=>'Admin\AdminController@postCreateSemester']);

       Route::get('/admin/chinh-sua-lich-dang-ky/{id}',['as'=>'chinh-sua-hoc-ky','uses'=>'Admin\AdminController@editSemester']);

        Route::post('/admin/chinh-sua-lich-dang-ky/{id}',['as'=>'chinh-sua-hoc-ky.post','uses'=>'Admin\AdminController@editSemesterPost']);

        Route::get('/admin/phan-cong-giang-vien','Admin\AdminController@assignmentLecturer');

       Route::get('/admin/assignment_lecturer','Admin\AdminController@assignmentLecturerForCompany');
});
Route::get('/lecturer/cap-nhap-thong-tin','Lecturer\LecturerController@updateInfo');

Route::group(['middleware'=>'checklecturer'],function(){

    Route::get('/lecturer/manage_student','Lecturer\LecturerController@manageStudent');   

    Route::post('/lecturer/cap-nhap-thong-tin',['as'=>'updateInfoPost','uses'=>'Lecturer\LecturerController@updateInfoPost']);

    Route::get('/lecturer/get-result-student','Lecturer\LecturerController@getResultStudent');

    Route::get('/lecturer/update-result-student','Lecturer\LecturerController@updateResultStudent');

    Route::get('/lecturer/thong-bao','Lecturer\LecturerController@findNoticeOfLecturer');

    Route::get('/lecturer/gui-thong-bao',['as'=>'sent-notice','uses'=>'Lecturer\LecturerController@sentNotice']);

    Route::post('/lecturer/gui-thong-bao','Lecturer\LecturerController@sentNoticePost');

    Route::get('/lecturer/receive',['as'=>'lecturer-receive-notice','uses'=>'Lecturer\LecturerController@receviceNotice']);
});
Route::get('pm-home',['as'=>'pm-home','uses'=>'PM\PMController@show']);

// sv
Route::get('/pm/sv','PM\PMController@indexSV');

Route::get('/pm/sv/{idSV}/thong-tin', 'PM\PMController@showSVInfo');

Route::get('/pm/sv/{idSV}/cong-viec', 'PM\PMController@showSVCongViec');
Route::get('/pm/sv/{idSV}/ket-qua', 'PM\PMController@showSVKetQua');

Route::get('/pm/nv', 'PM\PMController@indexNV');

Route::get('/pm/nv/{idLead}/thong-tin-chi-tiet', 'PM\PMController@nvChiTiet');

Route::get('/pm/nv/{idLead}/sinh-vien-huong-dan', 'PM\PMController@nvSVHD');

Route::post('/pm/nv/edit', 'PM\PMController@postSuaNV');

Route::post('/pm/tao-tk', 'PM\PMController@postTaoTK');

Route::post('/pm/sua-tk', 'PM\PMController@postSuaTK');

Route::post('/pm/xoa-tk', 'PM\PMController@postXoaTK');

Route::get('/pm/phan-cong-leader', 'PM\PMController@getPhanCong');

Route::post('/pm/phan-cong', 'PM\PMController@postPhanCong');

Route::get('/pm/gui-thong-bao', 'PM\PMController@getGuiTB');
Route::post('/pm/gui-tb', 'PM\PMController@postGuiTB');
Route::get('/pm/thong-bao', 'PM\PMController@getThongBao');

Route::get('/pm/thong-bao/{noti_id}/chi-tiet', 'PM\PMController@chiTietTB');

Route::get('/pm/thay-mat-khau', 'PM\PMController@getChangePass');
Route::post('/pm/thay-mk', 'PM\PMController@postChangePass');

Route::get('/leader/sv', 'Leader\LeaderController@indexSV');

Route::get('/leader/sv/{idSV}/thong-tin', 'Leader\LeaderController@showSVInfo');

Route::get('/leader/sv/{idSV}/cong-viec', 'Leader\LeaderController@showSVCongViec');

Route::get('/leader/sv/{idSV}/ket-qua', 'Leader\LeaderController@showSVKetQua');

Route::post('/leader/cap-nhat-cv', 'Leader\LeaderController@postCapNhatCV');

Route::get('/leader/tao-cong-viec', 'Leader\LeaderController@getTaoCV');

Route::post('/leader/tao-cv', 'Leader\LeaderController@postTaoCV');

Route::get('/leader/danh-gia-sv', 'Leader\LeaderController@getDanhGia');

Route::post('/leader/danh-gia', 'Leader\LeaderController@postDanhGia');

Route::get('/leader/gui-thong-bao', 'Leader\LeaderController@getGuiTB');

Route::post('/leader/gui-tb', 'Leader\LeaderController@postGuiTB');

Route::get('/leader/thong-bao', 'Leader\LeaderController@getThongBao');

Route::get('/leader/thong-bao/{noti_id}/chi-tiet', 'Leader\LeaderController@chiTietTB');

Route::get('/leader/thay-mat-khau', 'Leader\LeaderController@getChangePass');

Route::post('/leader/thay-mk', 'Leader\LeaderController@postChangePass');

Route::get('user/change-password','StudentController@getChangePassword');

Route::post('user/change-password','StudentController@postChangePassword');

Route::group(['prefix'=>'student'],function(){

    Route::get('student-info','StudentController@getStudentInfo');

    Route::get('update-student-info','StudentController@getUpdateStudentInfo');
    Route::post('update-student-info','StudentController@postUpdateStudentInfo');

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

Route::get('hop-tac-doanh-nghiep','StudentController@hopTacDoanhNghiep');

Route::get('hop-tac-doanh-nghiep/{id}','StudentController@chiTietDoanhNghiep');

//Liên hệ nhà trường
Route::get('lien-he','StudentController@lienHeNhaTruong');

//Thông báo chung cho Guest
Route::get('thong-bao','StudentController@getThongBaoChung');

Route::post('tim-kiem-thong-bao','StudentController@timKiemThongBao');
//Tìm kiếm thông báo chung ở giao diện guest
Route::post('tim-kiem-thong-bao-chung','StudentController@timKiemThongBaoChung');

Route::get('student/chi-tiet-thuc-tap/{id}','StudentController@detailIntershipStudent');

Auth::routes();
