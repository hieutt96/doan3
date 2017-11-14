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

Route::get('admin/cancel/{id}','Admin\AdminController@cancel');

Route::get('pm-home',['as'=>'pm-home','uses'=>'PM\PMController@show']);

Route::get('hop-tac-doanh-nghiep',['as'=>'hop-tac-doanh-nghiep','uses'=>'Guest\HomeController@dsdoanhnghiep']);

Route::get('/admin/tao-lich-dang-ky-hoc-ky',['as'=>'tao-lich-dang-ky-hoc-ky','uses'=>'Admin\AdminController@create']);

Route::get('admin/accept/{id}','Admin\AdminController@accept');

Route::get('admin-dashboard',['as'=>'admin-dashboard','uses'=>'Admin\AdminController@show_dn']);

Route::get('admin/filter/company/{hocky}','Admin\AdminController@filter_company_hocky');
