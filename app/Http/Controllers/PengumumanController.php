<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Kelas;

class PengumumanController extends Controller
{

    // ✅ LIST (untuk home / publik)
public function index(Request $request)
{
    $pengumuman = Pengumuman::all();

    $detail = null;
    if($request->id){
        $detail = Pengumuman::find($request->id);
    }

    return view('pengumuman.daftar_pengumuman', compact('pengumuman','detail'));
}

public function daftarPengumuman()
{
    $pengumuman = Pengumuman::latest()->paginate(12);

    return view('pengumuman.daftar_pengumuman', compact('pengumuman'));
}

public function create()
{
    $kelas = \App\Models\Kelas::all(); // kalau pakai kelas
    return view('pengumuman.create', compact('kelas'));
}

    // ✅ SIMPAN
    public function store(Request $request)
    {
        if(!in_array(auth()->user()->role, ['guru','kepala_sekolah'])){
            abort(403);
        }

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kelas_id' => 'nullable'
        ]);

        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kelas_id' => $request->kelas_id,
            'user_id' => auth()->id(), // penting!
            'file' => $request->file('file') ? $request->file('file')->store('pengumuman') : null,
        ]);

return redirect()->back()
    ->with('success', 'Pengumuman berhasil ditambahkan');
    }

    public function edit($id)
{
    $pengumuman = Pengumuman::findOrFail($id);
    $kelas = Kelas::all();

    return view('pengumuman.edit_pengumuman', compact('pengumuman','kelas'));
}

public function update(Request $request, $id)
{
    $pengumuman = Pengumuman::findOrFail($id);

    $pengumuman->update([
        'judul' => $request->judul,
        'isi' => $request->isi,
        'kelas_id' => $request->kelas_id,
    ]);

    return redirect()->back()->with('success', 'Pengumuman berhasil diupdate');
}

}
