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

Route::get('/test', function (){
    return view('test');
});
Route::post('/test', function (){
    return back()->withToastError('Gagal');
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
Route::post('/register-student', 'Auth\RegisterController@registerSaveStudent');

Route::get('/register-teacher', 'Auth\RegisterController@registerTeacher');
Route::post('/register-teacher', 'Auth\RegisterController@registerSaveTeacher');

Route::get('/register-staff', 'Auth\RegisterController@registerStaff');

//Route Untuk Admin, Student, Teacher, Staff TU, jika register dan login maka akan ke halaman ini
Route::group(['middleware' => ['auth', 'verified', 'DisablePreventBack' ]], function () {
    Route::get('dashboard', 'AdminPageController@index')->name('dashboard');
    Route::get('admin/profile', 'AdminPageController@profile');
    Route::get('admin/change-profile', 'AdminPageController@changeProfile');
    Route::post('admin/change-profile', 'AdminPageController@saveChangeProfile');
    Route::get('admin/user', 'AdminPageController@manageUsers');
    Route::get('admin/detailUser/{id}', 'AdminPageController@detail');
    Route::get('admin/user/status/{id}', 'AdminPageController@status');


    Route::get('/create/categori-primary','CategoryAssetController@StoreCatPrimary');
    Route::get('categoryAsset', 'CategoryAssetController@index');
    Route::get('categoryAsset/create', 'CategoryAssetController@create');
    Route::get('categoryAsset/store', 'CategoryAssetController@store');

    Route::get('typeAsset', 'TypeAssetController@index');
    Route::get('typeAsset/create', 'TypeAssetController@create');
    Route::post('typeAsset/store', 'TypeAssetController@store');
    Route::get('typeAsset/delete', 'TypeAssetController@destroy');

    Route::get('asset', 'AssetController@index');
    Route::get('asset/create', 'AssetController@create');
    Route::post('asset/create', 'AssetController@store');
    Route::get('asset/{id}', 'AssetController@show');
    Route::get('asset/historyasset/{id}', 'AssetController@historyasset');
    Route::get('asset/repair/{id}', 'AssetController@repair');
    Route::get('asset/{id}/destroy', 'AssetController@destroy');
    Route::get('asset/{id}/edit', 'AssetController@edit');
    Route::post('asset/{id}/edit', 'AssetController@update');


    Route::get('lists-borrow', 'BorrowsController@index');
    Route::get('borrows-asset', 'BorrowsController@borrowsItem');
    Route::post('borrows-asset', 'BorrowsController@save');
    Route::get('borrows-asset/verify/{id}', 'BorrowsController@verify');
    Route::get('lists-borrow/{id}', 'BorrowsController@show');



    //Route::get('return/add/{id}', 'BorrowsController@returnAdd');
    Route::get('return/list-return', 'BorrowsController@listreturn');
    Route::get('return/list-return/{id}', 'BorrowsController@listreturnDetail');

    Route::get('return/print', 'BorrowsController@print');
    Route::get('return/history', 'BorrowsController@History');


    Route::get('return/{id}/delete','BorrowsController@destroy');
    Route::get('/return/{id}/{slug}', 'BorrowsController@Return');
    Route::get('/return/{id}/all/{slug}', 'BorrowsController@ReturnAll');



  /*
    Route::get('asset/{id}/detail', 'Admin\AdminAssetController@assetDetails');
    Route::post('asset/tambah', 'Admin\AdminAssetController@assetSaveCreate');
    Route::get('asset/{id}/edit', 'Admin\AdminAssetController@assetEdit');
    Route::get('asset/{id}/hapus', 'Admin\AdminAssetController@assetDelete');
    Route::get('typeAssets/create', 'Admin\AdminAssetController@createTypeAssets');


    Route::get('user', '');
    Route::get('user/{id}/detail', '');
    Route::get('user/{id}/{hapus}', '');
    Route::get('borrow/{id}/verifikasi', '');

    Route::get('pengembalian', '');
    Route::get('borrows/{id}/pengembalian', '');
    Route::get('peminjaman', '');
    Route::get('borrows/{id}/detail', '');
    Route::get('borrows/{id}/lost', '');
    Route::get('laporan', '');*/
});
