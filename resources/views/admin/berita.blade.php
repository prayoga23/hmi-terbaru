@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-white">{{ __('Berita Management') }}</h1>

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
<div class="card">

    <div class="table-responsive">
        <div class="card-body py-3">
            <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">Input Baru Berita</a>
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul artikel
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal
                            Rilis</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Deskripsi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Gambar</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Kategori</th>
                        <th class="text-secondary opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($berita as $p)
                    <tr>
                        <td>
                            <div class="d-flex py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs">{{ $p->judul }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-secondary text-xs font-weight-bold">{{ $p->tanggal_rilis }}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0">{{ substr($p->deskripsi,0,70) }}...</p>
                        </td>
                        <td class="align-middle text-center">
                            <img src="{{ asset($p->gambar) }}" class="avatar avatar-lg">
                        </td>
                        <td class="align-middle text-center">
                            <span class="badge badge bg-gradient-success">{{ $p->kategori->nama_kategori }}</span>
                            {{-- <span class="text-secondary text-xs font-weight-bold">{{ $p->kategori }}</span> --}}

                        </td>
                        <td class="align-middle">
                            <a href="{{ route('admin.berita.edit',$p)}}" class="btn btn-icon btn-2 btn-info">
                                <i class="ni ni-ruler-pencil"></i>
                            </a>
                            <form action="{{ route('admin.berita.destroy',$p)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-2 btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection