@extends('layouts.auth')

@section('content')

<div class="custom-navbar" style="background:#4CAF50; padding:15px 8%; color:white;">
    <h2>Pengumuman - {{ $kelas->nama_kelas }}</h2>

    <a href="{{ route('kelas.show', $kelas->id) }}" style="color:white; font-weight:600;">
        ← Back
    </a>
</div>

<div style="padding:50px 8%;">
    <h1>Daftar Pengumuman</h1>
    <p>Isi pengumuman akan tampil di sini.</p>
</div>

@endsection
