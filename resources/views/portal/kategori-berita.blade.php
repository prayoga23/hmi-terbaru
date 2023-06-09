@extends('layouts.portal')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-white">{{ __('Kategori berita Management') }}</h1>

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
      <a href="{{ route('portal.kategori-berita.create') }}" class="btn btn-primary">Input Baru Kategori berita</a>

      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kategori</th>
            <th class="text-secondary opacity-7">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($kategoriberita as $p)
          <tr>
            <td>
              <div class="d-flex py-1">
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">{{ $p->nama_kategori }}</h6>
                </div>
              </div>
            </td>
            <td>
              <a href="{{ route('portal.kategori-berita.edit',$p)}}" class="btn btn-icon btn-2 btn-info">
                <i class="ni ni-ruler-pencil"></i>
              </a>
              <form action="{{ route('portal.kategori-berita.destroy',$p)}}" method="POST">
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