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

Route::get('dang-ky-doanh-nghiep', ['as' => 'dang-ky-dn', 'uses' => 'Guest\RegisterController@getRegisterDN']);

Route::post('dang-ky-doanh-nghiep', ['as' => 'dang-ky-dn.post', 'uses' => 'Guest\RegisterController@postRegisterDN']);

Route::get('dang-ky-sinh-vien', ['as' => 'dang-ky-sv', 'uses' => 'Guest\RegisterController@getRegisterSV']);

Route::post('dang-ky-sinh-vien', ['as' => 'dang-ky-sv.post', 'uses' => 'Guest\RegisterController@postRegisterSV']);

Route::get('dang-nhap', ['as' => 'dang-nhap', 'uses' => 'Guest\LoginController@getLogin']);

Route::post('dang-nhap', ['as' => 'dang-nhap.post', 'uses' => 'Guest\LoginController@postLogin']);

Route::get('dang-xuat', ['as' => 'dang-xuat', 'uses' => 'Guest\LoginController@logout']);

// Route::get('admin-dashboard',function (){
// 	return view('admin.index');
// });

Route::get('admin-dashboard', ['as' => 'admin-dashboard', 'uses' => 'Admin\AdminController@show']);
Route::get('/admin/accept/{id}', 'Admin\AdminController@accept');

Route::get('gvhd/{roll_id}', 'GVHD\GVHDController@index_dat');

// =========Routes PM
Route::get('/pm/sv', 'PM\PMController@indexSV');
Route::get('/pm/sv/{idSV}/thong-tin', 'PM\PMController@showSVInfo');

Route::get('/pm/nv', 'PM\PMController@indexNV');
Route::get('/pm/nv/{idLead}/thong-tin-chi-tiet', 'PM\PMController@nvChiTiet');
Route::get('/pm/nv/{idLead}/sinh-vien-huong-dan', 'PM\PMController@nvSVHD');


Route::get('/pm/chua-phan-cong', 'PM\PMController@chuaPhanCong');
Route::post('/pm/phan-cong', 'PM\PMController@phanCong');

Route::get('/pm/da-phan-cong', 'PM\PMController@daPhanCong');
//Route::post('/pm/da-phan-cong', 'PM\PMController@phanCong');

Route::get('pm/search-phan-cong', 'PM\PMController@searchPhanCong');


Route::get('pm/{roll_id}', 'PM\PMController@index_dat');
