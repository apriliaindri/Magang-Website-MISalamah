<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Tugas;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function create($id)
    {
        $tugas = Tugas::findOrFail($id);

        return view('guru.soal.create', compact('tugas'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'pilihan_a' => 'required',
            'pilihan_b' => 'required',
            'pilihan_c' => 'required',
            'pilihan_d' => 'required',
            'kunci_jawaban' => 'required',
            'score' => 'required|integer',
        ]);

        Soal::create([
            'tugas_id' => $id,
            'pertanyaan' => $request->pertanyaan,
            'pilihan_a' => $request->pilihan_a,
            'pilihan_b' => $request->pilihan_b,
            'pilihan_c' => $request->pilihan_c,
            'pilihan_d' => $request->pilihan_d,
            'kunci_jawaban' => $request->kunci_jawaban,
            'score' => $request->score,
        ]);

        return back()->with('success', 'Soal berhasil ditambahkan.');
    }
}
