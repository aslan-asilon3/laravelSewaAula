<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminKelolaAkunController;
use App\Http\Controllers\AdmindataruangController;
use App\Http\Controllers\AdmintransaksiController;

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

    // Route::resource('adminruangan', AdmindataruangController::class, ['except' => ['edit']]);
});

// data transaksi
Route::group(['middleware' => 'is_admin'], function() {
    Route::resource('admintransaksi', 'AdmintransaksiController');
    Route::get('admintransaksi/update', 'AdmintransaksiController@update')->name('admintransaksiupdate');
    Route::get('admintransaksi/detail', 'AdmintransaksiController@detail')->name('admintransaksidetail');
    // Route::get('admintransaksipdf', 'AdmintransaksiController@AdmintransaksiPDF')->name('admintransaksiPDF');
    // Route::get('', '@')->name('admintransaksipdf');
    // Route::get('admintransaksipdf', function () {
    //     return view('admin.transaksi.pdf');
    // });
    Route::get('admintransaksipdf', [AdmintransaksiController::class, 'generatePDF']);
});

//landing page

Route::get('/', 'landingController@index')->name('landingindex');

