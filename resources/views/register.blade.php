@extends('template.layout')

@section('title', 'Register - Web Perpustakaan')

@section('main')
<style>
        .img-logo {
    width: 82px;
    margin: 24px auto;
    display: block;
}

@media only screen and (max-width: 576px) {
    .login-container {
        padding: 50px 30px;
    }
}

@media only screen and (min-width: 576px) {
    .login-container {
        padding: 50px 120px;
    }
}

@media only screen and (min-width: 768px) {
    .login-container {
        padding: 50px 200px;
    }
}

@media only screen and (min-width: 992px) {
    .login-container {
        padding: 50px 300px;
    }
}

@media only screen and (min-width: 1200px) {
    .login-container {
        padding: 50px 460px;
    }
}
</style>
    <section class="login-container">
        <div class="card shadow-lg">
            <div class="card-header">
                <img src="{{ asset('storage/pengembang/bukurevamp.png') }}" alt="..." class="img-logo">
                <h3 class="text-center">Register - Web Perpustakaan</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('user.register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama Lengkap *</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap Anda" value="{{ old('nama') }}" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="alamat" class="form-label">Alamat *</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat Anda" value="{{ old('alamat') }}" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="username" class="form-label">Username *</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username Anda" value="{{ old('username') }}" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="notelp" class="form-label">Nomor Telp *</label>
                        <input type="number" name="notelp" id="notelp" class="form-control" placeholder="Masukkan nohp Anda" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="password" class="form-label">Password *</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password Anda" required>
                    </div>
                    <div class="form-group my-3">
                        <button class="btn btn-dark" type="submit">Daftar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('login') }}"><p class="text-dark text-center">Sudah punya akun? Silahkan login</p></a>
            </div>
        </div>
    </section>
@endsection