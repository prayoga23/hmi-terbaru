@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-white">{{ __('User Management') }}</h1>

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
            <a href="/publikasi" class="btn btn-primary">Kembali</a>
            <br />
            <br />

            <form method="post" action="{{ route('admin.management.store') }}">

                {{ csrf_field() }}
                @if(session()->has('danger'))
                <div class="text-danger">
                    {{ session()->get("danger")}}
                </div>
                @endif

                <div class="form-group">
                    <label>Nama Depan</label>
                    <input type="text" name="name" class="form-control" placeholder="Isi Nama Depan ..">
                </div>
                <div class="form-group">
                    <label>Nama Belakang</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Isi Nama Belakang ..">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Isi Email ..">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Isi password ..">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>

            </form>

        </div>
    </div>
</div>

@endsection