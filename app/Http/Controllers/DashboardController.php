<?php

namespace App\Http\Controllers;

use App\Models\Rapat;
use App\Models\Divisi;
use App\Models\Pegawai;
use App\Models\Anggotarapat;
use App\Models\Notulensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataPegawai = Pegawai::join('divisi', 'pegawai.id_divisi', '=', 'divisi.id')
            ->select('pegawai.*', 'divisi.id')
            ->simplePaginate(3);
        $totalPegawai = Pegawai::count();
        $totalRapat = Rapat::count();
        $totalNotulensi = Notulensi::count();
        return view('dashboard', compact('dataPegawai', 'totalPegawai', 'totalRapat', 'user', 'totalNotulensi'));
    }

    public function statistik($nip, $id_divisi)
    {
        $user = Auth::user();
        $dataAbsen = Anggotarapat::join('pegawai', 'anggotarapat.nip', '=', 'pegawai.nip')
            ->join('divisi', 'pegawai.id_divisi', '=', 'divisi.id')
            ->select('anggotarapat.*', 'pegawai.nama', 'divisi.id as id_divisi')
            ->where('anggotarapat.nip', '=', $nip)->count();
        $dataTotal = Rapat::where('id_divisi', '=', $id_divisi)->count();
        $infoPegawai = Pegawai::join('divisi', 'pegawai.id_divisi', '=', 'divisi.id')
            ->select('pegawai.*', 'divisi.divisi')
            ->where('pegawai.nip', '=', $nip)->get();
        return view('statistik', compact('dataAbsen', 'dataTotal', 'infoPegawai', 'user'));
    }
}
