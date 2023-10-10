<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;

class BottombarController extends Controller
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

    #mulainya presensi
    public function index()
    {
        return view('presensi');
    }

    public function geolokasi() {
        return view('geolokasi');
    }
    public function facescan(){
        return view('facescan');
    }
    # akhirnya presensi

    #ini profile
    public function profile()
    {
    	$user = User::where('id', Auth::user()->id)->first();

    	return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $file   = $request->file('image');
        $result = CloudinaryStorage::upload($file->getRealPath(), $file->getClientOriginalName()); 
        $user->update(['image' => $result]);
    	return redirect('profile');
    }

}
