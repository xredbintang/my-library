@extends('template.layout')

@section('title', 'Halaman Admin - Peminjaman')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Peminjaman Admin</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Data Peminjaman</li>
                </ol>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
<form method="GET" action="{{ route('admin.peminjaman') }}">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari nama peminjam atau nama user" name="search" value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                 
                        <tr>
                            <th>User</th>
                            <th>Judul Buku</th>
                            <th>Status Pengembalian</th>
                            <th>Catatan</th>
                            <th>Denda</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $detail)
                        <tr>
                            <td>{{ $detail->peminjaman->user->user_nama }}</td>
                            <td>{{ $detail->buku->buku_judul }}</td>
                            <td>
                                @if ($detail->peminjaman->peminjaman_statuskembali == 0)
                                <span class="badge bg-warning text-dark">Meminjam</span>
                                @else
                                <span class="badge bg-success text-light">Sudah Dikembalikan</span>
                                @endif
                            </td>
                            <td>{{ $detail->peminjaman->peminjaman_note }}</td>
                            <td>{{ $detail->peminjaman->peminjaman_denda }}</td>
                            <td>
                           
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $detail->peminjaman->peminjaman_id }}">
                                    Edit
                                </button>

                              
                                <div class="modal fade" id="editModal{{ $detail->peminjaman->peminjaman_id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Peminjaman</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                       
                                                <form action="{{ route('admin.updateStatus', $detail->peminjaman->peminjaman_id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    
                                                   
                                                    <div class="mb-3">
                                                        <label for="statusKembali" class="form-label">Status Pengembalian</label>
                                                        <select name="peminjaman_statuskembali" class="form-control">
                                                            <option value="0" {{ $detail->peminjaman->peminjaman_statuskembali == 0 ? 'selected' : '' }}>Meminjam</option>
                                                            <option value="1" {{ $detail->peminjaman->peminjaman_statuskembali == 1 ? 'selected' : '' }}>Sudah Dikembalikan</option>
                                                        </select>
                                                    </div>

                                               
                                                    <div class="mb-3">
                                                        <label for="note" class="form-label">Catatan</label>
                                                        <input type="text" name="peminjaman_note" class="form-control" value="{{ $detail->peminjaman->peminjaman_note }}">
                                                    </div>

                                                    
                                                    <div class="mb-3">
                                                        <label for="denda" class="form-label">Denda</label>
                                                        <input type="number" name="peminjaman_denda" class="form-control" value="{{ $detail->peminjaman->peminjaman_denda }}">
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links('vendor.pagination.bootstrap-5') }}
            </div>
        </main>
    </div>
</div>
@endsection
