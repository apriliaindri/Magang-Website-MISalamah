<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| IMPORT CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GuruTugasController;
use App\Http\Controllers\GuruPengumumanController;
use App\Http\Controllers\GuruDeleteController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaRegisterController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SiswaSoalController;
use App\Http\Controllers\RegisterController;

Route::get('/artikel/daftar_artikel',
    [HomeController::class, 'daftarArtikel'])
    ->name('artikel.daftar.artikel');

Route::get('/artikel/detail_artikel/{id}',
    [HomeController::class, 'detailArtikel'])
    ->name('artikel.detail.artikel');

Route::get('/pengumuman/daftar_pengumuman',
    [HomeController::class, 'daftarPengumuman'])
    ->name('pengumuman.daftar.pengumuman');

    Route::get('/pengumuman/detail_pengumuman/{id}',
    [HomeController::class, 'detail.Pengumuman'])
    ->name('pengumuman.detail.pengumuman');

Route::get('/guru/daftar-tugas', [GuruController::class, 'daftar_tugas'])
    ->name('guru.daftar.tugas');

Route::get('/guru/tugas/{id}/soal', [SoalController::class, 'create'])
    ->name('guru.soal.create');

Route::post('/guru/tugas/{id}/soal', [SoalController::class, 'store'])
    ->name('guru.soal.store');

Route::middleware('auth')->group(function(){

    Route::get('/kepalasekolah',
        [KepalaSekolahController::class,'index'])
        ->name('kepalasekolah.dashboard');

    Route::get('/kepalasekolah/artikel/create',
        [ArticleController::class, 'create'])
        ->name('kepalasekolah.artikel.create');

    Route::post('/kepalasekolah/artikel/store',
        [ArticleController::class, 'store'])
        ->name('kepalasekolah.artikel.store');

});

Route::get('/register-kode', [RegisterController::class, 'formKode'])
    ->name('register.kode');

Route::post('/register-kode', [RegisterController::class, 'cekKode'])
    ->name('register.kode.cek');

Route::get('/register', [RegisterController::class, 'create'])
    ->name('register.global');

Route::post('/register', [RegisterController::class, 'store']);
// STEP 1: halaman input kode
Route::get('/siswa/kode/{id}', [SiswaRegisterController::class, 'formKode'])
    ->name('siswa.kode');

// STEP 2: cek kode
Route::post('/siswa/kode/{id}', [SiswaRegisterController::class, 'cekKode'])
    ->name('siswa.kode.cek');

// STEP 3: register (setelah lolos kode)
Route::get('/siswa/register/{id}', [SiswaRegisterController::class, 'create'])
    ->name('siswa.register');

Route::post('/siswa/register/{id}', [SiswaRegisterController::class, 'store'])
    ->name('siswa.register.store');




    /*
|--------------------------------------------------------------------------
| CBT SISWA (FIXED & CLEAN)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // 👉 halaman CBT (soal)
Route::get('/siswa/soal/{tugas_id}', [SiswaSoalController::class, 'tugas'])
    ->name('siswa.soal');

    // 👉 submit CBT
    Route::post('/siswa/soal/submit', [SiswaSoalController::class, 'submit'])
        ->name('siswa.soal.submit');
});

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', [ArticleController::class,'index'])->name('home');


/*
|--------------------------------------------------------------------------
| PUBLIC PAGES
|--------------------------------------------------------------------------
*/

Route::get('/artikel', fn() => view('artikel'))->name('artikel');
Route::get('/visi-misi', fn() => view('profil.visi'))->name('visi');
Route::get('/tata-tertib', fn() => view('profil.tatib'))->name('tatib');


/*
|---------------------------------------------------------------------------
| AUTH
|---------------------------------------------------------------------------
*/

Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.process');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');


/*
|---------------------------------------------------------------------------
| PILIH KELAS & REGISTER SISWA
|---------------------------------------------------------------------------
*/

Route::get('/pilih-kelas/{id}', function ($id) {
    session(['selected_kelas' => $id]);
    return redirect()->route('siswa.kode',$id);
})->name('pilih.kelas');

Route::get('/kelas/{id}/register',
[SiswaRegisterController::class,'create']
)->name('siswa.kode');


/*
|---------------------------------------------------------------------------
| HALAMAN KELAS (SISWA)
|---------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function(){

    Route::get('/kelas/{id}',
    [KelasController::class,'dashboard'])
    ->name('kelas.dashboard');

    Route::get('/kelas/{id}/tugas',
    [KelasController::class,'tugas'])
    ->name('kelas.tugas');

    Route::get('/kelas/{id}/pengumuman',
    [KelasController::class,'pengumuman'])
    ->name('kelas.pengumuman');
});


/*
|---------------------------------------------------------------------------
| GURU
|---------------------------------------------------------------------------
*/

