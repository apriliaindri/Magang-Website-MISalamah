<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index()
    {
        return view('pengumuman.index', [
            'pengumuman' => Pengumuman::latest()->get(),
        ]);
    }

    public function daftarPengumuman()
    {
        return view('pengumuman.daftar_pengumuman', [
            'pengumuman' => Pengumuman::latest()->get(),
        ]);
    }

    public function detail($id)
    {
        return view('pengumuman.detail_pengumuman', [
            'pengumuman' => Pengumuman::findOrFail($id),
        ]);
    }

    public function create()
    {
        return view('pengumuman.create', [
            'kelas' => Kelas::all(),
        ]);
    }

    public function store(Request $request)
    {
        abort_unless(
            in_array(auth()->user()->role, ['guru', 'kepala_sekolah']),
            403
        );

        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $filePath = $request->hasFile('file')
            ? $request->file('file')->store('pengumuman/file', 'public')
            : null;

        $gambarPaths = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $gambarPaths[] = $file->store('pengumuman/gambar', 'public');
            }
        }

        Pengumuman::create([
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'kelas_id' => $request->kelas_id,
            'user_id' => auth()->id(),
            'file' => $filePath,
            'gambar' => $gambarPaths,
        ]);

        return back()->with('success', 'Pengumuman berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('pengumuman.edit_pengumuman', [
            'pengumuman' => Pengumuman::findOrFail($id),
            'kelas' => Kelas::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $gambar = $pengumuman->gambar ?? [];

        if ($request->hapus_file) {
            foreach ($request->hapus_file as $hapus) {
                Storage::disk('public')->delete($hapus);

                $gambar = array_values(array_filter(
                    $gambar,
                    fn ($item) => $item !== $hapus
                ));
            }
        }

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $gambar[] = $file->store('pengumuman/gambar', 'public');
            }
        }

        $pengumuman->update([
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'kelas_id' => $request->kelas_id,
            'gambar' => $gambar,
        ]);

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diupdate');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        foreach (($pengumuman->gambar ?? []) as $file) {
            Storage::disk('public')->delete($file);
        }

        if ($pengumuman->file) {
            Storage::disk('public')->delete($pengumuman->file);
        }

        $pengumuman->delete();

        return redirect()
            ->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus');
    }
}
