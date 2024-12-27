@extends('template.layout')

@section('title', 'Halaman Penerbit')

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
                <a href="{{ route('create_penerbit') }}">
                    <button class="btn btn-dark my-3">Tambah Penerbit</button>
                </a>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('updated'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('updated') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('deleted'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('deleted') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="row">No</th>
                                <th scope="row">Nama Penerbit</th>
                                <th scope="row">Alamat Penerbit</th>
                                <th scope="row">No Telp Penerbit</th>
                                <th scope="row">Email Penerbit</th>
                                <th scope="row">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penerbit as $penerbitItem)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $penerbitItem->penerbit_nama }}</td>
                                <td>{{ $penerbitItem->penerbit_alamat }}</td>
                                <td>{{ $penerbitItem->penerbit_notelp }}</td>
                                <td>{{ $penerbitItem->penerbit_email }}</td>
                                <td>
                                    <a href="{{ route('update_penerbit', ['penerbit_id' => $penerbitItem->penerbit_id]) }}">
                                        <button class="btn btn-dark"><i class="fas fa-pencil"></i></button>
                                    </a>
                                    <form style="display:inline-block;" action="{{ route('penerbit.delete', ['penerbit_id' => $penerbitItem->penerbit_id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                
                    {{ $penerbit->links('vendor.pagination.bootstrap-5') }}
                </div>

            </div>
        </main>
    
    </div>
</div>
@endsection