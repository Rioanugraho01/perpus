<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) {
        $user = User::all();
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {

        $user = User::where('id', Auth::user()->id)->first();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->no_telp = $request->no_telp;
    	$user->update();
        return redirect()->route('profile.index')
        ->with('success', 'Data Saved');
    }
}
