<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReservatordataruangController extends Controller
{
    //
    public function index()
    {
        $ruangans = Ruang::latest()->paginate(10);
        return view('reservator.dataruang.index', compact('ruangans'));
    }
}
