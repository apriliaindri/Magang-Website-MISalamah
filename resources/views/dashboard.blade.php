@extends('layouts.app')

@section('content')

<style>
html {
    scroll-behavior: smooth;
}

/* ===== NAVBAR HIJAU ===== */
.kelas-navbar {
    background: #2e7d32;
    padding: 15px 8%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.kelas-navbar h2 {
    color: white;
    margin: 0;
}

.kelas-menu {
    display: flex;
    gap: 30px;
}

.kelas-menu a {
    color: white;
    text-decoration: none;
    font-weight: 600;
    position: relative;
    padding-bottom: 5px;
    transition: 0.3s;
}

.kelas-menu a:hover {
    opacity: 0.8;
}

.kelas-menu a::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0%;
    height: 2px;
    background: white;
    transition: 0.3s;
}

.kelas-menu a:hover::after {
    width: 100%;
}

/* ===== CONTAINER ===== */
.kelas-container {
    padding: 60px 8%;
}

/* Section */
.kelas-section {
    margin-bottom: 80px;
}

.kelas-section h2 {
    margin-bottom: 25px;
}

/* Card Pengumuman */
.bubble {
    background: #f9f9f9;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    margin-bottom: 20px;
}

/* Card Tugas */
.card {
    background: #ffffff;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    border: 1px solid #eee;
    margin-bottom: 20px;
}

.download-btn {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 15px;
    background: #2e7d32;
    color: white;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
}
</style>


<!-- ===== NAVBAR HIJAU ===== -->
<div class="kelas-navbar">
    <h2>Kelas {{ $kelas->nama_kelas }}</h2>

    <div class="kelas-menu">
        <a href="#beranda">Beranda</a>
        <a href="#tugas">Tugas</a>
        <a href="#pengumuman">Pengumuman</a>
    </div>
</div>


<div class="kelas-container">

    <!-- BERANDA -->
    <section id="beranda" class="kelas-section">
        <h2>Beranda</h2>
        <p>Selamat datang di kelas {{ $kelas->nama_kelas }}.</p>
    </section>

    <!-- TUGAS -->
    <section id="tugas" class="kelas-section">
        <h2>Tugas</h2>

        @if($kelas->tugas->count())
            @foreach($kelas->tugas as $tugas)
                <div class="card">
                    <h3>{{ $tugas->judul }}</h3>

                    <p>
                        {{ $tugas->original_filename }}
                        ({{ $tugas->file_extension }})
                    </p>

                    <a href="{{ route('tugas.download', $tugas->id) }}"
                       class="download-btn">
                        Download
                    </a>

                    <br><br>

                    <small style="opacity:0.6;">
                        Upload oleh {{ $tugas->user->name ?? '-' }}
                        • {{ $tugas->created_at->format('d M Y H:i') }}
                    </small>
                </div>
            @endforeach
        @else
            <p>Tidak ada tugas.</p>
        @endif
    </section>

    <!-- PENGUMUMAN -->
    <section id="pengumuman" class="kelas-section">
        <h2>Pengumuman</h2>

        @if($kelas->pengumuman->count())
            @foreach($kelas->pengumuman as $pengumuman)
                <div class="bubble">
                    <h3>{{ $pengumuman->judul }}</h3>
                    <p>{{ $pengumuman->isi }}</p>
                    <small style="opacity:0.6;">
                        Oleh {{ $pengumuman->user->name ?? '-' }}
                        • {{ $pengumuman->created_at->format('d M Y H:i') }}
                    </small>
                </div>
            @endforeach
        @else
            <p>Tidak ada pengumuman.</p>
        @endif
    </section>

</div>

@endsection
