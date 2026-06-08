<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Soal;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function tugas($kelas)
    {
        $kelas = DB::table('kelas')
            ->where('id', $kelas)
            ->first();

        $soal = DB::table('tugas')
            ->where('kelas_id', $kelas->id)
            ->get();

        return view('siswa.tugas', compact('kelas', 'soal'));
    }

    public function soal($kelas, $judul)
    {
        $kelas = DB::table('kelas')
            ->where('id', $kelas)
            ->first();

        $soal = DB::table('soal_pg')
            ->where('kelas_id', $kelas->id)
            ->where('judul', $judul)
            ->get();

        return view('siswa.detail_tugas', compact(
            'soal',
            'kelas',
            'judul'
        ));
    }
}
