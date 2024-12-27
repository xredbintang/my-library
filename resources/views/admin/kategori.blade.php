@extends('template.layout')

@section('title')
    Dashboard - {{ $level }} Perpustakaan
@endsection
@if ($level === 'admin')
@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')

<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kategori Buku</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman Kategori Buku</li>
                        </ol>
                        <a href="admin_create_kategori_buku.html" class="btn btn-dark mb-3">Tambah Kategori</a>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kategori Buku</th>
                                        <th scope="col">Aksi</th>
                                
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Novel </td>
                                        <td>
                                        
                                            <button class="btn btn-outline-dark">Update</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Pendidikan </td>
                                        <td>
                                        
                                            <button class="btn btn-outline-dark">Update</button>
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
<h1>Not found</h1>
@endif
