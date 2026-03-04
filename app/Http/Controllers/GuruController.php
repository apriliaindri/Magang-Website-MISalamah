<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.dashboard');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kelas' => 'required',
            'deskripsi' => 'required'
        ]);

        Tugas::create([
            'judul' => $request->judul,
            'kelas' => $request->kelas,
            'deskripsi' => $request->deskripsi,
            'user_id' => auth()->id()
        ]);

        return back()->with('success', 'Tugas berhasil ditambahkan!');
    }
}
