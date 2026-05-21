@extends('layouts.auth')

@section('content')

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/pengumuman_kelas.css') }}"
    >

    {{-- Navbar --}}
    <div class="custom-navbar">

        <h2>
            Pengumuman - {{ $kelas->nama_kelas }}
        </h2>

        <a
            href="{{ route('kelas.dashboard', $kelas->id) }}"
            class="back-link"
        >
            ← Back
        </a>

    </div>

    {{-- Content --}}
    <div class="content-wrapper">

        <h1>
            Daftar Pengumuman
        </h1>

        <p>
            Isi pengumuman akan tampil di sini.
        </p>

    </div>

@endsection
