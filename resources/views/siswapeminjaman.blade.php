@extends('template.layout')

@section('title', 'Halaman Peminjaman Siswa')

@section('header')
    @include('template.navbar_siswa')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_siswa')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Peminjaman</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Data Peminjaman</li>
                </ol>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID Buku</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status Pengembalian</th>
                                <th>Catatan</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $detail)
                            <tr>
                                <td>{{ $detail->buku->buku_id }}</td>
                                <td>{{ $detail->buku->buku_judul }}</td>
                                <td>{{ \Carbon\Carbon::parse($detail->peminjaman->peminjaman_tglpinjam)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($detail->peminjaman->peminjaman_tglkembali)->format('d M Y') }}</td>
                                <td>
                                    @if ($detail->peminjaman->peminjaman_statuskembali == 0)
                                        <span class="badge bg-warning text-dark">Meminjam</span>
                                    @else
                                        <span class="badge bg-success">Sudah Dikembalikan</span>
                                    @endif
                                </td>
                                <td>{{ $detail->peminjaman->peminjaman_note ?? '-' }}</td>
                                <td>Rp {{ number_format($detail->peminjaman->peminjaman_denda ?? 0, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
