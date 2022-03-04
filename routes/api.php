<?php

use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('sendmail' , [ResetPasswordController::class , 'sendmail']);
Route::post('change_pass' , [ResetPasswordController::class , 'password_update']);
Route::get('list_of_user_invited/{id}' , [UserController::class , 'list_of_users_invited']);
