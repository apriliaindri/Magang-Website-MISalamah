<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email','password'))) {

            $request->session()->regenerate();

            $user = Auth::user();
            // =========================
            // 🔥 VALIDASI KELAS PILIHAN
            // =========================
            $selectedKelas = session('selected_kelas');

            if ($user->role == 'siswa') {

                // kalau user sudah pilih kelas tapi tidak sesuai akun
                if ($selectedKelas && $user->kelas_id != $selectedKelas) {
                    Auth::logout();
                    return back()->withErrors([
                        'email' => 'Akun tidak sesuai dengan kelas yang dipilih.'
                    ]);
                }

                // kalau tidak pilih kelas, pakai kelas user
                $kelasId = $user->kelas_id ?? 1;

                return redirect()->route('kelas.dashboard', $kelasId);
            }

            // Role Guru
            if ($user->role == 'guru') {
                return redirect()->route('guru.dashboard');
            }

            // Role Kepala Sekolah
            if ($user->role == 'kepala_madrasah') {
                return redirect()->route('kepalasekolah.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
