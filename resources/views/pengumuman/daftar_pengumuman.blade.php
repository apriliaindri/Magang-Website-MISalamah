<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Pengumuman</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/daftar_pengumuman.css') }}"
    >
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar">
        <a href="{{ url('/') }}" class="back-btn">
            <span class="back-icon">&#10094;</span>
            <span>Kembali</span>
        </a>

        <h1 class="navbar-title">
            Daftar Pengumuman
        </h1>
    </nav>

    {{-- Content --}}
    <section class="daftar-pengumuman-section">
        <div class="container">

            @forelse($pengumuman as $p)

                @php
                    $file = $p->first_file;
                    $ext = $p->first_file_extension;
                @endphp

                <a href="{{ route('pengumuman.detail.pengumuman', $p->id) }}" class="pengumuman-card">

                    {{-- Thumbnail --}}
                    <div class="card-image">

                        @if($file)

                            @if(in_array($ext, ['jpg', 'jpeg', 'png', 'webp']))

                                <img src="{{ asset('storage/' . $file) }}" alt="thumbnail">

                            @elseif($ext === 'pdf')

                                <div class="pdf-preview">
                                    <img src="{{ asset('img/pdf-icon.png') }}" alt="PDF">
                                    <span>PDF Document</span>
                                </div>

                            @else

                                <img src="{{ asset('img/default-news.jpg') }}" alt="default">

                            @endif

                        @else

                            <img src="{{ asset('img/default-news.jpg') }}" alt="default">

                        @endif

                    </div>

                    {{-- Content --}}
                    <div class="card-content">

                        <span class="kategori-home">
                            {{ $p->kelas?->nama_kelas ?? 'Semua Kelas' }}
                        </span>

                        <span class="tanggal">
                            {{ $p->created_at->format('d M Y') }}
                        </span>

                        <h3>
                            {{ \Illuminate\Support\Str::limit($p->judul, 70) }}
                        </h3>

                        <p>
                            {{ \Illuminate\Support\Str::limit(strip_tags($p->isi), 120) }}
                        </p>

                    </div>

                </a>

            @empty
                <div class="empty-state">
                    <p>Belum ada pengumuman.</p>
                </div>
            @endforelse

        </div>
    </section>

</body>
</html>
