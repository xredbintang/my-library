<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all(); 
        return view('kategori', compact('kategori')); 
    }

    public function create()
    {
        return view('create-kategori'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:20',
        ]);

        Kategori::create([
            'kategori_id' => mt_rand(1000000000000000, 9999999999999999), 
            'kategori_nama' => $request->input('nama'),
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id); 
        return view('update-kategori', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:20',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'kategori_nama' => $request->input('nama'),
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
