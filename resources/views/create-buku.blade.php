@extends('template.layout')

@section('title', 'Halaman Create Buku')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Buku</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Data Buku</li>
                </ol>
                
                <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      
                        <div class="col-md-6">
                       
                        <div class="form-group">
                                <label for="buku_judul">Judul Buku</label>
                                <input type="text" name="buku_judul" id="buku_judul" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="buku_penulis_id">Penulis</label>
                                <select name="buku_penulis_id" id="buku_penulis_id" class="form-control" required>
                                    @foreach($penulis as $item)
                                        <option value="{{ $item->penulis_id }}">{{ $item->penulis_nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                      
                            <div class="form-group">
                            <label for="buku_penerbit_id">Penerbit</label>
                                <select name="buku_penerbit_id" id="buku_penerbit_id" class="form-control" required>
                                    @foreach($penerbit as $item)
                                        <option value="{{ $item->penerbit_id }}">{{ $item->penerbit_nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="buku_kategori_id">Kategori</label>
                                <select name="buku_kategori_id" id="buku_kategori_id" class="form-control" required>
                                    @foreach($kategori as $item)
                                        <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                    
                            <div class="form-group">
                                <label for="buku_rak_id">Rak</label>
                                <select name="buku_rak_id" id="buku_rak_id" class="form-control" required>
                                    @foreach($rak as $item)
                                        <option value="{{ $item->rak_id }}">{{ $item->rak_nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                        
                            <div class="form-group">
                                <label for="buku_isbn">ISBN</label>
                                <input type="text" name="buku_isbn" id="buku_isbn" class="form-control" >
                            </div>

                        
                            <div class="form-group">
                                <label for="buku_thnterbit">Tahun Terbit</label>
                                <input type="text" name="buku_thnterbit" id="buku_thnterbit" class="form-control">
                            </div>

                            <div class="form-group">
                            <label for="buku_urlgambar" class="form-label">Upload Buku</label>
                            <input type="file" name="buku_urlgambar" id="buku_urlgambar" class="form-control"  required>
                        </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
