<?php

use App\Http\Controllers\front\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('profile',[UserController::class , 'userProfile'])->name('user.profile'); 
    Route::get('apps',[UserController::class , 'allApps'])->name('apps');
    Route::get('app/{id}',[UserController::class , 'getSingleApp'])->name('app.details');
    Route::get('myApp',[UserController::class , 'allUserApps'])->name('user.appa');  
});
Route::post('login',[UserController::class,'login'])->name('user.login');
Route::post('register',[UserController::class,'register'])->name('user.register');
Route::get('tset' , function()
{
    return response()->json([
        'success' => true,
        'message' => 'User Profile',
       
        ]
        , 200); 
});

