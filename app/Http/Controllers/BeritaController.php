<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\KategoriBerita;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $kategori_list = KategoriBerita::get();
        $berita_list = Berita::with("kategori")->paginate(3);
        $kategori = "Semua";
        if ($request->has('kategori')) {
            $kategori_opt = KategoriBerita::where('nama_kategori', $request->kategori)->firstOrFail();
            $berita_list = berita::where("kategori_berita_id", $kategori_opt->id)->paginate(3);
            $kategori = $request->kategori;
        }
        // dd($berita_list);
        return view('frontend.berita', [
            'kategori_list' => $kategori_list,
            'berita_list' => $berita_list,
            'kategori' => $kategori,
        ]);
    }
    public function detail($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('frontend.berita-detail', [
            'berita' => $berita,
        ]);
    }
}
