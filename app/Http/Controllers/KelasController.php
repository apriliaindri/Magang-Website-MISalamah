<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Soal;
use App\Models\SoalPg;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);

        $soal = Soal::where('kelas_id', $id)->get();

        return view('siswa.soal.tugas', compact('kelas', 'soal'));
    }

    public function dashboard($id)
    {
        $kelas = Kelas::with(['tugas.user'])->findOrFail($id);

        $pengumuman = \App\Models\Pengumuman::where(function ($q) use ($id) {
            $q->where('kelas_id', $id)
                ->orWhereNull('kelas_id');
        })->latest()->get();

        return view('kelas.dashboard', compact('kelas', 'pengumuman'));
    }

    public function tugas($id)
    {
        $kelas = Kelas::findOrFail($id);

        $soal = SoalPg::where('kelas_id', $id)
            ->where('status', 1)
            ->get();

        return view('kelas.tugas', compact('kelas', 'soal'));
    }

    public function pengumuman($id)
    {
        $kelas = \App\Models\Kelas::findOrFail($id);

        $pengumuman = \App\Models\Pengumuman::where(function ($q) use ($id) {
            $q->where('kelas_id', $id)
                ->orWhereNull('kelas_id');
        })->latest()->get();

        return view('kelas.pengumuman', compact('kelas', 'pengumuman'));
    }
}
