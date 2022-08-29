<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class ReservatorlaporanController extends Controller
{
    //
    public function pdf(Request $r)
    {
        if ($r->input('start_date') || $r->input('start_date')) {
            $start_date = Carbon::parse($r->input('start_date'))->toDateTimeString();
            $end_date = Carbon::parse($r->input('end_date'))->toDateTimeString();
            $transaksis = Transaksi::whereBetween('tanggalpemakaiandari',[$start_date,$end_date])->get();
        } else {
            $transaksis = Transaksi::latest()->get();
        }
        $pdf = Pdf::loadView('reservator.laporan.pdf', compact('transaksis'));
        return $pdf->setPaper('a4','landscape')->download('reservatorLaporan.pdf');
    }

    public function index(Request $r)
    {
        if ($r->input('start_date') || $r->input('start_date')) {
            $start_date = Carbon::parse($r->input('start_date'))->toDateTimeString();
            $end_date = Carbon::parse($r->input('end_date'))->toDateTimeString();
            $transaksis = Transaksi::whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $transaksis = Transaksi::latest()->get();
        }
        $raw_start_date=$r->input('start_date');
        $raw_end_date=$r->input('end_date');

        return view('/reservator/laporan/index', compact('transaksis'))->with('raw_start_date',$raw_start_date)->with('raw_end_date',$raw_end_date);
    }
}
