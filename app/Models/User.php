<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $incrementing = false; // Jika primary key adalah string
    protected $keyType = 'string'; // Jika primary key adalah string
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'user_nama',
        'user_alamat',
        'user_username',
        'user_email',
        'user_notelp',
        'user_password',
        'user_level',
        'user_pict_url',
    ];

    protected $hidden = [
        'user_password',
    ];

    
    protected static function upload_profile ($id, $data)
{
    $user = self::find($id);
    
    if ($user->user_pict_url) {
        Storage::delete($user->user_pict_url);
    }

    if ($data) {
        $path = $data->store('public/profile_pictures');
        $user->user_pict_url = $path;
    }

    $user->save();
}

    public static function register($data)
    {
        return self::create($data);
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'peminjaman_detail_peminjaman_id', 'peminjaman_id');
    }
}
