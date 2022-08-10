<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReservatorkelolaakunController extends Controller
{
    //
        //
        public function index()
        {
            $users = User::latest()->paginate(10);
            return view('reservator.kelolaakun.index', compact('users'));
        }


        public function create()
        {
            return view('reservator.kelolaakun.create');
        }


        public function store(Request $request)
        {
            $this->validate($request, [
                'image'     => 'required|image|mimes:png,jpg,jpeg',
                'name'     => 'required',
                'email'   => 'required',
                'is_admin'   => 'required',
                'password'   => 'required'
            ]);

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/users', $image->hashName());

            $user = User::create([
                'image'     => $image->hashName(),
                'name'     => $request->name,
                'email'   => $request->email,
                'is_admin'   => $request->is_admin,
                'password'   => $request->password,
            ]);

            if($user){
                //redirect dengan pesan sukses
                return redirect()->route('reservator.kelolaakun.index')->with(['success' => 'Data Berhasil Disimpan!']);
            }else{
                //redirect dengan pesan error
                return redirect()->route('reservator.kelolaakun.index')->with(['error' => 'Data Gagal Disimpan!']);
            }
        }



        public function edit(User $user)
        {
            return view('reservator.kelolaakun.edit', compact('user'));
        }


    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'   => 'required',
            'is_admin'   => 'required',
            'password'   => 'required'
        ]);

        //get data Blog by ID
        $user = User::findOrFail($user->first()->id);

        if($request->file('image') == "") {

            $user->update([
                'name'     => $request->name,
                'email'   => $request->email,
                'is_admin'   => $request->is_admin,
                'password'   => $request->password,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/users/'.$user->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/users', $image->hashName());

            $user->update([
                'image'     => $image->hashName(),
                'name'     => $request->name,
                'email'   => $request->email,
                'is_admin'   => $request->is_admin,
                'password'   => $request->password,
            ]);

        }

        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('reservator.kelolaakun.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('reservator.kelolaakun.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }




        public function destroy($id)
        {
        $user = User::findOrFail($id);
        Storage::disk('local')->delete('public/users/'.$user->image);
        $user->delete();

        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('reservator.kelolaakun.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('reservator.kelolaakun.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
        }


}
