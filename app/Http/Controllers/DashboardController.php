<?php

namespace App\Http\Controllers;

use App\Models\Perjalanan;
use Illuminate\Http\Request;

class DashboardController extends Controller{

    public function index(){
        if(is_null(auth()->user())){
            return redirect()->route('login');
        }

        $data = Perjalanan::where('id_user', auth()->user()->id)->paginate(10);
        return view('pages.dashboard.data', ['data' => $data]);
    }

    public function cariData(Request $request){
        $tipe_data = $request->tipe_data;
        $data = null;

        if($tipe_data == "tanggal"){
            $data = Perjalanan::where('id_user', auth()->user()->id)
                    ->where('perjalanans.tanggal', 'LIKE', '%' . $request->tanggal . '%')
                    ->paginate(10)
                    ->withQueryString();

        } else if($tipe_data == "lokasi"){
            $data = Perjalanan::where('id_user', auth()->user()->id)
                    ->where('perjalanans.lokasi', 'LIKE', '%' . $request->lokasi . '%')
                    ->paginate(10)
                    ->withQueryString();

        } else if($tipe_data == "suhu"){
            $data = Perjalanan::where('id_user', auth()->user()->id)
                    ->where('perjalanans.suhu', 'LIKE', '%' . $request->suhu . '%')
                    ->paginate(10)
                    ->withQueryString();
        }

        return view('pages.dashboard.data', ['data' => $data]);
    }

    public function sort(Request $request) {
        $sorted = Perjalanan::where('id_user', auth()->user()->id)
                ->orderBy($request->sort_item, $request->sort_type)
                ->paginate(10)
                ->withQueryString();

        return view('pages.dashboard.data', ['data' => $sorted]);
    }

    public function hapusData(Request $request) {
        Perjalanan::find(((int) $request->id))->delete();
        return redirect()->route('daftar-data')->with('dataDeleted', "Data telah berhasil dihapus");
    }

}
