@extends('layouts.app')

@section('content')
<div class="container py-5">

<a href="/admin/posts/create" class="btn btn-success mb-3">
    + Tambah Berita
</a>

<table class="table table-bordered">
    <tr>
        <th>Judul</th>
        <th>Tanggal</th>
    </tr>

@foreach($posts as $post)
    <tr>
        <td>{{ $post->title }}</td>
        <td>{{ $post->created_at->format('d-m-Y') }}</td>
    </tr>
@endforeach

</table>

</div>
@endsection
