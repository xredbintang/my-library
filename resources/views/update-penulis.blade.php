@extends('template.layout')

@section('title', 'Halaman Create Penerbit')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Penulis</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Update Data Penulis</li>
                </ol>
<div class="container">

    <form action="{{ route('penulis.update', $penulis->penulis_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Penulis</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $penulis->penulis_nama }}" required>
        </div>
        <div class="form-group">
            <label for="tmptlahir">Tempat Lahir</label>
            <input type="text" name="tmptlahir" id="tmptlahir" class="form-control" value="{{ $penulis->penulis_tmptlahir }}" required>
        </div>
        <div class="form-group">
            <label for="tgllahir">Tanggal Lahir</label>
            <input type="date" name="tgllahir" id="tgllahir" class="form-control" value="{{ $penulis->penulis_tgllahir }}" required>
        </div>
        <button type="submit" class="btn btn-dark">Update</button>
    </form>
    </div>
        </main>
    </div>
</div>
@endsection