<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyewaDashboardController extends Controller
{
    //
    public function index()
    {
        $use = User::all();
        $penyewa = Transaksi::all();
        $transaksis = Transaksi::all();
        $ruangan = Ruang::all();
        $users = User::latest()->paginate(10);
        return view('penyewa.dashboard.index', compact('users','use','penyewa','ruangan','transaksis'));
    }
}
