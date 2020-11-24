<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});



Route::get('/account/{userId}/{userVerificationToken}/activate', 'Auth\AccountController@verifyToken');
Route::get('/account/waiting-verification', 'Auth\AccountController@waitingVerification');
Route::post('/account/resend-verification', 'Auth\AccountController@resendVerification');

Route::get('/account/forgot-password', 'Auth\AccountController@forgotPassword')->name('forgot.password');
Route::post('/account/forgot-password', 'Auth\AccountController@sendEmailForgotPassword')->name('forgot.password');
Route::get('/account/{resetVerificationToken}/forgot-password', 'Auth\AccountController@verifyForgotToken');
Route::post('/account/reset-password', 'Auth\AccountController@updatePassword')->name('password-reset');

//Route untuk register teacher dan staff
Route::get('/choose-register','Auth\RegisterController@chooseRegister');
Route::get('/register-student', 'Auth\RegisterController@registerStudent');
Route::get('/register-teacher', 'Auth\RegisterController@registerTeacher');
Route::get('/register-staff', 'Auth\RegisterController@registerStaff');

//Route Untuk Admin, Student, Teacher, Staff TU, jika register dan login maka akan ke halaman ini 
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('admin/dashboard', 'Admin\AdminPageController@index')->name('dashboard.users');
    Route::get('admin/profile', 'Admin\AdminPageController@profile');
    Route::get('admin/reset-password', 'Admin\AdminPageController@resetPassword');
    /*Route::get('asset', 'Admin\AdminPageController@asset');
    Route::get('manageAssets', 'Admin\AdminPageController@manageAssets');
    Route::get('admin/manageUsers', 'Admin\AdminPageController@manageUsers');*/
    
    Route::get('categoryAsset', 'Admin\CategoryAssetController@index');   
    Route::get('categoryAsset/create', 'Admin\CategoryAssetController@create');   
    Route::get('categoryAsset/store', 'Admin\CategoryAssetController@store'); 

    Route::get('typeAsset', 'Admin\TypeAssetController@index');   
    Route::get('typeAsset/create', 'Admin\TypeAssetController@create');   
    Route::get('typeAsset/store', 'Admin\TypeAssetController@store'); 
    Route::get('typeAsset/delete', 'Admin\TypeAssetController@destroy');

    Route::get('asset', 'Admin\AssetController@index');

  /*
    Route::get('asset/{id}/detail', 'Admin\AdminAssetController@assetDetails');
    Route::get('asset/tambah', 'Admin\AdminAssetController@assetCreate');
    Route::post('asset/tambah', 'Admin\AdminAssetController@assetSaveCreate');
    Route::get('asset/{id}/edit', 'Admin\AdminAssetController@assetEdit');
    Route::get('asset/{id}/hapus', 'Admin\AdminAssetController@assetDelete');
    Route::get('typeAssets/create', 'Admin\AdminAssetController@createTypeAssets');

    
    Route::get('user', '');
    Route::get('user/{id}/detail', '');
    Route::get('user/{id}/{hapus}', '');
    Route::get('borrow/{id}/verifikasi', '');
    Route::get('borrow/{id}/pinjam', '');
    Route::get('pengembalian', '');
    Route::get('borrows/{id}/pengembalian', '');
    Route::get('peminjaman', '');
    Route::get('borrows/{id}/detail', '');
    Route::get('borrows/{id}/lost', '');
    Route::get('laporan', '');*/
});
