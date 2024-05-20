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
    return view('login');
});
Route::get('/Dashboard', function () {
    return view('dashbord');
});

/*|-------------------------------------------------------------------------
|                       Start Admin Controller Routes
|--------------------------------------------------------------------------*/
Route::get('Logout',[App\Http\Controllers\UserController::class,'usersLogOut']);
Route::get('ChangePassword',[App\Http\Controllers\UserController::class,'changePasswordsPG']);
Route::post('ChangePasswordRe',[App\Http\Controllers\UserController::class,'changePasswords']);
Route::get('UserLogin',[App\Http\Controllers\UserController::class,'Login']);
Route::post('UserLoginRe',[App\Http\Controllers\UserController::class,'userLogin']);

Route::resource('UserInfo', App\Http\Controllers\UserController::class);
Route::get('getAllUserInfo', [App\Http\Controllers\UserController::class, 'getAllUserInfo'])->name('getAllUserInfo');

Route::resource('ServiceInfo',App\Http\Controllers\ServiceController::class);
Route::get('/get/all/ServiceInfo',[App\Http\Controllers\ServiceController::class, 'getAllService'])->name('all.Service');

Route::resource('CustomerInfo',App\Http\Controllers\CustomerController::class);
Route::get('/get/all/CustomerInfo',[App\Http\Controllers\CustomerController::class, 'getAllcustomer_info'])->name('all.CustomerInfo');
/*|-------------------------------------------------------------------------
|                       End Admin Controller Routes
|--------------------------------------------------------------------------*/