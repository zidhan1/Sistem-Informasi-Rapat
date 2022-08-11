<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Pagination\Paginator;

class PegawaiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataPegawai = Pegawai::leftjoin('divisi', 'pegawai.id_divisi', '=', 'divisi.id')->simplePaginate(5);
        $dataDivisi = Divisi::all();
        return view('pegawai', compact('dataPegawai', 'dataDivisi', 'user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $data = new Pegawai;
        $data->nip = $request->nip;
        $data->id_divisi = $request->divisi;
        $data->nama = $request->nama;
        $data->save();
        return redirect('/pegawai');
    }

    public function destroy($nip)
    {
        $user = Auth::user();
        $data = Pegawai::find($nip);
        $data->delete();
        return redirect('/pegawai');
    }
}
