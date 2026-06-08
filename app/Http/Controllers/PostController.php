<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function dashboard()
    {
        $latest = Post::latest()->take(1)->get();
        $others = Post::latest()->skip(1)->take(6)->get();

        return view('dashboard', compact('latest', 'others'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post-detail', compact('post'));
    }

    public function adminIndex()
    {
        $posts = Post::latest()->get();

        return view('admin.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(
            public_path('uploads'),
            $imageName
        );

        Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'image' => $imageName,
            'category' => 'terbaru',
        ]);

        return redirect('/admin/posts');
    }
}
