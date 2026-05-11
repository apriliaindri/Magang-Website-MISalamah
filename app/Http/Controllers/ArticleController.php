<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Pengumuman;

class ArticleController extends Controller
{
    public function create()
    {
        return view('kepalasekolah.artikel.create');
    }

    public function store(Request $request)
{
    $path = null;

    if($request->hasFile('image')){
        $path = $request->file('image')->store('artikel','public');
    }

    Article::create([
        'title' => $request->title,
        'category' => $request->category,
        'sub_category' => $request->sub_category,
        'content' => $request->content,
        'image' => $path,
        'user_id' => auth()->id()
    ]);

    // ⬇️ INI YANG DIUBAH
    return redirect()->route('home')
        ->with('success','Artikel berhasil dipublish');
}

public function index()
{
    $articles = Article::latest()->get();
    $pengumuman = Pengumuman::latest()->get(); // ⬅️ ini yang kurang

    return view('home', compact('articles','pengumuman'));
}
}
