<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;

class SiswaController extends Controller
{
    public function dashboard()
    {
        return view('siswadashboard');
    }

    public function daftarBuku()
    {
        $buku = Buku::all();
        return view('siswabuku', compact('buku'));
    }

    public function peminjaman()
    {
        $user_id = Auth::user()->user_id;  
        $peminjaman_detail_all = PeminjamanDetail::with(['peminjaman', 'buku'])
            ->whereHas('peminjaman', function ($query) use ($user_id) { 
                $query->where('peminjaman_user_id', $user_id);
            })
            ->get();

        return view('siswapeminjaman', ['data' => $peminjaman_detail_all]);
    }

    public function pinjamMultiple(Request $request)
{
    $request->validate([
        'buku_ids' => 'required|array',
        'buku_ids.*' => 'exists:buku,buku_id',
    ]);

    $user_id = Auth::user()->user_id;
    $current_date = Carbon::now();
    $tgl_kembali = $current_date->copy()->addDays(7);

    $details = [];
    foreach ($request->buku_ids as $buku_id) {
       
        $peminjaman_id = Str::random(16); 
        
        
        $data_peminjaman = [
            'peminjaman_id' => $peminjaman_id,
            'peminjaman_user_id' => $user_id,
            'peminjaman_tglpinjam' => $current_date,
            'peminjaman_tglkembali' => $tgl_kembali,
            'peminjaman_statuskembali' => 0  
        ];

      
        DB::table('peminjaman')->insert($data_peminjaman);

        
        $details[] = [
            'peminjaman_detail_peminjaman_id' => $peminjaman_id,
            'peminjaman_detail_buku_id' => $buku_id
        ];
    }

    
    DB::table('peminjaman_detail')->insert($details);

    return redirect()->route('siswa.peminjaman')->with('success', 'Buku berhasil dipinjam!');
}

    public function pengaturan()
    {
        return view('siswapengaturan');
    }
}
