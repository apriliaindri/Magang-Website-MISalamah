<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaRegisterController extends Controller
{
    public function create($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('auth.register', compact('kelas'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'kode_kelas' => 'required',
        ]);

        $kelas = Kelas::where('id', $id)
            ->where('kode_kelas', $request->kode_kelas)
            ->first();

        if (! $kelas) {
            return back()->with('error', 'Kode kelas salah!');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
            'kelas_id' => $id,
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function formKode($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('auth.kode_kelas', compact('kelas'));
    }

    public function cekKode(Request $request, $id)
    {
        $kelas = Kelas::where('id', $id)
            ->where('kode_kelas', $request->kode_kelas)
            ->first();

        if (! $kelas) {
            return back()->with('error', 'Kode kelas salah!');
        }

        return redirect()->route('siswa.register', $id);
    }
}
