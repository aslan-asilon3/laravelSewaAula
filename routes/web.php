<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// ADMIN
use App\Http\Controllers\AdmindataruangController;
use App\Http\Controllers\AdminkelolaakunController;
use App\Http\Controllers\AdmintransaksiController;
use App\Http\Controllers\AdminlaporanController;

use App\Http\Controllers\ReservatorDashboardController;
use App\Http\Controllers\ReservatorTransaksiController;
use App\Http\Controllers\ReservatorLaporanController;

use App\Http\Controllers\KepalapuskesmasDashboardController;
use App\Http\Controllers\KepalapuskesmaslaporanController;

use App\Http\Controllers\PenyewaDashboardController;
use App\Http\Controllers\PenyewaLaporanController;

use Carbon\Carbon;
use App\Models\Transaksi;

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

//  ADMIN
Route::group(['middleware' => 'is_admin'], function() {

    // Admin Dashboard
    Route::group(['prefix' => 'admindashboard'], function() {
        Route::get('/', [App\Http\Controllers\AdmindashboardController::class,'index'])->name('admindashboard-index');
        // Route::post('/store', [AdmindashboardController::class,'store'])->name('admindashboard-store');
        // Route::get('/create', [AdmindashboardController::class,'create'])->name('admindashboard-create');
        // Route::delete('/{id}', [AdmindashboardController::class,'destroy'])->name('admindashboard-destroy');
        // Route::put('/{dashboard}', [AdmindashboardController::class,'update'])->name('admintdashboardupdate');
        // Route::get('/dashboard/{dashboard}/edit', [AdmindashboardController::class,'edit'])->name('admindashboard-edit');
    });

    // Admin Kelola Akun
    Route::group(['prefix' => 'adminkelolaakun'], function() {
        Route::get('/', [AdminkelolaakunController::class,'index'])->name('adminkelolaakun-index');
        Route::post('/store', [AdminkelolaakunController::class,'store'])->name('adminkelolaakun-store');
        Route::get('/create', [AdminkelolaakunController::class,'create'])->name('adminkelolaakun-create');
        Route::delete('/{id}', [AdminkelolaakunController::class,'destroy'])->name('adminkelolaakun-destroy');
        Route::put('/{user}', [AdminkelolaakunController::class,'update'])->name('adminkelolaakun-update');
        Route::get('/{user}/edit', [AdminkelolaakunController::class,'edit'])->name('adminkelolaakun-edit');
    });

    // // Admin kelola akun
    // Route::group(['middleware' => 'is_admin', 'prefix' => 'adminkelolaakun'], function() {
    //     Route::get('adminkelolaakun/update', 'AdminKelolaakunController@update')->name('adminkelolaakunupdate');
    // });

    // Admin data ruang
    Route::group(['middleware' => 'is_admin', 'prefix' => 'adminruangan'], function() {
        Route::get('/', [AdmindataruangController::class,'index'])->name('admindataruang-index');
        Route::post('/store', [AdmindataruangController::class,'store'])->name('admindataruang-store');
        Route::get('/{ruangan}/edit', [AdmindataruangController::class,'edit'])->name('admindataruang-edit');
        // Route::get('/{ruangan}/edit', [AdmindataruangController::class,'edit'])->name('admindataruang-edit');
        // Route::get('/users', [UserController::class, 'index']);
        Route::get('/create', [AdmindataruangController::class,'create'])->name('admindataruang-create');
        Route::delete('/{id}', [AdmindataruangController::class,'destroy'])->name('admindataruang-destroy');
        Route::put('/{ruangan}', [AdmindataruangController::class,'update'])->name('admindataruang-update');
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


    //  Admin  Laporan
    Route::group(['prefix' => 'adminlaporan'], function() {
        Route::get('/pdf', [AdminlaporanController::class,'pdf'])->name('adminlaporan-pdf');
        Route::get('/', [AdminlaporanController::class,'index'])->name('adminlaporan-index');
    });

});

// RESERVATOR
Route::group(['middleware' => 'is_admin'], function() {

        // Reservator Dashboard
    Route::group(['prefix' => 'reservatordashboard'], function() {
        Route::get('/', [ReservatorDashboardController::class,'index'])->name('reservatordashboard-index');
    });

    // Reservator Transaksi
    Route::group(['prefix' => 'reservatortransaksi'], function() {
        Route::get('/', [ReservatortransaksiController::class,'index'])->name('reservatortransaksi-index');
        Route::post('/store', [ReservatortransaksiController::class,'store'])->name('reservatortransaksi-store');
        Route::get('/create', [ReservatortransaksiController::class,'create'])->name('reservatortransaksi-create');
        Route::delete('/{id}', [ReservatortransaksiController::class,'destroy'])->name('reservatortransaksi-destroy');
        Route::put('/{transaksi}', [ReservatortransaksiController::class,'update'])->name('reservatortransaksi-update');
        Route::get('transaksi/{transaksi}/edit', [ReservatortransaksiController::class,'edit'])->name('reservatortransaksi-edit');
        Route::get('/{transaksi}/detail',[ReservatortransaksiController::class,'detail'])->name('reservatortransaksi-detail');
        Route::get('/generate-pdf', [ReservatortransaksiController::class,'generatePDF'])->name('reservator-pdf');
    });

    //  Reservator  Laporan
    Route::group(['prefix' => 'reservatorlaporan'], function() {
        Route::get('/pdf', [ReservatorlaporanController::class,'pdf'])->name('reservatorlaporan-pdf');
        Route::get('/', [ReservatorlaporanController::class,'index'])->name('reservatorlaporan-index');
    });

});







// Kepala Puskesmas
Route::group(['middleware' => 'is_admin'], function() {

    // Kepala Puskesmas Dashboard
    Route::get('kepalapuskesmas', [KepalapuskesmasDashboardController::class,'index'])->name('kepalapuskesmasdashboard-index');


});

//  Kepala Puskesmas Laporan
Route::group(['middleware' => 'is_admin', 'prefix' => 'kepalapuskesmaslaporan'], function() {
    Route::get('/', [KepalapuskesmasLaporanController::class,'index'])->name('kepalapuskesmaslaporan-index');
});




// Penyewa Dashboard
Route::group(['middleware' => 'is_admin'], function() {

    // Penyewa Dashboard
    Route::group(['prefix' => 'penyewa'], function() {
        Route::get('/', [PenyewaDashboardController::class,'index'])->name('penyewa');
    });


    Route::group(['prefix' => 'penyewalaporan'], function() {
        Route::get('/', [PenyewaLaporanController::class,'index'])->name('penyewalaporan-index');
    });

});
    //  Penyewa Laporan


// Route::group(['middleware' => 'is_admin', 'prefix' => 'salestransaksi'], function() {
//     Route::get('/', [SalestransaksiController::class,'index'])->name('salestransaksi-index');
//     Route::post('/store', [SalestransaksiController::class,'store'])->name('salestransaksi-store');
//     Route::get('/create', [SalestransaksiController::class,'create'])->name('salestransaksi-create');
//     Route::delete('/{id}', [SalestransaksiController::class,'destroy'])->name('salestransaksi-destroy');
//     Route::put('/{sales}', [SalestransaksiController::class,'update'])->name('salestransaksi-update');
//     Route::get('sales/{sales}/edit', [SalestransaksiController::class,'edit'])->name('salestransaksi-edit');
//     Route::get('/{sales}/detail',[SalestransaksiController::class,'detail'])->name('salestransaksi-detail');
// });



// Route::group(['middleware' => 'is_admin', 'prefix' => 'salestransaksi'], function() {
//     Route::get('/', [SalestransaksiController::class,'index'])->name('salestransaksi-index');
//     Route::post('/store', [SalestransaksiController::class,'store'])->name('salestransaksi-store');
//     Route::get('/create', [SalestransaksiController::class,'create'])->name('salestransaksi-create');
//     Route::delete('/{id}', [SalestransaksiController::class,'destroy'])->name('salestransaksi-destroy');
//     Route::put('/{sales}', [SalestransaksiController::class,'update'])->name('salestransaksi-update');
//     Route::get('sales/{sales}/edit', [SalestransaksiController::class,'edit'])->name('salestransaksi-edit');
//     Route::get('/{sales}/detail',[SalestransaksiController::class,'detail'])->name('salestransaksi-detail');
// });



Route::resource('pdf', PdfController::class);
