<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReservatorDashboardController extends Controller
{
    //
    public function index()
    {
        $use = User::all();
        $penyewa = Transaksi::all();
        $transaksis = Transaksi::all();
        $ruangan = Ruang::all();
        $users = User::latest()->paginate(10);
        return view('reservator.dashboard.index', compact('users','use','penyewa','ruangan','transaksis'));
    }
}
