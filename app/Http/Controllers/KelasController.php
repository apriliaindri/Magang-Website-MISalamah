<?php

namespace App\Http\Controllers;

use App\Models\Kelas;

class KelasController extends Controller
{
public function show($id)
{
    $kelas = Kelas::findOrFail($id);

    return view('kelas.dashboard', compact('kelas'));
}

    public function tugas($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.tugas', compact('kelas'));
    }

    public function pengumuman($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.pengumuman', compact('kelas'));
    }
}
