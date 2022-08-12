<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminKelolaAkunController;
use App\Http\Controllers\AdmindataruangController;
use App\Http\Controllers\AdmintransaksiController;
use App\Http\Controllers\AdminlaporanController;

use App\Http\Controllers\ReservatorDashboardController;
use App\Http\Controllers\ReservatorTransaksiController;


use App\Http\Controllers\KepalapuskesmasDashboardController;
use App\Http\Controllers\KepalapuskesmaslaporanController;


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
    // Route::post('/pdf',[AdmintransaksiController::class,'pdf'])->name('admintransaksi-pdf');
    // Route::get('admintransaksipdf', [AdmintransaksiController::class, 'generatePDF']);
    // Route::resource('admintransaksi', 'AdmintransaksiController');
    // Route::get('admintransaksi/update', 'AdmintransaksiController@update')->name('admintransaksiupdate');
});

// Laporan Admin
Route::group(['middleware' => 'is_admin', 'prefix' => 'adminlaporan'], function() {
    Route::get('/', [AdminlaporanController::class,'index'])->name('adminlaporan-index');

});



// Reservator Dashboard 
Route::group(['middleware' => 'is_admin'], function() {
    Route::get('reservatordashboard', [ReservatorDashboardController::class,'index'])->name('reservatordashboard-index');
});

// Reservator Transaksi
Route::group(['middleware' => 'is_admin', 'prefix' => 'reservatortransaksi'], function() {
    Route::get('/', [ReservatortransaksiController::class,'index'])->name('reservatortransaksi-index');
    Route::post('/store', [ReservatortransaksiController::class,'store'])->name('reservatortransaksi-store');
    Route::get('/create', [ReservatortransaksiController::class,'create'])->name('reservatortransaksi-create');
    Route::delete('/{id}', [ReservatortransaksiController::class,'destroy'])->name('reservatortransaksi-destroy');
    Route::put('/{transaksi}', [ReservatortransaksiController::class,'update'])->name('reservatortransaksi-update');
    Route::get('transaksi/{transaksi}/edit', [ReservatortransaksiController::class,'edit'])->name('reservatortransaksi-edit');
    Route::get('/{transaksi}/detail',[ReservatortransaksiController::class,'detail'])->name('reservatortransaksi-detail');
});

//  Reservator  Laporan 
Route::group(['middleware' => 'is_admin', 'prefix' => 'reservatorlaporan'], function() {
    Route::get('/', [ReservatorlaporanController::class,'index'])->name('reservatorlaporan-index');

});


// Kepala Puskesmas Dashboard 
Route::group(['middleware' => 'is_admin'], function() {
    Route::get('kepalapuskesmas', [KepalapuskesmasDashboardController::class,'index'])->name('kepalapuskesmasdashboard-index');
});

//  Kepala Puskesmas Laporan 
Route::group(['middleware' => 'is_admin', 'prefix' => 'reservatorlaporan'], function() {
    Route::get('/', [KepalapuskesmasLaporanController::class,'index'])->name('kepalapuskesmaslaporan-index');

});




// Penyewa Dashboard 
Route::group(['middleware' => 'is_admin'], function() {
    Route::get('penyewa', [PenyewaDashboardController::class,'index'])->name('penyewa');
});

//  Penyewa Laporan 
Route::group(['middleware' => 'is_admin', 'prefix' => 'penyewalaporan'], function() {
    Route::get('/', [PenyewaLaporanController::class,'index'])->name('penyewalaporan-index');

});

