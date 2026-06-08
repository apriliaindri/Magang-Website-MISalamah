<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Daftar Artikel</title>

    {{-- Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/daftar_pengumuman.css') }}"
    >
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar">
        <a
            href="{{ url()->previous() }}"
            class="back-btn"
        >
            <span class="back-icon">&#10094;</span>
            <span class="back-text">Kembali</span>
        </a>

        <h1 class="navbar-title">
            Daftar Artikel
        </h1>
    </nav>

    {{-- Content --}}
    <section class="daftar-pengumuman-section">
        <div class="container">

            {{-- GRID --}}
            <div class="pengumuman-grid">

                @forelse ($articles as $article)

                    @php
                        $images = is_array($article->image)
                            ? $article->image
                            : json_decode($article->image, true) ?? [];

                        $firstFile = $images[0] ?? $article->image ?? null;

                        $extension = $firstFile
                            ? strtolower(pathinfo($firstFile, PATHINFO_EXTENSION))
                            : null;

                        $imageExtensions = ['jpg', 'jpeg', 'png', 'webp'];
                    @endphp

                    <a
                        href="{{ route('artikel.detail.artikel', $article->id) }}"
                        class="pengumuman-card"
                    >

                        {{-- Thumbnail --}}
                        <div class="card-image">

                            @if ($firstFile && in_array($extension, $imageExtensions))
                                <img
                                    src="{{ asset('storage/' . $firstFile) }}"
                                    alt="Thumbnail Artikel"
                                >

                            @elseif ($firstFile && $extension === 'pdf')
                                <div class="pdf-preview">
                                    <img
                                        src="{{ asset('img/pdf-icon.png') }}"
                                        alt="PDF"
                                    >

                                    <span>PDF Document</span>
                                </div>

                            @else
                                <img
                                    src="{{ asset('img/default-news.jpg') }}"
                                    alt="Default Thumbnail"
                                >
                            @endif

                        </div>

                        {{-- Content --}}
                        <div class="card-content">

                            <span class="kategori-home">
                                {{ $article->category }}
                            </span>

                            <br>

                            <span class="tanggal">
                                {{ $article->created_at->format('d M Y') }}
                            </span>

                            <h3>
                                {{ \Illuminate\Support\Str::limit($article->title, 70) }}
                            </h3>

                            <p>
                                {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                            </p>

                        </div>

                    </a>

                @empty

                    <div class="empty-state">
                        <p>Belum ada artikel.</p>
                    </div>

                @endforelse

            </div>

        </div>
    </section>

    {{-- JS --}}
    <script src="{{ asset('js/daftar_artikel.js') }}"></script>

</body>

</html>
