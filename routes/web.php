<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminKelolaAkunController;
use App\Http\Controllers\AdmindataruangController;
use App\Http\Controllers\AdmintransaksiController;
use App\Http\Controllers\ReservatorDashboardController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Dashboard 
Route::group(['middleware' => 'is_admin'], function() {
    Route::resource('admindashboard', 'AdmindashboardController');
});

// Admin kelola akun
Route::group(['middleware' => 'is_admin'], function() {
    Route::resource('adminkelolaakun', 'AdminkelolaakunController');
    Route::get('adminkelolaakun/update', 'AdminKelolaakunController@update')->name('adminkelolaakunupdate');
});

// Admin data ruang
Route::group(['middleware' => 'is_admin'], function() {
    Route::resource('adminruangan', 'AdmindataruangController');
    Route::get('adminruangan/update', 'AdmindataruangController@update')->name('admindataruangupdate');
    // Route::get('adminruangan/edit', 'AdmindataruangController@edit')->name('admindataruangedit');

    // Route::resource('adminruangan', AdmindataruangController::class, ['except' => ['edit']]);
});

// Admin data transaksi
Route::group(['middleware' => 'is_admin', 'prefix' => 'admintransaksi'], function() {
    Route::get('/', [AdmintransaksiController::class,'index'])->name('admintransaksi-index');
    Route::post('/store', [AdmintransaksiController::class,'store'])->name('admintransaksi-store');
    Route::get('/create', [AdmintransaksiController::class,'create'])->name('admintransaksi-create');
    Route::delete('/{id}', [AdmintransaksiController::class,'destroy'])->name('admintransaksi-destroy');
    Route::put('/{transaksi}', [AdmintransaksiController::class,'update'])->name('admintransaksi-update');
    Route::get('transaksi/{transaksi}/edit', [AdmintransaksiController::class,'edit'])->name('admintransaksi-edit');
    Route::get('/{transaksi}/detail',[AdmintransaksiController::class,'detail'])->name('admintransaksi-detail');
    Route::post('/pdf',[AdmintransaksiController::class,'pdf'])->name('admintransaksi-pdf');
    // Route::get('admintransaksipdf', [AdmintransaksiController::class, 'generatePDF']);
    // Route::resource('admintransaksi', 'AdmintransaksiController');
    // Route::get('admintransaksi/update', 'AdmintransaksiController@update')->name('admintransaksiupdate');

});


// PRODUCT
// Route::get('product', [ProductController::class,'index'])->name('product-index');
// Route::post('product/store', [ProductController::class,'store'])->name('product-store');
// Route::get('product/create', [ProductController::class,'create'])->name('product-create');
// Route::delete('product/{id}', [ProductController::class,'destroy'])->name('product-destroy');
// Route::put('product/{product}', [ProductController::class,'update'])->name('product-update');
// // Route::get('product/{id}', [ProductController::class,'show'])->name('product-show');
// Route::get('product/{product}/edit', [ProductController::class,'edit'])->name('product-edit');
// END PRODUCT




//landing page

Route::get('/', 'landingController@index')->name('landingindex');

