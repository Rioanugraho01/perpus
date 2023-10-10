<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
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
        return view('admin.dashboard');
    }

    public function pengguna(){
        $pengguna = User::all();
        return view('admin.pengunjung' ,compact('pengguna'));
    }

    #Kelola User
    public function kelolaUser(){
        $user = User::all();
        return view('admin.manajemenpengunjung' , compact('user'));
    }

}
