<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class AdmintransaksiController extends Controller
{
        public function index()
        {
            // $ruangan_group_by = Transaksi::getBatch();
            $transaksis = Transaksi::latest()->paginate(10);
            return view('admin.transaksi.index', compact('transaksis'));
        }

        public function create()
        {
            // $ruangan_group_by = Transaksi::getBatch();
            $namaruangans = Transaksi::all();
            $keperluans = Transaksi::all();
            return view('admin.transaksi.create', compact('namaruangans','keperluans'));
        }


        public function store(Request $request)
        {
            $this->validate($request, [
                'image'     => 'required|image|mimes:png,jpg,jpeg',
                'noktp'     => 'required',
                'namapenyewa'   => 'required',
                'nohppenyewa'   => 'required',
                'emailpenyewa'   => 'required',
                'alamatpenyewa'   => 'required',
                'tanggalpemakaiandari'   => 'required',
                'tanggalpemakaiansampai'   => 'required',
                'namaruangan'   => 'required',
                'keperluan'   => 'required',
                'diskon'   => '',
                'totalbayar'   => '',
                'keterangan'   => 'required',
            ]);

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/transaksis', $image->hashName());

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
                'diskon'   => $request->diskon,
                'totalbayar'   => $request->totalbayar,
                'keterangan'   => $request->keterangan,
            ]);

            if($transaksi){
                //redirect dengan pesan sukses
                return redirect()->route('admintransaksi.index')->with(['success' => 'Data Berhasil Disimpan!']);
            }else{
                //redirect dengan pesan error
                return redirect()->route('admintransaksi.index')->with(['error' => 'Data Gagal Disimpan!']);
            }
        }



        public function edit(Transaksi $transaksi)
        {
            return view('admin.transaksi.edit', compact('transaksi'));
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
            'diskon'   => 'required',
            'totalbayar'   => 'required',
            'keterangan'   => 'required',
        ]);

        //get data Blog by ID
        $transaksi = Transaksi::findOrFail($transaksi->first()->id);

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
                'diskon'   => $request->diskon,
                'totalbayar'   => $request->totalbayar,
                'keterangan'   => $request->keterangan,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/transaksis/'.$transaksi->image);

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
                'diskon'   => $request->diskon,
                'totalbayar'   => $request->totalbayar,
                'keterangan'   => $request->keterangan,
            ]);

        }

        if($transaksi){
            //redirect dengan pesan sukses
            return redirect()->route('admintransaksi.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admintransaksi.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

        public function destroy($id)
        {
        $transaksi = Transaksi::findOrFail($id);
        Storage::disk('local')->delete('public/transaksis/'.$transaksi->image);
        $transaksi->delete();

        if($transaksi){
            //redirect dengan pesan sukses
            return redirect()->route('admintransaksi.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admintransaksi.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
        }

        public function show(Transaksi $transaksi)
        {
            return view('admin.transaksi.detail', compact('transaksi'));
        }

        public function detail()
        {
            return view('admin.transaksi.detail');
        }

        public function generatePDF()
        {

            // $transaksi = Transaksi::create([
            //     // 'image'     => $image->hashName(),
            //     'noktp'     => $request->noktp,
            //     'namapenyewa'   => $request->namapenyewa,
            //     'nohppenyewa'   => $request->nohppenyewa,
            //     'emailpenyewa'   => $request->emailpenyewa,
            //     'alamatpenyewa'   => $request->alamatpenyewa,
            //     'tanggalpemakaiandari'   => $request->tanggalpemakaiandari,
            //     'tanggalpemakaiansampai'   => $request->tanggalpemakaiansampai,
            //     'namaruangan'   => $request->namaruangan,
            //     'keperluan'   => $request->keperluan,
            //     'diskon'   => $request->diskon,
            //     'totalbayar'   => $request->totalbayar,
            //     'keterangan'   => $request->keterangan,
            // ]);

            $transaksi = Transaksi::all();
            $pdf = PDF::loadView('admin.transaksi.pdf');

            return $pdf->download('Laporan-Transaksi.pdf');

            return redirect()->route('admintransaksi', 'transaksi');

        }

}
