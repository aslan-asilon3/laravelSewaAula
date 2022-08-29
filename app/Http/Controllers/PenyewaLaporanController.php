<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use DB;
use Carbon\Carbon;

class PenyewaLaporanController extends Controller
{
    //
    public function index()
    {
        // $ruangan_group_by = Transaksi::getBatch();
        $transaksis = Transaksi::all();
        return view('penyewa.laporan.index', compact('transaksis'));
    }
}
