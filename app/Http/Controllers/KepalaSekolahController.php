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

    public function manageUser()
    {
        $users = User::all();

        return view('kepalasekolah.manage_user', compact('users'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()
            ->route('kepalasekolah.dashboard')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();

        return back()->with('success', 'User berhasil dihapus');
    }

    public function resetPassword(Request $request, $id)
    {
        $request->validate([
            'new_password' => 'required|min:6',
        ]);

        $user = User::findOrFail($id);

        $user->password = Hash::make($request->new_password);

        $user->save();

        return back()->with(
            'success',
            'Password berhasil direset'
        );
    }

public function updateRole(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'role' => 'required|in:guru,siswa,kepala_madrasah'
    ]);

    $user->role = $request->role;
    $user->save();

    return back()->with('success', 'Role berhasil diperbarui');
}
}
