<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Landing\LandingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\Landing\LandingController::class, 'index'])->name('Landing');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/profile', UserController::class)->middleware('auth');
Route::get('/table', [App\Http\Controllers\UserController::class, 'table'])->name('table')->middleware('auth');
Route::get('/ganti', [App\Http\Controllers\Auth\ChangePasswordController::class, 'ganti'])->name('ganti')->middleware('auth');
Route::put('/update-pass', [App\Http\Controllers\Auth\ChangePasswordController::class, 'updatePass'])->name('updatePass')->middleware('auth');
Route::resource('/product', ProductController::class)->middleware('auth')->except('show');

Route::get('/detail/{slug}', [LandingController::class, 'detailproduct'])->name('landing.detail');
Route::get('/search', [ProductController::class, 'search'])->name('search');

//kategori route 
Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori.index')->middleware('auth');
Route::post('/tambah-kategori', [App\Http\Controllers\KategoriController::class, 'addKategori'])->name('kategori.add')->middleware('auth');
Route::put('/edit-kategori/{id}', [App\Http\Controllers\KategoriController::class, 'editKategori'])->name('kategory.edit')->middleware('auth');
Route::delete('/del-kategori/{id}', [App\Http\Controllers\KategoriController::class, 'delKategori'])->name('kategory.destroy')->middleware('auth');



