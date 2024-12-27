<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
       
        User::create([
            'user_id' => '1234567890123456',
            'user_nama' => 'Admin User',
            'user_alamat' => 'JL SAWOJAJAR',
            'user_username' => 'Admin User',
            'user_email' => 'admin@example.com',
            'user_notelp' => '08123456789',
            'user_password' => Hash::make('adminpassword'),
            'user_level' => 'admin',
            'user_pict_url' => '',
        ]);
    }
}
