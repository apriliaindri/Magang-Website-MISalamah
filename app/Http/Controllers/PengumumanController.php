<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    // Admin list
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();

        return view('pengumuman.index', compact('pengumuman'));
    }

    // Halaman publik
    public function daftarPengumuman()
    {
        $pengumuman = Pengumuman::latest()->get();

        return view(
            'pengumuman.daftar_pengumuman',
            compact('pengumuman')
        );
    }

    // Detail pengumuman
    public function detail($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view(
            'pengumuman.detail_pengumuman',
            compact('pengumuman')
        );
    }

    // Form create
    public function create()
    {
        $kelas = Kelas::all();

        return view('pengumuman.create', compact('kelas'));
    }

    // Simpan pengumuman
    public function store(Request $request)
    {
        if (!in_array(auth()->user()->role, ['guru', 'kepala_sekolah'])) {
            abort(403);
        }

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        // Upload file
        $filePath = null;

        if ($request->hasFile('file')) {

            $filePath = $request->file('file')
                ->store('pengumuman/file', 'public');
        }

        // Upload multiple gambar
        $gambarPaths = [];

        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $gambar) {

                $path = $gambar->store(
                    'pengumuman/gambar',
                    'public'
                );

                $gambarPaths[] = $path;
            }
        }

        // Simpan data
        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kelas_id' => $request->kelas_id,
            'user_id' => auth()->id(),

            'file' => $filePath,
            'gambar' => json_encode($gambarPaths),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Pengumuman berhasil ditambahkan');
    }

    // Form edit
    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $kelas = Kelas::all();

        return view(
            'pengumuman.edit_pengumuman',
            compact('pengumuman', 'kelas')
        );
    }

    // Update pengumuman
    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kelas_id' => 'nullable',
        ]);

        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diupdate');
    }

    // Hapus pengumuman
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->delete();

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus');
    }
}
