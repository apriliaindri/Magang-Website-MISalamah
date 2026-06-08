<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class GuruTugasController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'mapel' => 'required',
            'judul' => 'required',
            'instruksi' => 'nullable',
        ]);

        $tugas = Tugas::create([
            'user_id' => auth()->id(),
            'kelas_id' => $request->kelas_id,
            'mapel' => $request->mapel,
            'judul' => $request->judul,
            'instruksi' => $request->instruksi,
        ]);

        return redirect()->route('guru.soal.create', $tugas->id);
    }
}
