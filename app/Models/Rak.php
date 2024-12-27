<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    protected $table = 'rak';
    protected $primaryKey = 'rak_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['rak_id', 'rak_nama', 'rak_lokasi', 'rak_kapasitas'];

  
    public function buku()
    {
        return $this->hasMany(Buku::class, 'rak_id');
    }
}
