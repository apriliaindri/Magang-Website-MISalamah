<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // ✅ INI WAJIB

class GuruDeleteController extends Controller
{
    public function deleteTugas($id)
    {
        // ambil data tugas dulu
        $tugas = DB::table('tugas')->where('id',$id)->first();

        if(!$tugas){
            return back()->with('error','Tugas tidak ditemukan');
        }

        // hapus soal terkait
        DB::table('soal_pg')
            ->where('kelas_id',$tugas->kelas_id)
            ->where('mapel',$tugas->mapel)
            ->where('judul',$tugas->judul)
            ->delete();

        // hapus tugas
        DB::table('tugas')->where('id',$id)->delete();

        return back()->with('success','Tugas berhasil dihapus');
    }
}