Route::middleware(['auth'])
->prefix('guru')
->name('guru.')
->group(function(){

    Route::get('/',
    [GuruController::class,'dashboard'])
    ->name('dashboard');

    Route::get('/tambah-pg',
    [GuruController::class,'tambahPg'])
    ->name('tambah.pg');

    Route::post('/simpan-pg',
    [GuruController::class,'simpan_pg'])
    ->name('simpan.pg');

    Route::post('/simpan-tugas',
    [GuruController::class,'simpan_tugas'])
    ->name('simpan.tugas');

    Route::get('/daftar-tugas',
    [GuruController::class,'daftar_tugas'])
    ->name('tugas.daftar');

    Route::get('/tugas/{judul}/{kelas}/{mapel}',
    [GuruController::class,'detail_tugas'])
    ->name('tugas.detail');

    Route::get('/edit-pg/{id}',
    [GuruController::class,'edit_pg'])
    ->name('edit.pg');

    Route::post('/update-pg/{id}',
    [GuruController::class,'update_pg'])
    ->name('update.pg');

    Route::delete('/hapus-pg/{id}',
    [GuruController::class,'hapusPg'])
    ->name('hapus.pg');

});


/*
|---------------------------------------------------------------------------
| TUGAS
|---------------------------------------------------------------------------
*/

Route::post('/tugas/store',
[GuruTugasController::class,'store'])
->name('tugas.store');

Route::delete('/tugas/{id}',
[GuruDeleteController::class,'deleteTugas'])
->name('tugas.delete');


/*
|---------------------------------------------------------------------------
| PENGUMUMAN
|---------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function(){

    Route::get('/pengumuman',
    [PengumumanController::class,'pengumuman'])
    ->name('pengumuman.pengumuman');

    Route::post('/pengumuman/store',
    [PengumumanController::class,'store'])
    ->name('pengumuman.store');

});

Route::delete('/pengumuman/{id}',
[GuruDeleteController::class,'deletePengumuman'])
->name('pengumuman.delete');


/*
|---------------------------------------------------------------------------
| GURU - KELOLA SOAL
|---------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function(){

    Route::get('/guru/soal/create',
    [SoalController::class,'create']);

    Route::post('/guru/soal/store',
    [SoalController::class,'store']);

    Route::get('/guru/soal/{kelas_id}',
    [SoalController::class,'index']);

});


/*
|---------------------------------------------------------------------------
| NILAI
|---------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function(){

    Route::get('/guru/nilai',
    [NilaiController::class,'index']);

});


/*
|---------------------------------------------------------------------------
| KEPALA SEKOLAH
|---------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function(){

    Route::get('/kepalasekolah',
    [KepalaSekolahController::class,'index'])
    ->name('kepalasekolah.dashboard');

    Route::post('/kepalasekolah/user/store',
    [KepalaSekolahController::class,'storeUser'])
    ->name('kepalasekolah.user.store');

    Route::post('/kepalasekolah/user/reset/{id}',
    [KepalaSekolahController::class,'resetPassword'])
    ->name('kepalasekolah.user.reset');

    Route::delete('/kepalasekolah/user/{id}',
    [KepalaSekolahController::class,'deleteUser'])
    ->name('kepalasekolah.user.delete');

    Route::post('/kepalasekolah/pengumuman/store',
    [KepalaSekolahController::class,'storePengumuman'])
    ->name('kepalasekolah.pengumuman.store');
});

Route::get('/guru/nilai/{judul}/{kelas}/{mapel}',
[GuruController::class, 'lihat_nilai'])
->name('guru.nilai');

Route::middleware(['auth'])->group(function(){

    // halaman form
    Route::get('/pengumuman/create',
        [PengumumanController::class,'create'])
        ->name('pengumuman.create');

    // simpan
    Route::post('/pengumuman/store',
        [PengumumanController::class,'store'])
        ->name('pengumuman.store');

    // halaman list (opsional)
 Route::get('/pengumuman', [PengumumanController::class, 'index'])
    ->name('pengumuman.daftar_pengumuman');

        Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])
    ->name('pengumuman.show');

    Route::resource('pengumuman', PengumumanController::class);

    Route::post('/cbt/save-draft', [SiswaSoalController::class, 'saveDraft'])
    ->name('cbt.saveDraft');

    Route::post('/guru/tugas/store', [GuruTugasController::class, 'store'])
    ->name('guru.tugas.store');

Route::get('/guru/tugas/{id}/soal', [SoalController::class, 'create'])
    ->name('guru.soal.create');
});

