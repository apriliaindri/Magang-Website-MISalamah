<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KepalaSekolahController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('kepalasekolah.dashboard', compact('users'));
    }

    // TAMBAH USER
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

return redirect()->route('kepalasekolah.dashboard')
    ->with('success', 'User berhasil ditambahkan');
    }

    // HAPUS USER
    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success', 'User berhasil dihapus');
    }

    // RESET PASSWORD
    public function resetPassword($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'password' => Hash::make('password123')
        ]);

        return back()->with('success', 'Password direset ke password123');
    }
}
