<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use app\Models\User;
use App\Models\Pengunjung;
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
    
    public function post(Request $request){
        $mytime = Carbon::now();
    	Pengunjung::create([
            'name' => $request->name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'email' => $request->email,
            'prodi' => $request->prodi,
            'status' => $request->status,
            'keperluan' => $request->keperluan,
            'time' => $mytime
        ]);
        return redirect('history');
    }

    public function facescan(){
        return view('facescan');
    }
    # akhirnya presensi

    public function history(){
        $pengunjung = Pengunjung::all();
        return view('historyKunjungan', compact('pengunjung'));
    }

}
