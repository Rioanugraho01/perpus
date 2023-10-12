<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class ManajemenPengunjung extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.management', compact('user'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image  = $request->file('image');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName()); 
        $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'prodi' => 'required',
        'status' => 'required',
        'alamat' => 'required|max:255',
        'password' => 'required',
        ]);
        User::create([
            'image' => $result,
            'name' => $request->name,
            'email' => $request->email,
            'prodi' => $request->prodi,
            'status' => $request->status,
            'alamat' => $request->alamat,
            'password' => $request->password,
        ]);
        return redirect()->route('user.index')
        ->with('success', 'Data Saved');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'prodi' => 'required',
            'status' => 'required',
            'alamat' => 'required|max:255',
            'password' => 'required'
        ]);
        $user = User::find($id);
        $file   = $request->file('image');
        $result = CloudinaryStorage::replace($user->image, $file->getRealPath(), $file->getClientOriginalName());
        $user->update([
            'image' => $result,
            'name' => $request->name,
            'email' => $request->email,
            'prodi' => $request->prodi,
            'status' => $request->status,
            'alamat' => $request->alamat,
            'password' => $request->password,
        ]);
        return redirect()->route('user.index')
        ->with('success', 'Data Saved');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        CloudinaryStorage::delete($user->image);
        $user->delete();
        return redirect()->route('user.index')
        ->with('success', 'Data Deleted');
    }
    // routes functions
    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kelolaUser.create');
    }

    public function show($id)
    {
      $user = User::find($id);
      return view('user.show', compact('user'));
    }
    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.kelolaUser.edit', compact('user'));
    }
}
