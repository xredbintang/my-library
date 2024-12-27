@extends('template.layout')

@section('title')
Penerbit - {{$level}}
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
                    <h1 class="mt-4">Penerbit</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Data Penerbit</li>
                    </ol>
                    <a href="admin_create_buku.html" class="btn btn-dark mb-3">Tambah Data Penerbit</a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penerbit</th>
                                    <th>Alamat Penerbit</th>
                                    <th>Kota penerbit</th>
                                    <th>Email Terbit</th>
                                    <th>Nomor telfon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Gramedia</td>
                                    <td>JL Laravel</td>
                                    <td>Bogor</td>
                                    <td>gramed@gmail.com</td>
                                    <td>0811231231</td>
                                    <td>
                                        <button class="btn btn-dark">Update</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>WW Norton</td>
                                    <td>Beverly Hills</td>
                                    <td>Washington</td>
                                    <td>norton@gmail.com</td>
                                    <td>01912091209</td>
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
