<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Kelas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/dashboard-kelas.css') }}">

    <style>
        .hidden { display: none; }
    </style>
</head>

<body>

<!-- TOPBAR -->
<div class="topbar">
    <div class="hamburger" onclick="toggleSidebar()">☰</div>
    <div class="topbar-title">
        Selamat Datang, {{ auth()->user()->name }}
    </div>
</div>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">

    <!-- PROFILE -->
    <div class="profile-card">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
        <div>
            <h3>{{ auth()->user()->name }}</h3>
            <p>{{ auth()->user()->role }}</p>
            <p>{{ $kelas->nama_kelas }}</p>
        </div>
    </div>

    <button onclick="showTugas()">Daftar Tugas</button>
    <button onclick="showPengumuman()">Daftar Pengumuman</button>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout-btn">Logout</button>
    </form>

</div>

<!-- CONTENT -->
<div class="content">

   <!-- CONTENT -->
<div class="content">

    <!-- STATE AWAL -->
    <div id="blank-state">
        <p style="color:gray;">
            Silakan pilih menu di sidebar untuk melihat konten
        </p>
    </div>

    <!-- TUGAS -->
    <div id="tugas" class="hidden">

        @if($kelas->tugas->count())

        <div class="card">
            <h2>Daftar Tugas</h2>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Mapel</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                        <th>Nilai</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($kelas->tugas as $tugas)

                @php
                $hasil = \App\Models\HasilTugas::where('user_id', auth()->id())
                        ->where('kelas_id', $kelas->id)
                        ->where('judul_tugas', $tugas->judul)
                        ->first();
                @endphp

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tugas->judul }}</td>
                    <td>{{ $tugas->mapel }}</td>
                    <td>{{ $kelas->nama_kelas }}</td>

                    <td>
                        @if(!$hasil)
                            <a href="{{ route('siswa.soal', $tugas->id) }}">
                                <button class="btn btn-primary">Kerjakan</button>
                            </a>
                        @else
                            <button disabled>Selesai</button>
                        @endif
                    </td>

                    <td>
                        @if($hasil)
                            <b style="color:green;">{{ $hasil->score }}</b>
                        @else
                            -
                        @endif
                    </td>
                </tr>

                @endforeach
                </tbody>
            </table>
        </div>

        @else
            <p>Tidak ada tugas</p>
        @endif

    </div> <!-- ❗ WAJIB DITUTUP -->



    <!-- PENGUMUMAN -->
    <div id="pengumuman" class="hidden">
        <div class="card">

            <h3>Pengumuman</h3>

            @forelse($pengumuman as $p)
                <div style="margin-bottom:15px; padding:10px; background:#fff; border-radius:8px;">
                    <h4>{{ $p->judul }}</h4>
                    <p>{{ $p->isi }}</p>
                </div>
            @empty
                <p>Tidak ada pengumuman</p>
            @endforelse

        </div>
    </div>

</div>

<!-- SCRIPT -->
<script>

function toggleSidebar(){
    document.getElementById("sidebar").classList.toggle("active");
}

function hideAll(){
    document.getElementById("blank-state").classList.add("hidden");
    document.getElementById("tugas").classList.add("hidden");
    document.getElementById("pengumuman").classList.add("hidden");
}

function showTugas(){
    hideAll();
    document.getElementById("tugas").classList.remove("hidden");
    closeSidebar();
}

function showPengumuman(){
    hideAll();
    document.getElementById("pengumuman").classList.remove("hidden");
    closeSidebar();
}

function closeSidebar(){
    document.getElementById("sidebar").classList.remove("active");
}

</script>

</body>
</html>
