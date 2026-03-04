@extends('layouts.app')

@section('content')
<div class="container py-5">

<form action="/admin/posts/store" method="POST" enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="title" class="form-control">
</div>

<div class="mb-3">
    <label>Excerpt</label>
    <textarea name="excerpt" class="form-control"></textarea>
</div>

<div class="mb-3">
    <label>Content</label>
    <textarea name="content" class="form-control" rows="5"></textarea>
</div>

<div class="mb-3">
    <label>Gambar</label>
    <input type="file" name="image" class="form-control">
</div>

<button class="btn btn-primary">Simpan</button>

</form>

</div>
@endsection
