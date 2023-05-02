@extends('layouts.portal')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-white">{{ __('Tambah Berita') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>TAMBAH DATA</strong>
        </div>
        <div class="card-body">
            <a href="/berita" class="btn btn-primary">Kembali</a>
            <br />
            <br />

            <form method="post" action="{{ route('portal.berita.store')}}" enctype="multipart/form-data">

                {{ csrf_field() }}
                @if(session()->has('danger'))
                <div class="text-danger">
                    {{ session()->get("danger")}}
                </div>
                @endif

                <div class="form-group">
                    <label>Judul Artikel</label>
                    <input type="text" name="judul" class="form-control" placeholder="Isi Judul Artikel .." required>
                </div>

                <div class="form-group">
                    <label>Tanggal Rilis</label>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">

                            <input class="form-control datepicker" placeholder="Select date" name="tanggal_rilis"
                                type="date" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi"
                        placeholder="Isi Deskripsi Artikel .." rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <label for="kategori_berita_id">Pilih Kategori Artikel :</label>
                    <select id="kategori_berita_id" name="kategori_berita_id" class="form-control" required>
                        @foreach ($kategoriberita as $p)
                        <option value="{{ $p->id}}">{{$p->nama_kategori}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Upload Gambar</label>
                    <input class="form-control" type="file" name="gambar" id="formFileMultiple" multiple>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>

            </form>

        </div>
    </div>
</div>

@endsection