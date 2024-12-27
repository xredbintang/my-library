<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\penerbit;
class PagesController extends Controller
{
    private $level;

    public function __construct(){
        $this->level = 'admin';
    }

    public function loginPage() {
        return view('public.loginn');
    }

    public function dashboardAdmin() {
        
        if ($this->level === 'admin') {
            return view('admin.dashboard', ['level' => $this->level]);
        } elseif ($this->level === 'siswa') {
            return view('siswa.dashboard', ['level' => $this->level]);
        } else {
            return abort(403, 'Level anda tidak terdeteksi.');
        }
    }


    public function dashboard(){
        return view('dashboard');
    }

    public function peminjamanshow() {
      
        return view('public.peminjaman', ['level'=> $this->level]);
    }

    public function bukushow(){
        return view('public.buku', ['level'=> $this->level]);
    }
    public function pengaturanshow(){
        return view('public.pengaturan', ['level'=> $this->level]);
    }
    public function kategorishow(){
        return view('admin.kategori', ['level'=> $this->level]);
    }
    public function penulisshow(){
        return view('admin.penulis', ['level'=> $this->level]);
    }

    public function penerbitshow(){
        return view('admin.penerbit', ['level'=> $this->level]);
    }

    public function create_penerbit(){
        return view('create-penerbit');
    }

    public function penerbit() {
        $data = Penerbit::readPenerbit();
    
        return view('penerbit', ['level' => 'admin'])->with('penerbit', $data);
    }
    public function update_penerbit ($id) {
        $penerbit = Penerbit::readPenerbitById($id);
    
        return view('update-penerbit', ['level' => 'admin'])->with('penerbit', $penerbit);
    }

    public function pengaturan(){
        return view('pengaturan');
    }
}
