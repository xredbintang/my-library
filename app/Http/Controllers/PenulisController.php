<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penulis;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::paginate(5); 
        return view('penulis', compact('penulis')); 
    }

    public function create()
    {
        return view('create-penulis'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'tmptlahir' => 'required|string|max:15',
            'tgllahir' => 'required|date',
        ]);

        Penulis::create([
            'penulis_id' => mt_rand(1000000000000000, 9999999999999999), 
            'penulis_nama' => $request->input('nama'),
            'penulis_tmptlahir' => $request->input('tmptlahir'),
            'penulis_tgllahir' => $request->input('tgllahir'),
        ]);

        return redirect()->route('penulis.index')->with('success', 'Penulis berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penulis = Penulis::findOrFail($id); 
        return view('update-penulis', compact('penulis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'tmptlahir' => 'required|string|max:15',
            'tgllahir' => 'required|date',
        ]);

        $penulis = Penulis::findOrFail($id);
        $penulis->update([
            'penulis_nama' => $request->input('nama'),
            'penulis_tmptlahir' => $request->input('tmptlahir'),
            'penulis_tgllahir' => $request->input('tgllahir'),
        ]);

        return redirect()->route('penulis.index')->with('success', 'Penulis berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penulis = Penulis::findOrFail($id);
        $penulis->delete();

        return redirect()->route('penulis.index')->with('success', 'Penulis berhasil dihapus!');
    }
}
