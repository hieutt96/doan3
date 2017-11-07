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

Route::get('/', function () {
    return view('guest.home');
});

Route::get('dang-ky-doanh-nghiep',['as'=>'dang-ky-dn','uses'=>'Guest\RegisterController@getRegisterDN']);

Route::post('dang-ky-doanh-nghiep',['as'=>'dang-ky-dn.post','uses'=>'Guest\RegisterController@postRegisterDN']);

Route::get('dang-ky-sinh-vien',['as'=>'dang-ky-sv','uses'=>'Guest\RegisterController@getRegisterSV']);

Route::post('dang-ky-sinh-vien',['as'=>'dang-ky-sv.post','uses'=>'Guest\RegisterController@postRegisterSV']);

Route::get('dang-nhap',['as'=>'dang-nhap','uses'=>'Guest\LoginController@getLogin']);

Route::post('dang-nhap',['as'=>'dang-nhap.post','uses'=>'Guest\LoginController@postLogin']);

Route::get('dang-xuat',['as'=>'dang-xuat','uses'=>'Guest\LoginController@logout']);

// Route::get('admin-dashboard',function (){
// 	return view('admin.index');
// });

Route::get('admin-dashboard',['as'=>'admin-dashboard','uses'=>'Admin\AdminController@show']);
Route::get('/admin/accept/{id}','Admin\AdminController@accept');

Route::get('admin-dat/{roll_id}', 'Admin\AdminController@index_dat');

//--------------Start Students-Nhất-------------------------//
Route::group(['prefix'=>'student'],function(){
    Route::get('change-password','StudentController@getChangePassword');
    Route::post('change-password','StudentController@postChangePassword');

    Route::get('student-info','StudentController@getStudentInfo');
    Route::post('student-info','StudentController@postStudentInfo');
    Route::get('update-student-info','StudentController@getUpdateStudentInfo');
    Route::post('update-student-info','StudentController@postUpdateStudentInfo');

});
Route::group(['prefix'=>'comment'],function(){
  
    Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');
});
//---------------End Students-Nhất-------------------------//
