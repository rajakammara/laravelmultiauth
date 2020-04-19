<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admins/admin')->middleware('auth:admin');

Auth::routes();

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/test', function () {
        dd("Admin Route Working");
    });  
    Route::get('/changepassword', function(){
        return view('admins.changePassword');
    });

    Route::post('/changepassword', 'ChangePasswordController@store');
   
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/test', function () {
        dd("User Route Working");
    });

    Route::get('/changepassworduser', function(){
        return view('users.changePassword');
    });

    Route::post('/changepassworduser', 'ChangePasswordController@storeuser');
   
});



//Route::get('/home', 'HomeController@index')->name('home');
