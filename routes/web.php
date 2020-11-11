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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/account/{userId}/{userVerificationToken}/activate', 'Auth\AccountController@verifyToken');
Route::get('/account/waiting-verification', 'Auth\AccountController@waitingVerification');
Route::post('/account/resend-verification', 'Auth\AccountController@resendVerification');

Route::get('/account/forgot-password', 'Auth\AccountController@forgotPassword')->name('forgot.password');
Route::post('/account/forgot-password', 'Auth\AccountController@sendEmailForgotPassword')->name('forgot.password');
Route::get('/account/{resetVerificationToken}/forgot-password', 'Auth\AccountController@verifyForgotToken');
Route::post('/account/reset-password', 'Auth\AccountController@updatePassword')->name('password-reset');

//Route untuk register teacher dan staff

Route::get('/register-student', 'Auth\RegisterController@registerStudent');
Route::get('/register-teacher', 'Auth\RegisterController@registerTeacher');
Route::get('/register-staff', 'Auth\RegisterController@registerStaff');

//Route Untuk Admin, Student, Teacher, Staff TU, jika register dan login maka akan ke halaman ini 
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('admin/dashboard', 'User\UserController@index')->name('dashboard.users');
    Route::get('admin/profile', 'User\UserController@profile');
    Route::get('asset', '');
    Route::get('asset/{id}/detail', '');
    Route::get('asset/tambah', '');
    Route::get('asset/{id}/edit', '');
    Route::get('asset/{id}/hapus', '');
    Route::get('typeassets', '');
    Route::get('typeassets/create', '');
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
    Route::get('laporan', '');
});
