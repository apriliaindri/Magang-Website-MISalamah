<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Dashboard Kelas
    </title>

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/dashboard-kelas.css') }}"
    >

</head>

<body>

    {{-- TOPBAR --}}
    <div class="topbar">

        <div
            class="hamburger"
            onclick="toggleSidebar()"
        >
            ☰
        </div>

        <div class="topbar-title">

            Selamat Datang,
            {{ auth()->user()->name }}

        </div>

    </div>

    {{-- SIDEBAR --}}
    <div
        class="sidebar"
        id="sidebar"
    >

        {{-- PROFILE --}}
        <div class="profile-card">

            <img
                src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                alt="Profile"
            >

            <div>

                <h3>
                    {{ auth()->user()->name }}
                </h3>

                <p>
                    {{ auth()->user()->role }}
                </p>

                <p>
                    {{ $kelas->nama_kelas }}
                </p>

            </div>

        </div>

        {{-- Menu --}}
        <button onclick="showTugas()">
            Daftar Tugas
        </button>

        <button onclick="showPengumuman()">
            Daftar Pengumuman
        </button>

        {{-- Logout --}}
        <form
            action="{{ route('logout') }}"
            method="POST"
        >

            @csrf

            <button class="logout-btn">
                Logout
            </button>

        </form>

    </div>

    {{-- CONTENT --}}
    <div class="content">

        {{-- Blank State --}}
        <div id="blank-state">

            <p class="blank-text">
                Silakan pilih menu di sidebar untuk melihat konten
            </p>

        </div>

        {{-- TUGAS --}}
        <div
            id="tugas"
            class="hidden"
        >

            @if($kelas->tugas->count())

                <div class="card">

                    <h2>
                        Daftar Tugas
                    </h2>

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

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $tugas->judul }}
                                    </td>

                                    <td>
                                        {{ $tugas->mapel }}
                                    </td>

                                    <td>
                                        {{ $kelas->nama_kelas }}
                                    </td>

                                    <td>

                                        @if(!$hasil)

                                            <a href="{{ route('siswa.soal', $tugas->id) }}">

                                                <button class="btn btn-primary">
                                                    Kerjakan
                                                </button>

                                            </a>

                                        @else

                                            <button disabled>
                                                Selesai
                                            </button>

                                        @endif

                                    </td>

                                    <td>

                                        @if($hasil)

                                            <b class="nilai-success">
                                                {{ $hasil->score }}
                                            </b>

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

                <p>
                    Tidak ada tugas
                </p>

            @endif

        </div>

        {{-- PENGUMUMAN --}}
        <div
            id="pengumuman"
            class="hidden"
        >

            @if($pengumuman->count())

                <div class="pengumuman-grid">

                    @foreach($pengumuman as $p)

                        @php

                            $gambar = is_array($p->gambar)
                                ? $p->gambar
                                : json_decode($p->gambar, true) ?? [];

                            $filePertama = $gambar[0] ?? null;

                            $ext = $filePertama
                                ? strtolower(pathinfo($filePertama, PATHINFO_EXTENSION))
                                : null;

                        @endphp

                        <a
                            href="{{ route('pengumuman.detail.pengumuman', $p->id) }}"
                            class="pengumuman-card"
                        >

                            {{-- IMAGE --}}
                            <div class="card-image">

                                @if($filePertama)

                                    @if(in_array($ext, ['jpg', 'jpeg', 'png', 'webp']))

                                        <img
                                            src="{{ asset('storage/' . $filePertama) }}"
                                            alt="Thumbnail"
                                        >

                                    @elseif($ext == 'pdf')

                                        <div class="pdf-preview">

                                            <img
                                                src="{{ asset('img/pdf-icon.png') }}"
                                                alt="PDF"
                                            >

                                            <span>
                                                PDF Document
                                            </span>

                                        </div>

                                    @else

                                        <img
                                            src="{{ asset('img/default-news.jpg') }}"
                                            alt="Default"
                                        >

                                    @endif

                                @else

                                    <img
                                        src="{{ asset('img/default-news.jpg') }}"
                                        alt="Default"
                                    >

                                @endif

                            </div>

                            {{-- CONTENT --}}
                            <div class="pengumuman-content">

                                <div class="info-row">

                                    <span class="kategori-home">

                                        {{ $p->kelas ? $p->kelas->nama_kelas : 'Semua Kelas' }}

                                    </span>

                                    <span class="tanggal">

                                        {{ $p->created_at->format('d M Y') }}

                                    </span>

                                </div>

                                <h3>

                                    {{ \Illuminate\Support\Str::limit($p->judul, 60) }}

                                </h3>

                                <p>

                                    {{ \Illuminate\Support\Str::limit(strip_tags($p->isi), 100) }}

                                </p>

                            </div>

                        </a>

                    @endforeach

                </div>

            @else

                <p>
                    Tidak ada pengumuman
                </p>

            @endif

        </div>

    </div>

    {{-- JS --}}
    <script src="{{ asset('js/dashboard_kelas.js') }}"></script>

</body>

</html>
