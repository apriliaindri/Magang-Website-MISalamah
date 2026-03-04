<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
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
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'siswa',
        'kelas_id' => $id,
    ]);

    // HAPUS auth()->login($user);

    return redirect()->route('login')
        ->with('success', 'Registrasi berhasil! Silakan login.');
}
}
