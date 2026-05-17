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
    $request->validate([

        'title' => 'required',
        'category' => 'required',
        'content' => 'required',

        'images.*' =>
        'nullable|mimes:jpg,jpeg,png,webp,pdf,doc,docx|max:20480'

    ]);

    $files = [];

    if($request->hasFile('images')){

        foreach($request->file('images') as $file){

            $path = $file->store('artikel', 'public');

            $files[] = $path;
        }
    }

    Article::create([

        'title' => $request->title,

        'category' => $request->category,

        'sub_category' => $request->sub_category,

        'content' => $request->content,

        'image' => json_encode($files),

        'user_id' => auth()->id()

    ]);

    return redirect()->route('home')
        ->with('success','Artikel berhasil dipublish');
}

public function daftarArtikel()
{
    $articles = Article::latest()->get();

    return view(
        'artikel.daftar_artikel',
        compact('articles')
    );
}

public function detailArtikel($id)
{
    $article = Article::findOrFail($id);

    return view(
        'artikel.detail_artikel',
        compact('article')
    );
}

public function editArtikel($id)
{
    $article = Article::findOrFail($id);

    return view(
        'kepalasekolah.artikel.edit_artikel',
        compact('article')
    );
}

public function updateArtikel(Request $request, $id)
{
    $article = Article::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'category' => 'required',
        'content' => 'required',
    ]);

    $files = json_decode($article->image, true) ?? [];

    if($request->hasFile('images')){

        $files = [];

        foreach($request->file('images') as $file){

            $path = $file->store('artikel', 'public');

            $files[] = $path;
        }
    }

    $article->update([

        'title' => $request->title,

        'category' => $request->category,

        'sub_category' => $request->sub_category,

        'content' => $request->content,

        'image' => json_encode($files),

    ]);

    return redirect()
        ->route('kepalasekolah.artikel.index')
        ->with('success', 'Artikel berhasil diupdate');
}

public function index()
{
    $articles = Article::latest()->get();

    return view(
        'kepalasekolah.artikel.index_artikel',
        compact('articles')
    );
}

public function home()
{
    $articles = Article::latest()->get();

    $pengumuman = Pengumuman::latest()->get();

    return view(
        'home',
        compact('articles', 'pengumuman')
    );
}
}
