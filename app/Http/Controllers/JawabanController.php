<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Soal;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function kerjakan($kelas_id)
    {
        $soal = Soal::where('kelas_id', $kelas_id)->get();

        return view('siswa.soal.kerjakan', [
            'soal' => $soal,
            'kelas_id' => $kelas_id,
        ]);
    }

    public function submit(Request $request)
    {
        $totalNilai = 0;

        if ($request->has('jawaban')) {
            foreach ($request->jawaban as $soal_id => $jawaban_siswa) {
                $soal = Soal::find($soal_id);

                $nilai = 0;

                if ($jawaban_siswa == $soal->kunci_jawaban) {
                    $nilai = $soal->score;
                    $totalNilai += $nilai;
                }

                Jawaban::create([
                    'soal_id' => $soal_id,
                    'user_id' => auth()->id(),
                    'jawaban' => $jawaban_siswa,
                    'nilai' => $nilai,
                ]);
            }
        }

        return view('siswa.soal.hasil', compact('totalNilai'));
    }
}
