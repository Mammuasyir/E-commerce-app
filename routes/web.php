<?php

use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\Landing\LandingController::class, 'index'])->name('Landing');
Route::get('/kategori/{slug}', [\App\Http\Controllers\Landing\LandingController::class, 'perKategori'])->name('landing.kategori');
Route::get('/detail/{slug}', [LandingController::class, 'detailproduct'])->name('landing.detail');
Route::get('/allproduct', [\App\Http\Controllers\Landing\LandingController::class, 'allproduct'])->name('allproduct');
Route::get('/searchallproduct', [\App\Http\Controllers\Landing\LandingController::class, 'searchall'])->name('search.all');
Route::post('/tambah-keranjang', [\App\Http\Controllers\Landing\LandingController::class, 'tambah_keranjang'])->name('landing.tambahcart');
Route::get('/cart', [\App\Http\Controllers\Landing\LandingController::class, 'cart'])->name('landing.cart');
Route::delete('/delcart/{id}', [\App\Http\Controllers\Landing\LandingController::class, 'delcart'])->name('landing.delete');
Route::get('/checkout', [\App\Http\Controllers\Landing\LandingController::class, 'checkout'])->name('landing.checkout');
Route::put('/edit-checkout', [\App\Http\Controllers\Landing\LandingController::class, 'editcheckout'])->name('landing.edit');
Route::get('/history', [\App\Http\Controllers\Landing\LandingController::class, 'history'])->name('landing.history');


Auth::routes(['verify' => true]);

Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified', 'auth');
Route::resource('/profile', UserController::class)->middleware('auth');
Route::get('/table', [App\Http\Controllers\UserController::class, 'table'])->name('table')->middleware('auth');
Route::get('/ganti', [App\Http\Controllers\Auth\ChangePasswordController::class, 'ganti'])->name('ganti')->middleware('auth');
Route::put('/update-pass', [App\Http\Controllers\Auth\ChangePasswordController::class, 'updatePass'])->name('updatePass')->middleware('auth');
Route::resource('/product', ProductController::class)->middleware('auth')->except('show');
Route::get('/search', [ProductController::class, 'search'])->name('search'); 

//kategori route 
Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori.index')->middleware('auth');
Route::post('/tambah-kategori', [App\Http\Controllers\KategoriController::class, 'addKategori'])->name('kategori.add')->middleware('auth');
Route::put('/edit-kategori/{id}', [App\Http\Controllers\KategoriController::class, 'editKategori'])->name('kategory.edit')->middleware('auth');
Route::delete('/del-kategori/{id}', [App\Http\Controllers\KategoriController::class, 'delKategori'])->name('kategory.destroy')->middleware('auth');

// Transaksi route
Route::get('/Transaksi-pending', [App\Http\Controllers\TransaksiController::class, 'pending'])->name('transaksi.pending')->middleware('auth');
Route::put('/edit-pending', [App\Http\Controllers\TransaksiController::class, 'editPending'])->name('pending.edit')->middleware('auth');
Route::get('/Transaksi-lunas', [App\Http\Controllers\TransaksiController::class, 'lunas'])->name('transaksi.lunas')->middleware('auth');
Route::get('/Transaksi-terkirim', [App\Http\Controllers\TransaksiController::class, 'terkirim'])->name('transaksi.terkirim')->middleware('auth');


