<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;

class PenerbitController extends Controller
{
    public function penerbit()
    {
        $penerbit = Penerbit::paginate(5);
        return view('penerbit', ['penerbit' => $penerbit]);
    }

    public function create_penerbit()
    {
        return view('create-penerbit');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
            'notelp' => 'required|string|max:15',
            'email' => 'required|email|max:100|unique:penerbit,penerbit_email',
        ]);

        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'penerbit_id' => $id,
            'penerbit_nama' => $validatedData['nama'],
            'penerbit_alamat' => $validatedData['alamat'],
            'penerbit_notelp' => $validatedData['notelp'],
            'penerbit_email' => $validatedData['email'],
        ];

        Penerbit::createPenerbit($data);
        return redirect()->route('penerbit')->with('success', 'Data penerbit berhasil ditambahkan!');
    }

    public function update_penerbit($id)
    {
        $penerbit = penerbit::findOrFail($id);
        return view('update-penerbit',['penerbit'=>$penerbit]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
            'notelp' => 'required|string|max:15',
            'email' => 'required|email|max:100|unique:penerbit,penerbit_email,' . $id . ',penerbit_id',
        ]);

        $data = [
            'penerbit_nama' => $validatedData['nama'],
            'penerbit_alamat' => $validatedData['alamat'],
            'penerbit_notelp' => $validatedData['notelp'],
            'penerbit_email' => $validatedData['email'],
        ];

        Penerbit::updatePenerbit($id, $data);
        return redirect()->route('penerbit')->with('updated', 'Data penerbit berhasil diupdate!');
    }

    public function delete($id)
    {
        Penerbit::deletePenerbit($id);
        return redirect()->route('penerbit')->with('deleted', 'Data penerbit berhasil dihapus!');
    }
}
