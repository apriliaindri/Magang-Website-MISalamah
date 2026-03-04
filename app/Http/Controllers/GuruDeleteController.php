<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Pengumuman;

class GuruDeleteController extends Controller
{
    public function deleteTugas($id)
    {
        $tugas = Tugas::findOrFail($id);
        $tugas->delete(); // Soft delete

        return back()->with('success', 'Tugas berhasil dihapus');
    }

    public function deletePengumuman($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete(); // Soft delete

        return back()->with('success', 'Pengumuman berhasil dihapus');
    }
}
