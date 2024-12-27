<?php
namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function create()
    {
        return view('create-rak'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'rak_nama' => 'required|string|max:20',
            'rak_lokasi' => 'required|string|max:50',
            'rak_kapasitas' => 'required|integer',
        ]);

        Rak::create([
            'rak_id' => mt_rand(1000000000000000, 9999999999999999), 
            'rak_nama' => $request->input('rak_nama'),
            'rak_lokasi' => $request->input('rak_lokasi'),
            'rak_kapasitas' => $request->input('rak_kapasitas'),
        ]);

        return redirect()->route('rak.create')->with('success', 'Rak berhasil ditambahkan!');
    }
}
