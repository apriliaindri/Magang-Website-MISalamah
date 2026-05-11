<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{

    public function formKode()
    {
        return view('auth.kode_global');
    }

    public function cekKode(Request $request)
    {
        if(trim($request->kode) !== 'salamahMI-Sulurejo'){
    return back()->with('error','Kode tidak valid!');
}

        return redirect()->route('register.global');
    }

    public function create()
    {
        return view('auth.register_global');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'guru',
        ]);

        return redirect('/login')->with('success','Akun berhasil dibuat');
    }

}
