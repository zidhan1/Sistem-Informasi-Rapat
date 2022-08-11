<?php

namespace App\Http\Controllers;

use App\Models\Rapat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $user = Auth::user();
        $dataNotulen = Rapat::join('notulen', 'rapat.id', '=', 'notulen.id_rapat')
            ->join('divisi', 'rapat.id_divisi', '=', 'divisi.id')
            ->select('rapat.*', 'notulen.file', 'divisi.divisi')
            ->get();
        return view('home', compact('user', 'dataNotulen'));
    }
}
