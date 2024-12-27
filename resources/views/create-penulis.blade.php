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
                    <li class="breadcrumb-item active">Halaman Create Data Penulis</li>
                </ol>
<form action="{{ route('penulis.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Penulis</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tmptlahir">Tempat Lahir</label>
            <input type="text" name="tmptlahir" id="tmptlahir" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tgllahir">Tanggal Lahir</label>
            <input type="date" name="tgllahir" id="tgllahir" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>

</div>
        </main>
    </div>
</div>
@endsection
