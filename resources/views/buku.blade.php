@extends('template.layout')

@section('title', 'Halaman Buku')

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
                <a href="{{ route('buku.create') }}" class="btn btn-dark">Tambah Buku</a><br><br>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Penerbit</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buku as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->buku_judul }}</td>
                            <td>{{ $item->penulis->penulis_nama }}</td>
                            <td>{{ $item->kategori->kategori_nama }}</td>
                            <td>{{ $item->penerbit->penerbit_nama }}</td>
                           
                            <td>
                               
                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#bukuModal{{ $item->buku_id }}">
                                    <i class="fas fa-eye"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="bukuModal{{ $item->buku_id }}" tabindex="-1" aria-labelledby="bukuModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="bukuModalLabel">Detail Buku</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Judul Buku:</strong> {{ $item->buku_judul }}</p>
                                                <p><strong>Penulis:</strong> {{ $item->penulis->penulis_nama }}</p>
                                                <p><strong>Kategori:</strong> {{ $item->kategori->kategori_nama }}</p>
                                                <p><strong>Penerbit:</strong> {{ $item->penerbit->penerbit_nama }}</p>
                                                <p><strong>Rak:</strong> {{ $item->rak->rak_nama }}</p>
                                                <p><strong>Tahun Terbit:</strong> {{ $item->buku_thnterbit }}</p>
                                                <p><strong>ISBN:</strong> {{ $item->buku_isbn }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                              
                                <a href="{{ route('buku.edit', ['buku' => $item->buku_id]) }}">
                                    <button class="btn btn-dark"><i class="fas fa-pencil"></i></button>
                                </a>

                              
                                <form style="display:inline-block;" action="{{ route('buku.destroy', ['buku' => $item->buku_id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $buku->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
