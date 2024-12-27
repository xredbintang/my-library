<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;

class PeminjamanController extends Controller
{

    public function daftarPeminjaman(Request $request)
{
   
    $search = $request->input('search');

    
    $query = PeminjamanDetail::with(['peminjaman', 'buku']);

   
    if ($search) {
        $query->whereHas('peminjaman.user', function ($q) use ($search) {
            $q->where('user_nama', 'like', '%' . $search . '%');
        });
    }

    $peminjaman_detail_all = $query->paginate(10);

    return view('peminjaman', [
        'data' => $peminjaman_detail_all
    ]);
}




public function updateStatus(Request $request, $peminjaman_id)
{
    $request->validate([
        'peminjaman_statuskembali' => 'required|in:0,1',
        'peminjaman_note' => 'nullable|string|max:255',
        'peminjaman_denda' => 'nullable|numeric|min:0',
    ]);

   
    $peminjaman = Peminjaman::findOrFail($peminjaman_id);

    
    $peminjaman->update([
        'peminjaman_statuskembali' => $request->peminjaman_statuskembali,
        'peminjaman_note' => $request->peminjaman_note,
        'peminjaman_denda' => $request->peminjaman_denda,
    ]);

  
    return redirect()->route('admin.peminjaman')->with('success', 'Status peminjaman berhasil diperbarui!');
}


}
