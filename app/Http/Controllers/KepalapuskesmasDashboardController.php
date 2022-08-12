<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;
use App\Models\Transaksi;
use App\Models\User;

class KepalapuskesmasDashboardController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        $penyewa = Transaksi::all();
        $transaksis = Transaksi::all();
        $ruangan = Ruang::all();
        return view('kepalapuskesmas.dashboard.index', compact('users','penyewa','ruangan','transaksis'));
    }
}
