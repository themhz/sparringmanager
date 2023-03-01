<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\UsermartialartsController;
use App\Http\Controllers\Api\V1\SessionsController;
use App\Http\Controllers\Api\V1\MartialartsController;
use App\Http\Controllers\Api\V1\GymsController;
use App\Http\Controllers\Api\V1\GymOwnersController;
use App\Http\Controllers\Api\V1\FightsController;


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

Route::middleware('auth:api')->group(function () {
    Route::get('users', [UserController::class,'index2']);
    Route::post('users', [UserController::class,'store']);
    Route::get('users/{id}', [UserController::class,'show']);
    Route::put('users/{id}/edit', [UserController::class,'update']);
    Route::delete('users/{id}/delete', [UserController::class,'delete']);
    Route::get('users/email/{email}', [UserController::class,'showByEmail']);


    Route::get('usermartialarts', [UsermartialartsController::class,'index']);
    Route::post('usermartialarts', [UsermartialartsController::class,'store']);


    Route::get('sessions', [SessionsController::class,'index']);
    Route::post('sessions', [SessionsController::class,'store']);

    Route::get('martialarts', [MartialartsController::class,'index']);
    Route::post('martialarts', [MartialartsController::class,'store']);

    Route::get('gyms', [GymsController::class,'index']);

    Route::get('gymowners', [GymOwnersController::class,'index']);

    Route::get('fights', [FightsController::class,'index']);
});






//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//Route::group(['prefix'=>'v1', 'namespace'=>'App\Http\Controllers\Api\V1'], function(){
//    Route::apiResource('users',UserController::class);
//});
//Route::get('/users', 'UserController@index');
//Route::get('/users', [UserController::class, 'index']);
//Route::get('/users/{id}', 'UserController@show');
//Route::get('/users/id/{id}/email/{email}', 'UserController@show');




