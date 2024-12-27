<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{
    public function index() {
        // Menampilkan data kategori buku
    }

    public function create() {
        // Menampilkan form untuk membuat kategori buku
    }

    public function store(Request $request) {
        // Menyimpan data kategori buku ke database
    }

    public function edit($id) {
        // Menampilkan form untuk mengedit kategori buku
    }

    public function update(Request $request, $id) {
        // Memperbarui data kategori buku di database
    }
}
