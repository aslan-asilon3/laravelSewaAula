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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Dashboard
Route::group(['middleware' => 'is_admin'], function() {
    Route::resource('admindashboard', 'AdmindashboardController');
});

// kelola akun
Route::group(['middleware' => 'is_admin'], function() {
    Route::resource('adminkelolaakun', 'AdminkelolaakunController');
    Route::get('adminkelolaakun/update', 'AdminKelolaakunController@update')->name('adminkelolaakunupdate');
});

// data ruang
Route::group(['middleware' => 'is_admin'], function() {
    Route::resource('adminruangan', 'AdmindataruangController');
    Route::get('adminruangan/update', 'AdmindataruangController@update')->name('admindataruangupdate');
    // Route::get('adminruangan/edit', 'AdmindataruangController@edit')->name('admindataruangedit');

    // Route::resource('adminruangan', AdmindataruangController::class, ['except' => ['edit']]);
});

// data transaksi
Route::group(['middleware' => 'is_admin'], function() {
    Route::resource('admintransaksi', 'AdmintransaksiController');
    Route::get('admintransaksi/update', 'AdmintransaksiController@update')->name('admintransaksiupdate');
    Route::get('admintransaksi/detail', 'AdmintransaksiController@detail')->name('admintransaksidetail');

    Route::get('admintransaksipdf', [AdmintransaksiController::class, 'generatePDF']);
});



// reservator
Route::group(['middleware' => 'is_admin'], function() {
    Route::get('reservator', 'ReservatorDashboardController@index')->name('reservatorindex');
    Route::resource('reservatorkelolaakun', 'ReservatorkelolaakunController');
    Route::resource('reservatorruangan', 'ReservatordataruangController');

});


// penyewa
Route::group(['middleware' => 'is_admin'], function() {
    Route::get('penyewa', 'ReservatorDashboardController@index')->name('penyewaindex');
});


// kepala puskesmas
Route::group(['middleware' => 'is_admin'], function() {
    Route::get('kepalapuskesmas', 'ReservatorDashboardController@index')->name('kepalapuskesmasindex');
});
