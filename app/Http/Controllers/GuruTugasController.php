<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use Illuminate\Support\Facades\Storage;

class GuruTugasController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'judul' => 'required',
            'file' => 'required|file|max:10240' // max 10MB
        ]);

        $file = $request->file('file');

        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $size = $file->getSize();

        // Buat nama file unik
        $storedName = time().'_'.$originalName;

        // Simpan ke storage/app/public/tugas
        $file->storeAs('public/tugas', $storedName);

        Tugas::create([
            'user_id' => auth()->id(),
            'kelas_id' => $request->kelas_id,
            'judul' => $request->judul,
            'original_filename' => $originalName,
            'stored_filename' => $storedName,
            'file_extension' => $extension,
            'file_size' => $size
        ]);

        return back()->with('success', 'Tugas berhasil diupload');
    }
}
