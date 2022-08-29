<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use DB;
use Carbon\Carbon;


class KepalapuskesmasLaporanController extends Controller
{
    //
    public function index()
    {
        // $ruangan_group_by = Transaksi::getBatch();
        $transaksis = Transaksi::all();
        return view('kepalapuskesmas.laporan.index', compact('transaksis'));
    }
}
