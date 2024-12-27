    @extends('template.layout')

    @section('title', 'Halaman Penerbit')

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
                        <li class="breadcrumb-item active">Halaman Peminjamans</li>
                    </ol>

                    <form action="{{ route('siswa.peminjaman.store') }}" method="POST">
        @csrf
        <label for="peminjaman_user_id">User ID:</label>
        <input type="text" id="peminjaman_user_id" name="peminjaman_user_id" required>

        <label for="peminjaman_tglpinjam">Tanggal Pinjam:</label>
        <input type="date" id="peminjaman_tglpinjam" name="peminjaman_tglpinjam" required>

        <label for="peminjaman_tglkembali">Tanggal Kembali:</label>
        <input type="date" id="peminjaman_tglkembali" name="peminjaman_tglkembali" required>

        <label for="buku_ids">Pilih Buku:</label>
        <select id="buku_ids" name="buku_ids[]" multiple required>
            @foreach ($buku as $b)
                <option value="{{ $b->buku_id }}">{{ $b->buku_judul }}</option>
            @endforeach
        </select>

        <button type="submit">Simpan</button>
    </form>



        </div>
            </main>
        
        </div>
    </div>
    @endsection
