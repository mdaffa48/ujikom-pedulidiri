<?php

namespace App\Http\Controllers;

use App\Models\Perjalanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerjalananController extends Controller{

    public function index(){
        if(is_null(auth()->user())){
            return redirect()->route('login');
        }

        $data = Perjalanan::where('id_user', auth()->user()->id)->paginate(10);
        return view('pages.dashboard.data', ['data' => $data]);
    }

    public function simpanPerjalanan(Request $request){
        $data = [
            'id_user'=>auth()->user()->id,
            'tanggal'=>$request->date,
            'jam'=>$request->jam,
            'lokasi'=>$request->lokasi,
            'suhu'=>$request->suhu
        ];

        Perjalanan::create($data);
        return redirect()->route('input')->with('status', 'Data tersimpan');
    }

}
