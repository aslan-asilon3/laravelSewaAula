<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use DB;
use Carbon\Carbon;

class AdminlaporanController extends Controller
{
    //
    public function index()
    {
        // $ruangan_group_by = Transaksi::getBatch();
        $transaksis = Transaksi::latest()->paginate(10);
        return view('admin.laporan.index', compact('transaksis'));
    }

}