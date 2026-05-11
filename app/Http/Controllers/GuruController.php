<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SoalPg;
use App\Models\Kelas;

class GuruController extends Controller
{

public function dashboard()
{
    $kelas = Kelas::all();

    $jumlahKelas = Kelas::count();
    $jumlahSoal = DB::table('soal_pg')
        ->where('user_id', auth()->id())
        ->count();

    return view('guru.dashboard', compact(
        'kelas',
        'jumlahKelas',
        'jumlahSoal'
    ));
}


/* ===============================
HALAMAN TAMBAH SOAL
=============================== */

public function tambahPg(Request $request)
{
    $kelas = DB::table('kelas')->get();

    $soal = [];

    if ($request->kelas_id && $request->mapel && $request->judul) {

        $soal = DB::table('soal_pg')
            ->where('kelas_id', $request->kelas_id)
            ->where('mapel', $request->mapel)
            ->where('judul', $request->judul)
            ->where('user_id', auth()->id())
            ->get();
    }

    return view('guru.tambah_pg', [
        'kelas' => $kelas,
        'soal' => $soal,
        'requestData' => $request->all()
    ]);
}


/* ===============================
SIMPAN SOAL
=============================== */

public function simpan_pg(Request $request)
{
    $request->validate([
        'pertanyaan' => 'required',
        'opsi_a' => 'required',
        'opsi_b' => 'required',
        'opsi_c' => 'required',
        'opsi_d' => 'required',
        'jawaban_benar' => 'required|array',
        'nilai' => 'required|numeric'
    ]);

    DB::table('soal_pg')->insert([
        'tugas_id'   => $request->tugas_id, // 🔥 INI WAJIB
        'user_id'    => auth()->id(),
        'kelas_id'   => $request->kelas_id,
        'mapel'      => $request->mapel,
        'judul'      => $request->judul,
        'instruksi'  => $request->instruksi,
        'pertanyaan' => $request->pertanyaan,
        'opsi_a'     => $request->opsi_a,
        'opsi_b'     => $request->opsi_b,
        'opsi_c'     => $request->opsi_c,
        'opsi_d'     => $request->opsi_d,
        'jawaban_benar'=> json_encode($request->jawaban_benar),
        'nilai'      => $request->nilai,
        'status'     => 0,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return back()->with('success_soal','Soal berhasil ditambahkan');
}


/* ===============================
EDIT SOAL
=============================== */

public function edit_pg($id)
{
    $soal = SoalPg::where('id',$id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    return view('guru.edit_pg',compact('soal'));
}


/* ===============================
UPDATE SOAL
=============================== */

public function update_pg(Request $request,$id)
{
    $soal = SoalPg::where('id',$id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    $soal->update([
        'judul'=>$request->judul,
        'pertanyaan'=>$request->pertanyaan,
        'opsi_a'=>$request->opsi_a,
        'opsi_b'=>$request->opsi_b,
        'opsi_c'=>$request->opsi_c,
        'opsi_d'=>$request->opsi_d,
        'jawaban_benar'=> json_encode($request->jawaban_benar),
        'nilai'=>$request->nilai,
        'updated_at'=>now()
    ]);

    return redirect(
        '/guru/tambah-pg?kelas_id='
        .$request->kelas_id.
        '&mapel='
        .$request->mapel.
        '&judul='
        .urlencode($request->judul)
    );
}


/* ===============================
HAPUS SOAL
=============================== */

public function hapusPg($id)
{
    DB::table('soal_pg')
        ->where('id',$id)
        ->where('user_id', auth()->id())
        ->delete();

    return back();
}


/* ===============================
SIMPAN TUGAS
=============================== */

public function simpan_tugas(Request $request)
{
    $totalScore = DB::table('soal_pg')
        ->where('kelas_id', $request->kelas_id)
        ->where('mapel', $request->mapel)
        ->where('judul', $request->judul)
        ->where('user_id', auth()->id())
        ->sum('nilai');

    // 🔥 TAMBAHAN PENTING (publish soal)
    DB::table('soal_pg')
        ->where('kelas_id', $request->kelas_id)
        ->where('mapel', $request->mapel)
        ->where('judul', $request->judul)
        ->where('user_id', auth()->id())
        ->update([
            'status' => 'publish'
        ]);

$tugasId = DB::table('tugas')->insertGetId([
    'user_id'     => auth()->id(),
    'kelas_id'    => $request->kelas_id,
    'judul'       => $request->judul,
    'mapel'       => $request->mapel,
    'instruksi'   => $request->instruksi,
    'username'    => auth()->user()->name,
    'total_score' => $totalScore,
    'created_at'  => now(),
    'updated_at'  => now()
]);

DB::table('soal_pg')
    ->whereNull('tugas_id')
    ->where('kelas_id', $request->kelas_id)
    ->where('mapel', $request->mapel)
    ->where('judul', $request->judul)
    ->where('user_id', auth()->id())
    ->update([
        'tugas_id' => $tugasId
    ]);

return redirect()
    ->route('guru.tugas.daftar')
    ->with('success_tugas', 'CBT berhasil dibuat');
}


/* ===============================
DAFTAR TUGAS
=============================== */

public function daftar_tugas()
{
    $tugas = DB::table('tugas')
        ->join('kelas','tugas.kelas_id','=','kelas.id')
        ->where('tugas.user_id', auth()->id())
        ->select('tugas.*','kelas.nama_kelas')
        ->get();

    return view('guru.daftar_tugas',compact('tugas'));
}


/* ===============================
HALAMAN CBT
=============================== */

public function detail_tugas($judul,$kelas,$mapel)
{
    $soal = DB::table('soal_pg')
        ->where('kelas_id',$kelas)
        ->where('mapel',$mapel)
        ->where('judul',$judul)
        ->where('user_id', auth()->id())
        ->where('status','publish')
        ->get();

    $kelas = DB::table('kelas')
        ->where('id',$kelas)
        ->first();

    return view('guru.detail_tugas',[
        'soal'=>$soal,
        'kelas'=>$kelas,
        'judul'=>$judul,
        'mapel'=>$mapel
    ]);
}


/* ===============================
PENGUMUMAN
=============================== */

public function store_pengumuman(Request $request)
{
    DB::table('pengumuman')->insert([
        'kelas_id' => $request->kelas_id,
        'isi' => $request->isi,
        'created_at' => now()
    ]);

    return back()->with('success','Pengumuman berhasil dikirim');
}


/* ===============================
TUGAS MANUAL
=============================== */

public function store_tugas(Request $request)
{
    DB::table('tugas')->insert([
        'user_id' => auth()->id(),
        'kelas_id' => $request->kelas_id,
        'mapel' => $request->mapel,
        'judul' => $request->judul,
        'created_at' => now()
    ]);

    return back()->with('success','Tugas berhasil ditambahkan');
}


/* ===============================
LIHAT NILAI
=============================== */

public function lihat_nilai($judul,$kelas,$mapel)
{
    $nilai = DB::table('hasil_tugas')
        ->join('users','hasil_tugas.user_id','=','users.id')
        ->where('hasil_tugas.kelas_id',$kelas)
        ->where('hasil_tugas.judul_tugas',$judul)
        ->select(
            'users.name as nama_siswa',
            'hasil_tugas.score'
        )
        ->get();

    return view('guru.nilai',[
        'nilai'=>$nilai,
        'judul'=>$judul
    ]);
}

}
