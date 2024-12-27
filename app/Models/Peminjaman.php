<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $primaryKey = 'peminjaman_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'peminjaman_id',
        'peminjaman_user_id',
        'peminjaman_tglpinjam',
        'peminjaman_tglkembali',
        'peminjaman_statuskembali',
        'peminjaman_note',
        'peminjaman_denda',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'peminjaman_user_id', 'user_id');
    }

    public function detail()
    {
        return $this->hasMany(PeminjamanDetail::class, 'peminjaman_detail_peminjaman_id', 'peminjaman_id');
    }
}
