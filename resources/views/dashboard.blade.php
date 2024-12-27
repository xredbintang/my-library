@extends('template.layout')

@section('title', 'Dashboard - Admin Perpustakaan')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                 
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Dashboard Admin Perpustakaan</li>
                    </ol>
                    <div class="row mb-5">
                            <div class="col-12 text-center">
                                <img src="{{ asset('img/imgadmin.jpeg') }}" alt="foto dashboard perpus" class="img-fluid mb-4" style="max-width: 750px; height: auto; border-radius: 10px;">
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center">
                                <img src="{{ asset('img/pengembang.jpg') }}" alt="Foto Pengembang" class="img-fluid" style="max-width: 200px; height: auto; border-radius: 10px;">
                            </div>
                            <div class="col-md-9">
                                <h1 class="mb-4">Informasi Pengembang</h1>
                                <p class="fs-6  "><strong>Nama:</strong> Bintang Rafif Avecinna</p>
                                <p class="fs-6"><strong>Kelas:</strong> XI RPL 1</p>
                                <p class="fs-6"><strong>Email:</strong> bintangrafifavecinna@gmail.com</p>                            
                                <p class="fs-6"><strong>Deskripsi:</strong> Pengembang web perpustakaan dengan fokus pada efisiensi dan kemudahan penggunaan.</p>
                            </div>
                        </div>

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Bintang XI RPL 1</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
