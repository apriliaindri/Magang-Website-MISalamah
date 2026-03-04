<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Kelas;

class ArticleController extends Controller
{
    public function index()
    {
        $latest = Article::latest()->take(4)->get();
        $kelas = Kelas::all(); // 🔥 ambil semua kelas

        return view('home', compact('latest', 'kelas'));
    }
}
