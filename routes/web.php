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

// =========Routes PM
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

// phan cong leader
Route::get('/pm/phan-cong-leader', 'PM\PMController@getPhanCong');
Route::post('/pm/phan-cong', 'PM\PMController@postPhanCong');

// thong bao
Route::get('/pm/gui-thong-bao', 'PM\PMController@getGuiTB');
Route::post('/pm/gui-tb', 'PM\PMController@postGuiTB');
Route::get('/pm/thong-bao', 'PM\PMController@getThongBao');
Route::get('/pm/thong-bao/{noti_id}/chi-tiet', 'PM\PMController@chiTietTB');



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
