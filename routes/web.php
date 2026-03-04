<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GuruTugasController;
use App\Http\Controllers\GuruPengumumanController;
use App\Http\Controllers\GuruDeleteController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaRegisterController;

Route::middleware('auth')->group(function () {

    Route::get('/kelas/{id}', [KelasController::class, 'show'])
        ->name('kelas.show');

    Route::get('/kelas/{id}/tugas', [KelasController::class, 'tugas'])
        ->name('kelas.tugas');

    Route::get('/kelas/{id}/pengumuman', [KelasController::class, 'pengumuman'])
        ->name('kelas.pengumuman');
});

Route::get('/pilih-kelas/{id}', function ($id) {
    session(['selected_kelas' => $id]);
    return redirect()->route('siswa.register', $id);
})->name('pilih.kelas');

Route::get('/kelas/{id}/register', [SiswaRegisterController::class, 'create'])
    ->name('siswa.register');

Route::post('/kelas/{id}/register', [SiswaRegisterController::class, 'store'])
    ->name('siswa.register.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/kelas/{id}', [KelasController::class, 'show'])
        ->name('kelas.show');
});

/*
|--------------------------------------------------------------------------
| HOME (Public)
|--------------------------------------------------------------------------
*/

Route::get('/', [ArticleController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/artikel', fn () => view('artikel'))->name('artikel');
Route::get('/visi-misi', fn () => view('profil.visi'))->name('visi');
Route::get('/tata-tertib', fn () => view('profil.tatib'))->name('tatib');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Kepala Sekolah Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/kepalasekolah',
        [KepalaSekolahController::class, 'index']
    )->name('kepalasekolah.dashboard');

    Route::post('/kepalasekolah/user/store',
        [KepalaSekolahController::class, 'storeUser']
    )->name('kepalasekolah.user.store');

    Route::post('/kepalasekolah/user/reset/{id}',
        [KepalaSekolahController::class, 'resetPassword']
    )->name('kepalasekolah.user.reset');

    Route::delete('/kepalasekolah/user/{id}',
        [KepalaSekolahController::class, 'deleteUser']
    )->name('kepalasekolah.user.delete');

    Route::post('/kepalasekolah/pengumuman/store',
        [KepalaSekolahController::class, 'storePengumuman']
    )->name('kepalasekolah.pengumuman.store');

    Route::post('/kepalasekolah/artikel/store',
        [KepalaSekolahController::class, 'storeArtikel']
    )->name('kepalasekolah.artikel.store');
});

/*
|--------------------------------------------------------------------------
| Guru Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('guru')
    ->name('guru.')
    ->group(function () {

        Route::get('/', [GuruController::class, 'index'])
            ->name('dashboard');

        Route::post('/tugas/store', [GuruTugasController::class, 'store'])
            ->name('tugas.store');

        Route::post('/pengumuman/store', [GuruPengumumanController::class, 'store'])
            ->name('pengumuman.store');

        Route::delete('/tugas/{id}', [GuruDeleteController::class, 'deleteTugas'])
            ->name('tugas.delete');

        Route::delete('/pengumuman/{id}', [GuruDeleteController::class, 'deletePengumuman'])
            ->name('pengumuman.delete');
});


