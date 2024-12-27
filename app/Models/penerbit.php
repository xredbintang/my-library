<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class penerbit extends Model
{
    use HasFactory;
    protected $table = 'penerbit';
    protected $primaryKey = 'penerbit_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'penerbit_id',
        'penerbit_nama',
        'penerbit_alamat',
        'penerbit_notelp',
        'penerbit_email',
    ];
    protected static function createPenerbit ($data)
{
    return DB::table('penerbit')->insert($data);
}

    protected static function readPenerbit ()
    {
        $data = DB::table('penerbit')->get();
        return $data;
    }
    protected static function updatePenerbit ($id, $data)
{
    $penerbit = self::find($id);
    if ($penerbit) {
        $penerbit->update($data);
        return $penerbit;
    }

    return null;
}
protected static function readPenerbitById ($id)
{
    $penerbit = self::find($id);
    return $penerbit;
}
protected static function deletePenerbit ($id)
{
    return DB::table('penerbit_id', $id)->delete();
}
public function buku()
    {
        return $this->hasMany(Buku::class, 'buku_penerbit_id', 'penerbit_id');
    }
}
