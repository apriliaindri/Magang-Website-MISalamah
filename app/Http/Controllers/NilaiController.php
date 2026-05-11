<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;

class NilaiController extends Controller
{
    public function index()
    {
        $jawabans = Jawaban::with('user','soal')->get();
        return view('guru.soal.hasil', compact('jawabans'));
    }
}
