<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use DB;
use Carbon\Carbon;

class ReservatortransaksiController extends Controller
{
    //
    public function index()
    {
        // $ruangan_group_by = Transaksi::getBatch();
        $transaksis = Transaksi::latest()->paginate(10);
        return view('reservator.transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        // $ruangan_group_by = Transaksi::getBatch();
        $namaruangans = Transaksi::all();
        $keperluans = Transaksi::all();
        return view('reservator.transaksi.create', compact('namaruangans','keperluans'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'image|mimes:png,jpg,jpeg',
            'noktp'     => 'required',
            'namapenyewa'   => 'required',
            'nohppenyewa'   => 'required',
            'emailpenyewa'   => 'required',
            'alamatpenyewa'   => 'required',
            'tanggalpemakaiandari'   => 'required',
            'tanggalpemakaiansampai'   => 'required',
            'namaruangan'   => 'required',
            'keperluan'   => 'required',
            'totalbayar'   => 'required',
            'keterangan'   => 'required',
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/transaksiimage', $image->hashName());

        $transaksi = Transaksi::create([
            'image'     => $image->hashName(),
            'noktp'     => $request->noktp,
            'namapenyewa'   => $request->namapenyewa,
            'nohppenyewa'   => $request->nohppenyewa,
            'emailpenyewa'   => $request->emailpenyewa,
            'alamatpenyewa'   => $request->alamatpenyewa,
            'tanggalpemakaiandari'   => $request->tanggalpemakaiandari,
            'tanggalpemakaiansampai'   => $request->tanggalpemakaiansampai,
            'namaruangan'   => $request->namaruangan,
            'keperluan'   => $request->keperluan,
            'totalbayar'   => $request->totalbayar,
            'keterangan'   => $request->keterangan,
        ]);

        if($transaksi){
            //redirect dengan pesan sukses
            return redirect()->route('admintransaksi-index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admintransaksi-index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }



    public function edit(Transaksi $transaksi)
    {
        return view('reservator.transaksi.edit', compact('transaksi'));
        // return view('reservator.transaksi.detail', compact('transaksi'));
    }


public function update(Request $request, Transaksi $transaksi)
{
    $this->validate($request, [
        'noktp'     => 'required',
        'namapenyewa'   => 'required',
        'nohppenyewa'   => 'required',
        'emailpenyewa'   => 'required',
        'alamatpenyewa'   => 'required',
        'tanggalpemakaiandari'   => 'required',
        'tanggalpemakaiansampai'   => 'required',
        'namaruangan'   => 'required',
        'keperluan'   => 'required',
        'totalbayar'   => 'required',
        'keterangan'   => 'required',
    ]);

    //get data Blog by ID
    $transaksi = Transaksi::findOrFail($transaksi->id);

    if($request->file('image') == "") {

        $transaksi->update([
            'noktp'     => $request->noktp,
            'namapenyewa'   => $request->namapenyewa,
            'nohppenyewa'   => $request->nohppenyewa,
            'emailpenyewa'   => $request->emailpenyewa,
            'alamatpenyewa'   => $request->alamatpenyewa,
            'tanggalpemakaiandari'   => $request->tanggalpemakaiandari,
            'tanggalpemakaiansampai'   => $request->tanggalpemakaiansampai,
            'namaruangan'   => $request->namaruangan,
            'keperluan'   => $request->keperluan,
            'totalbayar'   => $request->totalbayar,
            'keterangan'   => $request->keterangan,
        ]);

    } else {

        //hapus old image
        Storage::disk('local')->delete('public/transaksiimage'.$transaksi->image);

        //upload new image
        $image = $request->file('image');
        $image->storeAs('public/transaksis', $image->hashName());

        $transaksi->update([
            'image'     => $image->hashName(),
            'noktp'     => $request->noktp,
            'namapenyewa'   => $request->namapenyewa,
            'nohppenyewa'   => $request->nohppenyewa,
            'emailpenyewa'   => $request->emailpenyewa,
            'alamatpenyewa'   => $request->alamatpenyewa,
            'tanggalpemakaiandari'   => $request->tanggalpemakaiandari,
            'tanggalpemakaiansampai'   => $request->tanggalpemakaiansampai,
            'namaruangan'   => $request->namaruangan,
            'keperluan'   => $request->keperluan,
            'totalbayar'   => $request->totalbayar,
            'keterangan'   => $request->keterangan,
        ]);

    }

    if($transaksi){
        //redirect dengan pesan sukses
        return redirect()->route('reservatortransaksi-index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('reservatortransaksi-index')->with(['error' => 'Data Gagal Diupdate!']);
    }
}

    public function destroy($id)
    {
    $transaksi = Transaksi::findOrFail($id);
    Storage::disk('local')->delete('public/transaksiimage'.$transaksi->image);
    $transaksi->delete();

    if($transaksi){
        //redirect dengan pesan sukses
        return redirect()->route('reservatortransaksi-index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('reservatortransaksi-index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }

    public function show($memberID)
    {
        $transaksi= Transaksi::find($memberID); //This will fetch the respective record from the table.
        return view('reservator.transaksi.detail',compact('transaksi'));
    }

    public function detail(Transaksi $transaksi)
    {
        // $transaksi= Transaksi::find($transaksi)->get()->first(); //This will fetch the respective record from the table.

        return view('reservator.transaksi.detail',compact('transaksi'));

    }



}
