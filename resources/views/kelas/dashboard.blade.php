@extends('layouts.auth')

@section('content')

<style>
.custom-navbar {
    background: #4CAF50;
    padding: 15px 8%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
}

.custom-navbar h2 {
    margin: 0;
}

.custom-navbar ul {
    list-style: none;
    display: flex;
    gap: 30px;
    margin: 0;
    padding: 0;
}

.custom-navbar ul li a,
.custom-navbar ul li button {
    text-decoration: none;
    color: white;
    font-weight: 600;
    background: none;
    border: none;
    cursor: pointer;
}

.kelas-container {
    padding: 50px 8%;
}
</style>

<div class="custom-navbar">
    <h2>Dashboard {{ $kelas->nama_kelas }}</h2>

    <ul>
        <li>
            <a href="{{ route('kelas.tugas', $kelas->id) }}">Tugas</a>
        </li>
        <li>
            <a href="{{ route('kelas.pengumuman', $kelas->id) }}">Pengumuman</a>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </li>
    </ul>
</div>

<div class="kelas-container">

    <h1>Selamat datang, {{ auth()->user()->name }}</h1>

</div>

@endsection
