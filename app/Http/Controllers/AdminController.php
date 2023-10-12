<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengunjung;

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

    #Kelola User
    public function kelolaUser(){
        $user = User::all();
        return view('admin.manajemenpengunjung' , compact('user'));
    }

    #Pengunjung Perpustakaan
    public function pengunjung(){
        $pengunjung = Pengunjung::all();
        return view('admin.pengunjung', compact('pengunjung'));
    }

}
