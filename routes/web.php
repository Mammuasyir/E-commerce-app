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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/profile', UserController::class);
Route::get('/table', [App\Http\Controllers\UserController::class, 'table'])->name('table');
Route::get('/ganti', [App\Http\Controllers\Auth\ChangePasswordController::class, 'ganti'])->name('ganti');
Route::put('/update-pass', [App\Http\Controllers\Auth\ChangePasswordController::class, 'updatePass'])->name('updatePass');
