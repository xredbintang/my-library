<?php

namespace App\Http\Controllers;

use App\Models\Buku; 
use Illuminate\Http\Request;
use App\Models\Penulis;
use App\Models\penerbit;
use App\Models\Kategori;
use App\Models\Rak; 
use Illuminate\Support\Facades\Storage;


class BukuController extends Controller
{
   
    public function index()
{
    $buku = Buku::with('penulis', 'kategori', 'penerbit', 'rak')->paginate(5);
    return view('buku', compact('buku'));
}

   
public function create()
{
    
    $penulis = Penulis::all();
        $penerbit = penerbit::all();
        $kategori = Kategori::all(); 
        $rak = Rak::all(); 
    
    
    return view('create-buku', compact('penulis', 'penerbit', 'kategori', 'rak'));
}



    public function store(Request $request)
    {
        // $request->validate([
        //     'buku_penulis_id' => 'required|string|max:16',
        //     'buku_judul' => 'required|string|min:10|max:40',
        //     'buku_penerbit_id' => 'required|string|max:16',
        //     'buku_kategori_id' => 'required|string|max:16',
        //     'buku_rak_id' => 'required|string|max:16',
        //     'buku_isbn' => 'required|string|max:16',
        //     'buku_thnterbit' => 'nullable|digits:4',
        // ]);

        $img = null;
        if($request->hasFile('buku_urlgambar')){
            $img=$request->file('buku_urlgambar')->store('gambar_buku','public');
        }

        Buku::create([
            'buku_id' => mt_rand(1000000000000000, 9999999999999999), 
            'buku_penulis_id' => $request->input('buku_penulis_id'),
            'buku_judul' => $request->input('buku_judul'),
            'buku_penerbit_id' => $request->input('buku_penerbit_id'),
            'buku_kategori_id' => $request->input('buku_kategori_id'),
            'buku_rak_id' => $request->input('buku_rak_id'),
            'buku_isbn' => $request->input('buku_isbn'),
            'buku_thnterbit' => $request->input('buku_thnterbit'),
            'buku_urlgambar' => $img,
        ]);

       
     
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

   
    public function edit($id)
    {
        $buku = Buku::findOrFail($id); 

        $penulis = Penulis::all();
        $penerbit = penerbit::all();
        $kategori = Kategori::all();
        $rak = Rak::all();
        return view('update-buku', compact('buku', 'penulis', 'penerbit', 'kategori', 'rak'));
    }

  
    public function update(Request $request, Buku $buku)
    {
        $validatedData = $request->validate([
            'buku_judul' => 'required|string|max:255',
            'buku_penulis_id' => 'required|exists:penulis,penulis_id',
            'buku_penerbit_id' => 'required|exists:penerbit,penerbit_id',
            'buku_kategori_id' => 'required|exists:kategori,kategori_id',
            'buku_rak_id' => 'required|exists:rak,rak_id',
            'buku_isbn' => 'required|string|max:13',
            'buku_thnterbit' => 'nullable|digits:4',
            
        ]);
    
        if ($request->hasFile('buku_urlgambar')) {
          
            if ($buku->buku_urlgambar && Storage::exists('public/' . $buku->buku_urlgambar)) {
                Storage::delete('public/' . $buku->buku_urlgambar);
            }
    
        
            $buku->buku_urlgambar = $request->file('buku_urlgambar')->store('gambar_buku','public');
        }
    
        $buku->update($validatedData);
    
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }
    


    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }
}
