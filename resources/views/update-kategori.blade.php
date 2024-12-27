@extends('template.layout')

@section('title', 'Halaman Update Kategori')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Updata Kategori</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Update Data Kategori</li>
                </ol>
                <form action="{{ route('kategori.update', $kategori->kategori_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Kategori</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $kategori->kategori_nama }}" required>
        </div>
        <button type="submit" class="btn btn-dark">Update</button>
    </form>
            </div>
        </main>
    </div>
</div>
@endsection