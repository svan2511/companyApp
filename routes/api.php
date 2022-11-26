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
    Route::get('profile',[UserController::class , 'userProfile']); 
    Route::get('apps',[UserController::class , 'allApps']);
    Route::get('app/{id}',[UserController::class , 'getSingleApp']);
    Route::get('myApp',[UserController::class , 'allUserApps']);  
});
Route::post('login',[UserController::class,'login']);
Route::post('register',[UserController::class,'register']);
Route::get('tset' , function()
{
return 'test';
});

