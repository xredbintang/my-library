@extends('template.layout')

@section('title')
Penulis - {{$level}}
@endsection
@if ($level==='admin')
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
                        <li class="breadcrumb-item active">Halaman Data Penulis</li>
                    </ol>
                    <a href="admin_create_buku.html" class="btn btn-dark mb-3">Tambah Data Penulis</a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penulis</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Kewarganergaraan</th>
                                    <th>Karya</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Tere Liye</td>
                                    <td>17/02/1976</td>
                                    <td>Indonesia</td>
                                    <td>Bulan</td>
                                    <td>
                                        <button class="btn btn-dark">Update</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>huck Palaniyuk</td>
                                    <td>21/02/1962</td>
                                    <td>Amerika Serikat</td>
                                    <td>Fight Club</td>
                                    <td>
                                        <button class="btn btn-dark">Update</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
    </div>


@endsection
@else
<h1>Not Found</h1>
@endif
