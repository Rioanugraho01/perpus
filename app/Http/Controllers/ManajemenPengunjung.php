<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ManajemenPengunjung extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        return view('admin.management', compact('user'));
    }
    public function create(Request $request) {
        return view('admin.kelolaUser.create');
    }


    public function store(Request $request) {
        $image  = $request->file('image');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName()); 
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'prodi' => $request->prodi,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'password' => $request->password,
            'image' => $result
        ]);
        return redirect()->route('management.index',compact('data'))->with(['success' => 'Data Berhasil Disimpan!']); 
    }
    public function edit(Request $request) {
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.kelolaUser.edit', compact('user'));
    }
    public function update(Request $request, $id) {
        $data = User::find($id);
        $file   = $request->file('gambar');
        $result = CloudinaryStorage::replace($data->gambar, $file->getRealPath(), $file->getClientOriginalName());
        $data->update(['gambar' => $result]);
        
        return redirect()->route('management.index')->with(['success' => 'Data Berhasil Diubah!']);

    }
    public function destroy() {
        $user = User::where('id', Auth::user()->id)->first();
        $user->delete();
        return redirect()->route('management.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
