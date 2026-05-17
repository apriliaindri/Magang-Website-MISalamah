<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GuruDeleteController;
use App\Http\Controllers\GuruPengumumanController;
use App\Http\Controllers\GuruTugasController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaRegisterController;
use App\Http\Controllers\SiswaSoalController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Home & Public Pages
|--------------------------------------------------------------------------
*/

Route::get('/', [ArticleController::class, 'home'])
    ->name('home');
Route::get('/artikel', fn () => view('artikel'))
    ->name('artikel');

Route::get('/visi-misi', fn () => view('profil.visi'))
    ->name('visi');

Route::get('/tata-tertib', fn () => view('profil.tatib'))
    ->name('tatib');


/*
|--------------------------------------------------------------------------
| Artikel
|--------------------------------------------------------------------------
*/


Route::get('/artikel/detail_artikel/{id}',
    [ArticleController::class, 'detailArtikel'])
    ->name('artikel.detail.artikel');

Route::get(
    '/kepalasekolah/artikel/index',
    [ArticleController::class, 'index']
)->name('kepalasekolah.artikel.index');

Route::get(
    '/artikel/daftar_artikel',
    [ArticleController::class, 'daftarArtikel']
)->name('artikel.daftar.artikel');

Route::get(
    '/kepalasekolah/artikel/edit/{id}',
    [ArticleController::class, 'editArtikel']
)->name('kepalasekolah.artikel.edit.artikel');

Route::put(
    '/kepalasekolah/artikel/update/{id}',
    [ArticleController::class, 'updateArtikel']
)->name('artikel.update');

/*
|--------------------------------------------------------------------------
| Pengumuman Public
|--------------------------------------------------------------------------
*/

Route::get('/daftar-pengumuman',
    [PengumumanController::class, 'daftarPengumuman'])
    ->name('pengumuman.daftar.pengumuman');

