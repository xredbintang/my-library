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
    @if ($level === 'admin' || $level === 'siswa')
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pengaturan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pengaturan</li>
                        </ol>

                        <!-- Form untuk Update Kategori Buku -->
                        <div class="card border-dark shadow-sm mb-4">
                            <div class="card-header bg-dark text-white">Update</div>
                            <div class="card-body">
                                <form action="#" method="POST">
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Nama  </label>
                                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan nama ">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Username </label>
                                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan nama Username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Alamat">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">No Hp</label>
                                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="No hp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Ganti password">
                                    </div>
                                    <button type="submit" class="btn bg-dark btn-primary">Update Pengaturan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Web Perpustakaan 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
    @else
        <h1>Akun anda tidak terdeteksi</h1>
    @endif
</div>
@endsection