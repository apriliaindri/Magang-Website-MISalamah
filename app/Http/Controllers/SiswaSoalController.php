<?php

namespace App\Http\Controllers;

use App\Models\DraftJawaban;
use App\Models\HasilTugas;
use App\Models\Kelas;
use App\Models\SoalPg;
use App\Models\Tugas;
use Illuminate\Http\Request;

class SiswaSoalController extends Controller
{
    public function tugas($tugas_id)
    {
        $tugas = Tugas::findOrFail($tugas_id);

        $kelas = Kelas::findOrFail($tugas->kelas_id);

        $sudah = HasilTugas::where('user_id', auth()->id())
            ->where('judul_tugas', $tugas->judul)
            ->where('kelas_id', $tugas->kelas_id)
            ->exists();

        $soal = SoalPg::where('tugas_id', $tugas->id)->get();

        $draft = DraftJawaban::where('user_id', auth()->id())
            ->pluck('jawaban', 'soal_id');

        return view('siswa.soal', compact(
            'kelas',
            'tugas',
            'soal',
            'draft',
            'sudah'
        ));
    }

    public function submit(Request $request)
    {
        $score = 0;

        foreach ($request->jawaban as $id => $jawabanSiswa) {
            $soal = SoalPg::find($id);

            if (! $soal) {
                continue;
            }

            $kunci = json_decode($soal->jawaban_benar, true);

            if (! $kunci) {
                $kunci = explode(',', $soal->jawaban_benar);
            }

            if (! is_array($jawabanSiswa)) {
                $jawabanSiswa = [$jawabanSiswa];
            }

            $kunci = array_map('trim', $kunci);
            $jawabanSiswa = array_map('trim', $jawabanSiswa);

            sort($kunci);
            sort($jawabanSiswa);

            if ($kunci == $jawabanSiswa) {
                $score += $soal->nilai;
            }
        }

        $tugas = Tugas::find($request->tugas_id);

        if (! $tugas) {
            return back()->with('error', 'Tugas tidak ditemukan');
        }

        HasilTugas::create([
            'user_id' => auth()->id(),
            'nama' => auth()->user()->name,
            'kelas_id' => $request->kelas_id,
            'mapel' => $tugas->mapel,
            'judul_tugas' => $tugas->judul,
            'score' => $score,
        ]);

        return redirect()
            ->route('kelas.dashboard', $request->kelas_id)
            ->with('success', 'CBT berhasil disubmit! Nilai kamu: ' . $score);
    }

    public function saveDraft(Request $request)
    {
        foreach ($request->jawaban as $soal_id => $jawaban) {
            DraftJawaban::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'soal_id' => $soal_id,
                ],
                [
                    'jawaban' => json_encode($jawaban),
                ]
            );
        }

        return response()->json([
            'status' => 'saved',
        ]);
    }
}
