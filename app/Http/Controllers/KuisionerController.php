<?php

namespace App\Http\Controllers;

use App\Models\jawaban;
use App\Models\Kuisioner;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\pertanyaan;
use App\Models\Opsi;



class KuisionerController extends Controller
{
    public function index(){
        // return view('surveikepuasan');
        $kuisioner = pertanyaan::all();
        $opsiSurvei = Opsi::all();
        return view('surveikepuasan', compact('kuisioner','opsiSurvei'));
    }

    public function option(){
        // return view()
    // return view('show_option',compact('opsiSurvei'));

    }


}
