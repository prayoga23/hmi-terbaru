<?php

namespace App\Http\Controllers;

use App\Kategoriberita;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Validator;
use Session;

class AdminKategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriberita = KategoriBerita::get();
        return view('admin.kategori-berita', [
            'kategoriberita' => $kategoriberita,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori-berita_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriBeritaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
        ]);
        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->route("admin.kategori-berita.create")->with('danger', $validator->errors()->first());
        }
        $kategori = new KategoriBerita();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->route("admin.kategori-berita.index")->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KategoriBerita  $kategoriberita
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriBerita $kategoriberita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriBerita  $kategoriberita
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriBerita $kategoriberita)
    {

        return view('admin.kategori-berita_edit', [
            'kategoriberita' => $kategoriberita,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriBeritaRequest  $request
     * @param  \App\Kategoriberita  $kategoriberita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriBerita $kategoriberita)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
        ]);
        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->route("admin.kategori-berita.edit")->with('danger', $validator->errors()->first());
        }
        $kategoriberita->nama_kategori = $request->nama_kategori;
        $kategoriberita->save();

        return redirect()->route("admin.kategori-berita.index")->with('success', 'Kategori berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriBerita  $kategoriberita
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriBerita $kategoriberita)
    {
        $kategoriberita->delete();
        return redirect()->route("admin.kategori-berita.index")->with('success', 'Kategori berhasil dihapus');
    }
}
