@extends('template.layout')

@section('title', 'Halaman Edit Buku')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Buku</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Edit Data Buku</li>
                </ol>
                <form action="{{ route('buku.update', $buku->buku_id) }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-light">
                    @csrf
                    @method('PATCH')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="buku_judul" class="form-label">Judul Buku</label>
                            <input type="text" name="buku_judul" id="buku_judul" class="form-control" placeholder="Masukkan judul buku" value="{{ $buku->buku_judul }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="buku_penulis_id" class="form-label">Penulis</label>
                            <select name="buku_penulis_id" id="buku_penulis_id" class="form-select" required>
                                @foreach($penulis as $penulis_item)
                                    <option value="{{ $penulis_item->penulis_id }}" {{ $buku->buku_penulis_id == $penulis_item->penulis_id ? 'selected' : '' }}>
                                        {{ $penulis_item->penulis_nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="buku_penerbit_id" class="form-label">Penerbit</label>
                            <select name="buku_penerbit_id" id="buku_penerbit_id" class="form-select" required>
                                @foreach($penerbit as $penerbit_item)
                                    <option value="{{ $penerbit_item->penerbit_id }}" {{ $buku->buku_penerbit_id == $penerbit_item->penerbit_id ? 'selected' : '' }}>
                                        {{ $penerbit_item->penerbit_nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="buku_kategori_id" class="form-label">Kategori</label>
                            <select name="buku_kategori_id" id="buku_kategori_id" class="form-select" required>
                                @foreach($kategori as $kategori_item)
                                    <option value="{{ $kategori_item->kategori_id }}" {{ $buku->buku_kategori_id == $kategori_item->kategori_id ? 'selected' : '' }}>
                                        {{ $kategori_item->kategori_nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="buku_rak_id" class="form-label">Rak</label>
                            <select name="buku_rak_id" id="buku_rak_id" class="form-select" required>
                                @foreach($rak as $rak_item)
                                    <option value="{{ $rak_item->rak_id }}" {{ $buku->buku_rak_id == $rak_item->rak_id ? 'selected' : '' }}>
                                        {{ $rak_item->rak_nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="buku_isbn" class="form-label">ISBN</label>
                            <input type="text" name="buku_isbn" id="buku_isbn" class="form-control" placeholder="Masukkan ISBN buku" value="{{ $buku->buku_isbn }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="buku_thnterbit" class="form-label">Tahun Terbit</label>
                            <input type="text" name="buku_thnterbit" id="buku_thnterbit" class="form-control" placeholder="Masukkan tahun terbit" value="{{ $buku->buku_thnterbit }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="buku_urlgambar" class="form-label">Upload Gambar Buku</label>
                            <div class="mb-2">
                                @if ($buku->buku_urlgambar)
                                    <img src="{{ asset('storage/' . $buku->buku_urlgambar) }}" alt="Gambar Buku" class="img-thumbnail" style="max-width: 200px;">
                                @endif
                            </div>
                            <input type="file" name="buku_urlgambar" id="buku_urlgambar" class="form-control">
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-dark" type="submit">Update Buku</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
