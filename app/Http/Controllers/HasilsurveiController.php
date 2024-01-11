<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jawaban;


class SurveiKepuasan extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hasil = jawaban::all();
        return view('admin.kelolaUser.dashboardsurvei');
    }

    public function store(Request $request){
        // dd($request->all());
        // $kuisioner = pertanyaan::create($request->validated() + ['user_id' => auth()->id()]);
        // $kuisioner->questions()->sync($request->input('questions', []));

        // return redirect()->route('admin.results.index')->with([
        //     'message' => 'successfully created !',
        //     'alert-type' => 'success'
        // ]);
       $user_id = $request->opsi;
       foreach ($user_id as $id => $value) {
            jawaban::create([
                'user_id' => auth()->id(),
                'total_points' => $value,
                // 'komentar' =>$id
            ]);
       }
    }
}
