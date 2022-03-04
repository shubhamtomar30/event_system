<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/add_event' , [UserController::class , 'addevent']);
Route::get('/events' , [UserController::class , 'event']);
Route::post('/event_store' , [UserController::class , 'store_event']);
Route::get('/invite/{id}', [UserController::class , 'invite']);
Route::post('/invite_users' , [UserController::class , 'storeinvite']);
