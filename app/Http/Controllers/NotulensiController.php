<?php

namespace App\Http\Controllers;

use App\Models\Rapat;
use App\Models\Notulensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotulensiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataNotulen = Rapat::leftjoin('notulen', 'rapat.id', '=', 'notulen.id_rapat')
            ->leftjoin('divisi', 'rapat.id_divisi', '=', 'divisi.id')
            ->select('rapat.*', 'notulen.file', 'notulen.undangan', 'divisi.divisi')
            ->get();
        return view('notulensi', compact('dataNotulen', 'user'));
    }

    public function store(Request $request)
    {
        $data = new Notulensi;
        //File Notulen
        $dokumen = $request->file('file');
        $nama_dokumen = 'FT' . date('Ymdhis') . '.' . $request->file('file')->getClientOriginalExtension();
        $dokumen->move('dokumen/', $nama_dokumen);

        //File Undangan
        $undangan = $request->file('undangan');
        $nama_undangan = 'UD' . date('Ymdhis') . '.' . $request->file('undangan')->getClientOriginalExtension();
        $undangan->move('dokumen/', $nama_undangan);

        $data->id_rapat = $request->rapat;
        $data->file = $nama_dokumen;
        $data->undangan = $nama_undangan;
        // dd($data);
        $data->save();
        return redirect('/notulensi');
    }
}