Route::get('/pengumuman/detail_pengumuman/{id}',
    [PengumumanController::class, 'detail'])
    ->name('pengumuman.detail.pengumuman');


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login',
    [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login',
    [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout',
    [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Register
|--------------------------------------------------------------------------
*/

Route::get('/register-kode',
    [RegisterController::class, 'formKode'])
    ->name('register.kode');

Route::post('/register-kode',
    [RegisterController::class, 'cekKode'])
    ->name('register.kode.cek');

Route::get('/register',
    [RegisterController::class, 'create'])
    ->name('register.global');

Route::post('/register',
    [RegisterController::class, 'store']);


/*
|--------------------------------------------------------------------------
| Register Siswa
|--------------------------------------------------------------------------
*/

Route::get('/siswa/kode/{id}',
    [SiswaRegisterController::class, 'formKode'])
    ->name('siswa.kode');

Route::post('/siswa/kode/{id}',
    [SiswaRegisterController::class, 'cekKode'])
    ->name('siswa.kode.cek');

Route::get('/siswa/register/{id}',
    [SiswaRegisterController::class, 'create'])
    ->name('siswa.register');

Route::post('/siswa/register/{id}',
    [SiswaRegisterController::class, 'store'])
    ->name('siswa.register.store');

Route::get('/pilih-kelas/{id}', function ($id) {

    session(['selected_kelas' => $id]);

    return redirect()->route('siswa.kode', $id);

})->name('pilih.kelas');


/*
|--------------------------------------------------------------------------
| Route Authenticated
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Pengumuman Admin
    |--------------------------------------------------------------------------
    */

    Route::get('/pengumuman',
        [PengumumanController::class, 'index'])
        ->name('pengumuman.index');

    Route::get('/pengumuman/create',
        [PengumumanController::class, 'create'])
        ->name('pengumuman.create');

    Route::post('/pengumuman/store',
        [PengumumanController::class, 'store'])
        ->name('pengumuman.store');

    Route::get('/pengumuman/{id}/edit',
        [PengumumanController::class, 'edit'])
        ->name('pengumuman.edit');

    Route::put('/pengumuman/{id}',
        [PengumumanController::class, 'update'])
        ->name('pengumuman.update');

    Route::delete('/pengumuman/{id}',
        [PengumumanController::class, 'destroy'])
        ->name('pengumuman.destroy');


    /*
    |--------------------------------------------------------------------------
    | Kepala Sekolah
    |--------------------------------------------------------------------------
    */

    Route::get('/kepalasekolah',
        [KepalaSekolahController::class, 'index'])
        ->name('kepalasekolah.dashboard');

    Route::get('/kepalasekolah/artikel/create',
        [ArticleController::class, 'create'])
        ->name('kepalasekolah.artikel.create');

    Route::post('/kepalasekolah/artikel/store',
        [ArticleController::class, 'store'])
        ->name('kepalasekolah.artikel.store');

    Route::post('/kepalasekolah/user/store',
        [KepalaSekolahController::class, 'storeUser'])
        ->name('kepalasekolah.user.store');

Route::post('/kepalasekolah/user/reset/{id}',
    [KepalaSekolahController::class, 'resetPassword'])
    ->name('kepalasekolah.user.reset');

    Route::delete('/kepalasekolah/user/{id}',
        [KepalaSekolahController::class, 'deleteUser'])
        ->name('kepalasekolah.user.delete');

    Route::post('/kepalasekolah/pengumuman/store',
        [KepalaSekolahController::class, 'storePengumuman'])
        ->name('kepalasekolah.pengumuman.store');


    /*
    |--------------------------------------------------------------------------
    | Kelas Siswa
    |--------------------------------------------------------------------------
    */

    Route::get('/kelas/{id}',
        [KelasController::class, 'dashboard'])
        ->name('kelas.dashboard');

    Route::get('/kelas/{id}/tugas',
        [KelasController::class, 'tugas'])
        ->name('kelas.tugas');

    Route::get('/kelas/{id}/pengumuman',
        [KelasController::class, 'pengumuman'])
        ->name('kelas.pengumuman');


    /*
    |--------------------------------------------------------------------------
    | CBT Siswa
    |--------------------------------------------------------------------------
    */

    Route::get('/siswa/soal/{tugas_id}',
        [SiswaSoalController::class, 'tugas'])
        ->name('siswa.soal');

    Route::post('/siswa/soal/submit',
        [SiswaSoalController::class, 'submit'])
        ->name('siswa.soal.submit');

    Route::post('/cbt/save-draft',
        [SiswaSoalController::class, 'saveDraft'])
        ->name('cbt.saveDraft');


    /*
    |--------------------------------------------------------------------------
    | Guru - Soal
    |--------------------------------------------------------------------------
    */

    Route::get('/guru/tugas/{id}/soal',
        [SoalController::class, 'create'])
        ->name('guru.soal.create');

    Route::post('/guru/tugas/{id}/soal',
        [SoalController::class, 'store'])
        ->name('guru.soal.store');

    Route::get('/guru/soal/create',
        [SoalController::class, 'create']);

    Route::post('/guru/soal/store',
        [SoalController::class, 'store']);

    Route::get('/guru/soal/{kelas_id}',
        [SoalController::class, 'index']);

    Route::get('/guru/nilai',
        [NilaiController::class, 'index']);

});


/*
|--------------------------------------------------------------------------
| Guru
|--------------------------------------------------------------------------
*/

Route::prefix('guru')
    ->name('guru.')
    ->middleware('auth')
    ->group(function () {

        Route::get('/',
            [GuruController::class, 'dashboard'])
            ->name('dashboard');

        Route::get('/tambah-pg',
            [GuruController::class, 'tambahPg'])
            ->name('tambah.pg');

        Route::post('/simpan-pg',
            [GuruController::class, 'simpan_pg'])
            ->name('simpan.pg');

        Route::post('/simpan-tugas',
            [GuruController::class, 'simpan_tugas'])
            ->name('simpan.tugas');

        Route::post('/tugas/store',
            [GuruTugasController::class, 'store'])
            ->name('tugas.store');

        Route::get('/daftar-tugas',
            [GuruController::class, 'daftar_tugas'])
            ->name('tugas.daftar');

        Route::get('/tugas/{judul}/{kelas}/{mapel}',
            [GuruController::class, 'detail_tugas'])
            ->name('tugas.detail');

        Route::get('/nilai/{judul}/{kelas}/{mapel}',
            [GuruController::class, 'lihat_nilai'])
            ->name('nilai');

        Route::get('/edit-pg/{id}',
            [GuruController::class, 'edit_pg'])
            ->name('edit.pg');

        Route::post('/update-pg/{id}',
            [GuruController::class, 'update_pg'])
            ->name('update.pg');

        Route::delete('/hapus-pg/{id}',
            [GuruController::class, 'hapusPg'])
            ->name('hapus.pg');

    });


/*
|--------------------------------------------------------------------------
| Tugas
|--------------------------------------------------------------------------
*/

Route::post('/tugas/store',
    [GuruTugasController::class, 'store'])
    ->name('tugas.store');

Route::delete('/tugas/{id}',
    [GuruDeleteController::class, 'deleteTugas'])
    ->name('tugas.delete');

