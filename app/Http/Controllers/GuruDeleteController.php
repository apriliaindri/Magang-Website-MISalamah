<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GuruDeleteController extends Controller
{
    public function deleteTugas($id)
    {
        $tugas = DB::table('tugas')
            ->where('id', $id)
            ->first();

        if (! $tugas) {
            return back()->with('error', 'Tugas tidak ditemukan');
        }

        DB::table('soal_pg')
            ->where('kelas_id', $tugas->kelas_id)
            ->where('mapel', $tugas->mapel)
            ->where('judul', $tugas->judul)
            ->delete();

        DB::table('tugas')
            ->where('id', $id)
            ->delete();

        return back()->with('success', 'Tugas berhasil dihapus');
    }
}
