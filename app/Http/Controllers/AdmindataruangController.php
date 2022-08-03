<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdmindataruangController extends Controller
{
    //
    public function index()
    {
        $ruangans = Ruang::latest()->paginate(10);
        return view('admin.dataruang.index', compact('ruangans'));
    }


    public function create()
    {
        return view('admin.dataruang.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'namaruangan'     => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/ruangans', $image->hashName());

        $ruangan = Ruang::create([
            'image'     => $image->hashName(),
            'namruangan'     => $request->name,
        ]);

        if($ruangan){
            //redirect dengan pesan sukses
            return redirect()->route('adminruangan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('adminruangan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }



    public function edit(Ruangan $ruangan)
    {
        return view('admin.dataruang.edit', compact('ruangan'));
    }


public function update(Request $request, Ruangan $ruangan)
{
    $this->validate($request, [
        'namaruangan'     => 'required',
    ]);

    //get data Blog by ID
    $ruangan = Ruang::findOrFail($ruangan->first()->id);

    if($request->file('image') == "") {

        $ruangan->update([
            'namaruangan'     => $request->namaruangan,
        ]);

    } else {

        //hapus old image
        Storage::disk('local')->delete('public/ruangans/'.$ruangan->image);

        //upload new image
        $image = $request->file('image');
        $image->storeAs('public/ruangans', $image->hashName());

        $ruangan->update([
            'image'           => $image->hashName(),
            'namaruangan'     => $request->namaruangan,
        ]);

    }

    if($ruangan){
        //redirect dengan pesan sukses
        return redirect()->route('adminruangan.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('adminruangan.index')->with(['error' => 'Data Gagal Diupdate!']);
    }
}




    public function destroy($id)
    {
    $ruangan = Ruang::findOrFail($id);
    Storage::disk('local')->delete('public/ruangans/'.$ruangan->image);
    $ruangan->delete();

    if($ruangan){
        //redirect dengan pesan sukses
        return redirect()->route('adminruangan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('adminruangan.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }

}
