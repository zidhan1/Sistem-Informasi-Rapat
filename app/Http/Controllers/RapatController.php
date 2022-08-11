<?php

namespace App\Http\Controllers;

use App\Models\Rapat;
use App\Models\Divisi;
use App\Models\Pegawai;
use App\Models\Anggotarapat;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Auth;

class RapatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataRapat = Rapat::join('divisi', 'rapat.id_divisi', '=', 'divisi.id')
            ->select('rapat.*', 'divisi.divisi')
            ->simplePaginate(5);
        $dataDivisi = Divisi::all();
        $anggotarapat = Rapat::leftjoin('anggotarapat', 'rapat.id', '=', 'anggotarapat.id_rapat')
            ->select('rapat.*', 'anggotarapat.nip')
            ->get();
        return view('/rapat', compact('dataRapat', 'dataDivisi', 'anggotarapat', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        $dataDivisi = Divisi::all();
        $dataAnggota = Pegawai::all();
        return view('createrapat', compact('dataDivisi', 'user', 'dataAnggota'));
    }

    public function getEmployees($id_divisi = 0)
    {
        $empData['data'] = Pegawai::where('id_divisi', '=', $id_divisi)->get();
        return response()->jeson($empData);
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        // dd($data);
        $rapat = new Rapat;
        $rapat->id_divisi = $request->divisi;
        $rapat->nama_rapat = $request->nama_rapat;
        $rapat->tempat = $request->tempat;
        $rapat->tanggal = $request->tanggal;
        $rapat->save();

        foreach ($data['pegawai'] as $item => $value) {
            $data2 = array(
                'id_rapat' => $rapat->id,
                'id_divisi' => $rapat->id_divisi,
                'nip' => $data['pegawai'][$item],

            );
            Anggotarapat::create($data2);
        }
        return redirect('/rapat')->with('status', 'Berhasil Update Data');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $data = Rapat::find($id);
        $data->delete();
        return redirect('/rapat')->with('status', 'Berhasil Update Data');
    }

    public function detail($id)
    {
        $user = Auth::user();
        $upper =  Anggotarapat::join('rapat', 'anggotarapat.id_rapat', '=', 'rapat.id')
            ->join('divisi', 'anggotarapat.id_divisi', '=', 'divisi.id')
            ->join('pegawai', 'anggotarapat.nip', '=', 'pegawai.nip')
            ->select('rapat.nama_rapat', 'rapat.tanggal', 'rapat.tempat', 'pegawai.nama', 'divisi.divisi')
            ->where('anggotarapat.id_rapat', '=', $id)
            ->first();
        $detail = Anggotarapat::join('rapat', 'anggotarapat.id_rapat', '=', 'rapat.id')
            ->join('divisi', 'anggotarapat.id_divisi', '=', 'divisi.id')
            ->join('pegawai', 'anggotarapat.nip', '=', 'pegawai.nip')
            ->select('rapat.nama_rapat', 'rapat.tanggal', 'rapat.tempat', 'pegawai.nama', 'divisi.divisi')
            ->where('anggotarapat.id_rapat', '=', $id)
            ->get();
        // dd($detail);
        return view('detail', compact('detail', 'upper', 'user'));
    }
}
