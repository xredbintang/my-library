<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('helloworld');
// });

/*Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
});*/
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\LoginController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PenerbitController;
use App\Http\Middleware\Role;
use App\Http\Middleware\SecondRole;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SiswaController;


// Route::get('/dashboard', [RoutesController::class, 'Dashboard']);


Route::get('/hello', function () {
    return response($content = 'Hallo Laravel')
        ->withHeaders([
            'Content-Type' => 'text/html',
            'X-Header-One' => 'Header Value 1',
            'X-Header-Two' => 'Header Value 2',
        ]);
});

Route::get('/tes', function () {
    return redirect()->action([RoutesController::class, 'Dashboard']);
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/', function(){
    return view ('login');
})->middleware('auth');

Route::middleware(['auth'])->group(function(){
    Route::middleware(SecondRole::class)->group(function(){
        Route::controller(SiswaController::class)->group(function(){
            Route::get('/dashboard', 'dashboard')->name('siswa.dashboard');
            Route::get('/buku', 'daftarBuku')->name('siswa.buku');
            Route::get('/pinjam/{id}',  'pinjam')->name('siswa.pinjam');
            Route::get('/peminjaman',  'peminjaman')->name('siswa.peminjaman');
            Route::get('/pengaturan',  'pengaturan')->name('siswa.pengaturan');
            Route::post('/siswa/pinjam-multiple', 'pinjamMultiple')->name('siswa.pinjam.multiple');
        });
        Route::controller(UsersController::class)->group(function(){
            Route::patch('user/{id}/update_profile_siswa',  'upload_profile')->name('action.upload_profile_new');
            Route::delete('user/{id}/delete_profile_siswa',  'delete_profile')->name('action.delete_profile_new');
            Route::patch('update-pengaturan',  'updatePengaturan')->name('siswa.update-pengaturan');
        });
    });
        
   Route::get('/logout', [LoginController::class,'logout'])->name('logout');
   
        Route::middleware(Role::class)->prefix('admin')->group(function(){
            Route::get('/dashboard',  [PagesController::class,'dashboard'])->name('dashboard');
            Route::get('/pengaturan', [PagesController::class,'pengaturan'])->name('pengaturan');
            Route::controller(PenerbitController::class)->group(function(){
                
                Route::get('/penerbit',  'penerbit')->name('penerbit');
                Route::get('/createpenerbit',  'create_penerbit')->name('create_penerbit');
                Route::post('/createpenerbit',  'create')->name('action.createpenerbit');
                Route::get('/update_penerbit/{penerbit_id}',  'update_penerbit')->name('update_penerbit');
                Route::patch('/penerbit/{penerbit_id}',  'update')->name('penerbit.update');
                Route::delete('/penerbit/{penerbit_id}', 'delete')->name('penerbit.delete');
            });
            Route::controller(UsersController::class)->group(function(){
                Route::patch('update-pengaturan-admin',  'updatePengaturan')->name('admin.update-pengaturan');
                Route::patch('user/{id}/update_profile', 'upload_profile')->name('action.upload_profile');
                Route::delete('user/{id}/delete_profile',  'delete_profile')->name('action.delete_profile');
            });
            Route::resource('penulis', PenulisController::class);
            Route::resource('kategori', KategoriController::class);
            Route::resource('buku', BukuController::class);

            Route::controller(Rakcontroller::class)->group(function(){
                Route::get('/rak/create',  'create')->name('rak.create');
                Route::post('/rak/store', 'store')->name('rak.store');
            });

            Route::controller(PeminjamanController::class)->group(function(){
                Route::get('/peminjaman',  'daftarPeminjaman')->name('admin.peminjaman');
                Route::put('/peminjaman/{peminjaman_id}/update',  'updateStatus')->name('admin.updateStatus');
                Route::put('/admin/peminjaman/{peminjaman_id}/update', 'updateStatus')->name('admin.peminjaman.update');
            });

        });
});

Route::middleware(['guest'])->group(function(){
Route::get('/user/register', [UsersController::class, 'showRegisterForm'])->name('user.register.form');
Route::post('/user/register', [UsersController::class, 'register'])->name('user.register');
    Route::get('/login', [LoginController::class,'loginPage'])->name('login');
      Route::post('/login', [LoginController::class,'login'])->name('user.login');
 });

 




