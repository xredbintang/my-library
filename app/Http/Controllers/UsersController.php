<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class UsersController extends Controller
{
    public function showRegisterForm()
    {
        return view('register'); 
    }

    public function register(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $data = [
            'user_id' => $id,
            'user_nama' => $request->input('nama'),
            'user_alamat' => $request->input('alamat'),
            'user_username' => $request->input('username'),
            'user_email' => $request->input('email'),
            'user_notelp' => $request->input('notelp'),
            'user_password' => Hash::make($request->input('password'))
        ];

        $user = User::create($data); 

        if ($user) {
            return redirect()->route('user.login')->with('success', 'Pendaftaran akun berhasil!');
        } else {
            return back()->withInput();
        }
    }

    public function login(Request $request)
    {
        $credentials = [
            'user_username' => $request->input('user_username'),
            'user_password' => $request->input('user_password')
        ];

        $user = User::where('user_username', $credentials['user_username'])->first();

        if ($user && Hash::check($credentials['user_password'], $user->user_password)) {
            Auth::login($user);
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withErrors(['message' => 'Username atau password salah']);
        }
    }

    

    public function upload_profile (Request $request, $id)
    {   
        $request->validate([
            'profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        

        if ($request->hasFile('profile')) {
            $data = $request->file('profile');
    
            User::upload_profile($id, $data);
            
            return redirect()->back()->with('success', 'Foto profil berhasil diperbarui!');
        }
    
        return back()->with('failed', 'Foto profil gagal diperbarui!');
    }

    public function delete_profile($id)
{
 
    $user = User::findOrFail($id);


    if ($user->user_pict_url) { 
   
        Storage::delete($user->user_pict_url); 
    }

    $user->user_pict_url = null;
    $user->save();

    return redirect()->back()->with('success', 'Foto profil berhasil dihapus!');
}


    public function updatePengaturan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'notelp' => 'required|numeric',
            'password' => 'nullable|string|min:8',
        ]);
    
        $user = Auth::user(); 
    
       
        $user->update([
            'user_nama' => $request->input('nama'),
            'user_alamat' => $request->input('alamat'),
            'user_username' => $request->input('username'),
            'user_email' => $request->input('email'),
            'user_notelp' => $request->input('notelp'),
            'user_password' => $request->input('password') 
                ? Hash::make($request->input('password')) 
                : $user->user_password, 
        ]);
    
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
    
    
    
}
