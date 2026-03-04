@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Tambah Artikel</h2>
    <form method="POST" action="/artikel/store" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Judul Artikel" required>
        <input type="text" name="category" placeholder="Kategori">
        <textarea name="content" rows="6" placeholder="Isi Artikel" required></textarea>
        <input type="file" name="image" required>
        <button type="submit">Publish</button>
    </form>
</div>
@endsection
