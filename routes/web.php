<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AppController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\UserController;
use App\Models\Admin;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
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

// Admin Routes 

Route::get('admin/login', [ AdminController::class , 'login' ])->name('login')->middleware('noBackLogin');
Route::post('admin/auth', [ AdminController::class , 'auth' ])->name('admin.auth');
Route::get('admin/logout', [ AdminController::class , 'logout' ]);
Route::group(['middleware' => ['auth:admin','preventBackHistory'],'prefix'=>'admin'], function()
{
    Route::get('dashboard', [ AdminController::class , 'index' ])->name('admin.dashboard');;
    Route::resource('apps', AppController::class );
    Route::resource('users', UserController::class );
    Route::post('update_user_apps',[UserController::class, 'updateUserApps']);

});

Route::get('/',function(){
//     $admin = new Admin();
//    $admin->name = "admin";
//    $admin->email = "admin@gmail.com";
//    $admin->password = Hash::make("password");
//    $admin->save();

    return redirect('admin/login');
});