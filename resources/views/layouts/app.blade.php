<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Website Sekolah' }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo-area">
        <img src="{{ asset('img/LogoMI.png') }}" alt="Logo">
        <div class="school-name">MI Salamah</div>
    </div>

    <div class="nav-menu">

        <a href="{{ route('home') }}">Beranda</a>

        <!-- Profil -->
        <div class="dropdown">
            <a href="#" class="has-dropdown">Profil</a>
            <div class="dropdown-content">
                <a href="{{ route('visi') }}">Visi & Misi</a>
                <a href="{{ route('tatib') }}">Tata Tertib</a>
            </div>
        </div>

        <!-- Kelas -->
        <div class="dropdown">
            <a href="#" class="has-dropdown">Kelas</a>
            <div class="dropdown-content">
                <a href="{{ route('pilih.kelas', 1) }}">Kelas 1</a>
<a href="{{ route('pilih.kelas', 2) }}">Kelas 2</a>
<a href="{{ route('pilih.kelas', 3) }}">Kelas 3</a>
<a href="{{ route('pilih.kelas', 4) }}">Kelas 4</a>
<a href="{{ route('pilih.kelas', 5) }}">Kelas 5</a>
<a href="{{ route('pilih.kelas', 6) }}">Kelas 6</a>
            </div>
        </div>

        <a href="#">Pengumuman</a>
        <a href="#">Artikel</a>

        <!-- AUTH -->
        @guest
            <a href="{{ route('login') }}">Login</a>
        @endguest

        @auth

            @if(auth()->user()->role == 'guru')
                <a href="{{ url('/guru') }}">Dashboard</a>
            @elseif(auth()->user()->role == 'admin')
                <a href="{{ url('/admin') }}">Dashboard</a>
            @elseif(auth()->user()->role == 'kepala_sekolah')
                <a href="{{ url('/kepsek') }}">Dashboard</a>
            @elseif(auth()->user()->role == 'siswa')
                <a href="{{ url('/siswa') }}">Dashboard</a>
            @endif

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" style="background:none;border:none;cursor:pointer;font-family:Poppins;">
                    Logout
                </button>
            </form>

        @endauth

    </div>
</div>

<!-- CONTENT -->
<div class="main-content">
    @yield('content')
</div>

</body>
</html>
