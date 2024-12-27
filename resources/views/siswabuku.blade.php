@extends('template.layout')

@section('title', 'Halaman Buku')

@section('header')
    @include('template.navbar_siswa')
@endsection

<script>
    function confirmPinjam() {
        return confirm('Apakah Anda yakin ingin meminjam buku yang dipilih?');
    }
</script>



@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_siswa')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Buku</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Peminjaman Buku</li>
                </ol>

               
                <form action="{{ route('siswa.pinjam.multiple') }}" method="POST">
                    @csrf
                    <div class="mt-4 text-center mb-3 ">
                        <p>Pilih Buku yang mau dipinjam dan tekan tombol ini</p>
                        <button type="submit" class="btn btn-primary" onclick="return confirmPinjam()" >Pinjam Buku</button>
                    </div>
                    <div class="row g-3"> 
                        @foreach($buku as $item)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="{{ asset('storage/' . $item->buku_urlgambar) }}" 
                                             alt="Gambar Buku" 
                                             class="card-img-top img-fluid" 
                                             style="height: 250px; object-fit: cover; width: 170px;;"> 
                                        <h5 class="card-title fw-bolder fs-5 mt-4 font-family: 'Epilogue', sans-serif;">{{ $item->buku_judul }}</h5>
                                        <p class="card-text mb-2 ">Ditulis oleh {{ $item->penulis->penulis_nama }}</p>
                                        <p class="card-text mb-2 "><strong>{{$item->kategori->kategori_nama}}</strong></p>
                                        <div class="form-check">
                                            <input 
                                                type="checkbox" 
                                                class="form-check-input" 
                                                id="buku_{{ $item->buku_id }}" 
                                                name="buku_ids[]" 
                                                value="{{ $item->buku_id }}">
                                            <label class="form-check-label" for="buku_{{ $item->buku_id }}">
                                                Pilih Buku
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                  
                    
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
