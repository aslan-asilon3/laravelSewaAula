<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class LandingController extends Controller
{
    //
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('welcome', compact('transaksis'));

    }


}
