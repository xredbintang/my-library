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
                <h1 class="mt-4">Penulis</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Data Penulis</li>
                </ol>
           <a href="{{ route('penulis.create') }}" class="btn btn-dark">Tambah Penulis</a>
		<br><br>
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
<table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penulis as $p)
                <tr>
                    <td>{{ $p->penulis_nama }}</td>
                    <td>{{ $p->penulis_tmptlahir }}</td>
                    <td>{{ $p->penulis_tgllahir }}</td>
                    <td>
                        <a href="{{ route('penulis.edit', $p->penulis_id) }}" class="btn btn-dark"><i class="fas fa-pencil"></i></a>
                        <form action="{{ route('penulis.destroy', $p->penulis_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
                        </tbody>
                    </table>
                    {{ $penulis->links('vendor.pagination.bootstrap-5') }}
                    </div>
            </div>
        </main>
    
    </div>
</div>
@endsection
        </tbody>
    </table>
  