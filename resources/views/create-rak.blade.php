@extends('template.layout')

@section('title', 'Create Rak')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Rak</h1>
                <form action="{{ route('rak.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="rak_nama">Nama Rak</label>
                        <input type="text" name="rak_nama" id="rak_nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="rak_lokasi">Lokasi Rak</label>
                        <input type="text" name="rak_lokasi" id="rak_lokasi" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="rak_kapasitas">Kapasitas Rak</label>
                        <input type="number" name="rak_kapasitas" id="rak_kapasitas" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
