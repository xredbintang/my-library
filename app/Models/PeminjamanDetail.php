<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanDetail extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_detail';
    public $timestamps = false;

    protected $fillable = [
        'peminjaman_detail_buku_id',
        'peminjaman_detail_peminjaman_id',
    ];

  
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'peminjaman_detail_buku_id', 'buku_id');
    }


    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_detail_peminjaman_id', 'peminjaman_id');
    }
}
