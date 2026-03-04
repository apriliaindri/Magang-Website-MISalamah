<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class GuruPengumumanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string'
        ]);

        Pengumuman::create([
            'kelas_id' => $request->kelas_id,
            'uploaded_by_name' => auth()->user()->name,
            'uploaded_by_email' => auth()->user()->email,
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return back()->with('success', 'Pengumuman berhasil dibuat');
    }
}
