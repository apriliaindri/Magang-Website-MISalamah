@extends('layouts.app')

@section('content')
<div class="container py-5">

<h2 class="fw-bold mb-3">{{ $post->title }}</h2>

<img src="{{ asset('uploads/'.$post->image) }}"
     class="img-fluid rounded mb-4">

<p>{{ $post->content }}</p>

</div>
@endsection
