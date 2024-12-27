@extends('template.layout')

@section('title')
    Dashboard - {{ $level }} Perpustakaan
@endsection

@section('header')
    @if ($level === 'admin')
        @include('template.navbar_admin')
    @elseif ($level === 'siswa')
        @include('template.navbar_siswa')
    @endif
@endsection
<style>
    .book-img {
    max-width: 70%; 
    height: auto; 
    display: block; 
    margin: 0 auto; 
}
</style>
@section('main')
<div id="layoutSidenav">
    @if ($level === 'admin')
        @include('template.sidebar_admin')
    @elseif ($level === 'siswa')
        @include('template.sidebar_siswa')
    @endif

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                @if ($level === 'admin' || $level === 'siswa')
                <h1 class="mt-4">Buku</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Data Buku</li>
                </ol>
                @else
                <h1>Akun anda tidak terdeteksi</h1>
                @endif

                @if($level === 'admin')
                    <a href="#" class="btn btn-dark">
                        Tambah Buku
                    </a><br><br>
                    
                

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Penulis Buku</th>
                                <th>Penerbit Buku</th>
                                <th>Tahun Terbit</th>
                                <th>Kategori Buku</th>
                                <th>Rak Buku</th>
                                <th>ISBN</th>
                                
                                <th>Aksi</th>
                               
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Bulan</td>
                                <td>Tere Liye</td>
                                <td>Gramedia</td>
                                <td>2018</td>
                                <td>Fiksi</td>
                                <td>L-4</td>
                                <td>12345464564564</td>
                               
                                <td>
                                    <button class="btn btn-dark">Update</button>
                                </td>
                              
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Fight Club</td>
                                <td>Chuck Palaniyuk</td>
                                <td>Gramedia</td>
                                <td>1999</td>
                                <td>Novel</td>
                                <td>L-2</td>
                                <td>091830810303</td>
                                
                                <td>
                                    <button class="btn btn-dark">Update</button>
                                </td>
                               
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
                @if ($level === 'siswa')
                <div class="row gap-4">
                            <div class="card col-12 col-md-4 col-lg-3">
                                <div class="card-body">
                                    <img src="./img/fightclub.jpg" alt="Bulan" class="book-img">
                                    <hr>
                                    <p class="text-center fw-bolder fs-4 my-0">Fight Club</p>
                                    <p class="text-center mb-3">Ditulis oleh Chuck Palaniyuk</p>
                                    <button class="btn btn-dark d-block mx-auto" type="submit">Pinjam</button>
                                </div>
                            </div>
                            <div class="card col-12 col-md-4 col-lg-3">
                                <div class="card-body">
                                    <img src="./img/taxi.jpg" alt="Bulan" class="book-img">
                                    <hr>
                                    <p class="text-center fw-bolder fs-4 my-0">Book</p>
                                    <p class="text-center mb-3">Ditulis oleh Tere Liye</p>
                                    <button class="btn btn-dark d-block mx-auto" type="submit">Pinjam</button>
                                </div>
                            </div>
                            <div class="card col-12 col-md-4 col-lg-3">
                                <div class="card-body">
                                    <img src="./img/bulan.jpg" alt="Bulan" class="book-img">
                                    <hr>
                                    <p class="text-center fw-bolder fs-4 my-0">Bulan</p>
                                    <p class="text-center mb-3">Ditulis oleh Tere Liye</p>
                                    <button class="btn btn-dark d-block mx-auto" type="submit">Pinjam</button>
                                </div>
                            </div>
                        </div>
                
                @endif
            </div>
        </main>
    </div>
</div>
@endsection
