<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\SoalPg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoalPgController extends Controller
{
    public function create()
    {
        $kelas = Kelas::all();

        $soal = SoalPg::where('status', 0)->get();

        return view('guru.tambah_pg', compact('kelas', 'soal'));
    }

    public function store(Request $request)
    {
        SoalPg::create([
            'tugas_id' => $request->tugas_id,
            'kelas_id' => $request->kelas_id,
            'mapel' => $request->mapel,
            'judul' => $request->judul,
            'pertanyaan' => $request->pertanyaan,
            'opsi_a' => $request->opsi_a,
            'opsi_b' => $request->opsi_b,
            'opsi_c' => $request->opsi_c,
            'opsi_d' => $request->opsi_d,
            'jawaban_benar' => $request->jawaban_benar,
            'nilai' => $request->nilai,
            'status' => 0,
        ]);

        return back()->with('success', 'Soal berhasil disimpan');
    }

    public function publish(Request $request)
    {
        DB::table('soal_pg')
            ->where('kelas_id', $request->kelas_id)
            ->where('mapel', $request->mapel)
            ->update([
                'status' => 'publish',
            ]);

        return redirect()->route('guru.tugas.daftar');
    }

    public function simpan(Request $request)
    {
        SoalPg::create([
            'kelas_id' => $request->kelas_id,
            'judul' => $request->judul,
            'pertanyaan' => $request->pertanyaan,
            'opsi_a' => $request->opsi_a,
            'opsi_b' => $request->opsi_b,
            'opsi_c' => $request->opsi_c,
            'opsi_d' => $request->opsi_d,
            'jawaban_benar' => $request->jawaban_benar,
            'nilai' => $request->nilai,
            'status' => 0,
        ]);

        return back()->with('success', 'Soal berhasil dibuat');
    }

    public function destroy($id)
    {
        $soal = SoalPg::findOrFail($id);

        $soal->delete();

        return back()->with('success', 'Soal berhasil dihapus');
    }
}
