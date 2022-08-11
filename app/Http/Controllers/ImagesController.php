<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Rapat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Parser\Multiple;

class ImagesController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $dataRapat = Rapat::all();
        $dataImages = Images::join('rapat', 'images.id_rapat', '=', 'rapat.id')
            ->select('rapat.id', 'rapat.nama_rapat', 'rapat.tanggal', 'rapat.tempat')->get();
        // dd($dataImages);
        return view('images', compact('user', 'dataImages', 'dataRapat'));
    }

    public function store(Request $request)
    {
        $data = new Images;
        $images = array();
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'public/multiple_image/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $images[] = $image_url;
            }
            Images::insert([
                'images' => implode('|', $images),
                'id_rapat' => $request->rapat,
            ]);
            return back();
        }
    }

    public function showImages($id_rapat)
    {
        $user = Auth::user();
        $image = Images::where('id_rapat', '=', $id_rapat)->first();
        $images = explode('|', $image->images);
        return view('showimages', compact('images', 'user'));
    }
}
