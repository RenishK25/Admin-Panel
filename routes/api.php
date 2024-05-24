<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get("login",[App\Http\Controllers\UserController::class,'index']);
Route::post("login_form",[App\Http\Controllers\UserController::class,'login']);
Route::post("n_level",[App\Http\Controllers\UserController::class,'n_level']);
// Route::post('/login_form', function (Request $request) {
//     return "hii";
// });

// Route::group(['middleware' => 'auth:sanctum'], function(){

    // Route::apiresource('user', App\Http\Controllers\UserController::class);

Route::post("user",[App\Http\Controllers\UserController::class,'create'])->middleware('auth:sanctum');


    // });