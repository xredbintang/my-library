<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('login'); 
    }

    public function login(Request $request)
{
    $request->validate([
        'user_username' => 'required',
        'user_password' => 'required'
    ], [
        'user_username.required' => 'Username wajib diisi',
        'user_password.required' => 'Password wajib diisi'
    ]);

    $credentials = [
        'user_username' => $request->input('user_username'),
        'user_password' => $request->input('user_password')
    ];

    $user = User::where('user_username', $credentials['user_username'])->first();
    
    if ($user && Hash::check($credentials['user_password'], $user->user_password)) 
    {
        Auth::login($user);
         if ($user->user_level === 'admin') {
        return redirect()->route('dashboard'); 
        } elseif ($user->user_level === 'anggota') {
            return redirect()->route('siswa.dashboard'); 
        }
    }
     return back()->withErrors([
                'message' => 'Username atau password Anda salah.',
            ]);
    
           
}
 

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
