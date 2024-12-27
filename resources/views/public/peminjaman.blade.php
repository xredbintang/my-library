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
                        <h1 class="mt-4">Peminjaman Buku</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman Peminjaman Buku</li>
                        </ol>
                        @else
                        <h1>Akun anda tidak terdeteksi</h1>
                        @endif
                        @if ($level === 'siswa')
                        
                        
                        <form action="">
                            <div class="row">
                                <div class="col-12 col-md-4 form-group">
                                    <label for="nama" class="form-label">Nama Peminjam *</label>
                                    <input type="text" name="nama" id="nama" class="form-control" disabled>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="tgl_pinjam" class="form-label">Tanggal Pinjam *</label>
                                    <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control">
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12 col-md-4 form-group">
                                    <label for="tgl_kembali" class="form-label">Tanggal Kembali *</label>
                                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="buku" class="form-label">Buku 1 *</label>
                                    <select class="form-control" name="buku" id="buku">
                                        <option selected>-Pilih Buku-</option>
                                        <option value="bulan">Bulan - Tere Liye</option>
                                        <option value="bumi">Bumi - Tere Liye</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12 col-md-4 form-group">
                                    <button class="btn btn-dark">Buat Peminjaman</button>
                                    <button class="btn btn-light">Tambah Buku</button>
                                </div>
                            </div>
                        </form>
                        @endif
                        @if ($level === 'admin')
                
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nomor Anggota</th>
                                    <th>Judul Buku</th>
                                    <th>Kode Buku</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Akbar</td>
                                    <td>001</td>
                                    <td>Bulan</td>
                                    <td>L-4</td>
                                    <td>8/23/2024</td>
                                    <td>8/25/2024</td>
                                  
                                    <td>
                                        <button class="btn btn-dark">Update</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jeremy</td>
                                    <td>002</td>
                                    <td>Fight Club</td>
                                    <td>L-09</td>
                                    <td>8/23/2024</td>
                                    <td>8/29/2024</td>
                                  
                                    <td>
                                        <button class="btn btn-dark">Update</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        @endif
                    </div>
                </main>
    </div>
</div>
@endsection
