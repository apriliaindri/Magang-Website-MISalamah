<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $article->title }}</title>

    {{-- Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/detail_pengumuman.css') }}"
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
            <span>Kembali</span>
        </a>
    </nav>

    {{-- Content --}}
    <section class="detail-section">
        <div class="container">
            <div class="detail-wrapper">
                <div class="detail-content">

                    {{-- Meta --}}
                    <div class="detail-meta">
                        <span class="kategori-badge">
                            {{ $article->category }}
                        </span>

                        <span class="detail-date">
                            {{ $article->created_at->format('d M Y, H:i') }}
                        </span>
                    </div>

                    {{-- Title --}}
                    <h1 class="detail-title">
                        {{ $article->title }}
                    </h1>

                    @php
                        $images = is_array($article->image)
                            ? $article->image
                            : json_decode($article->image, true) ?? [];

                        $imageExtensions = ['jpg', 'jpeg', 'png', 'webp'];
                    @endphp

                    {{-- File & Image --}}
                    @foreach ($images as $file)

                        @php
                            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        @endphp

                        @if (in_array($extension, $imageExtensions))
                            <div class="detail-image">
                                <img
                                    src="{{ asset('storage/' . $file) }}"
                                    alt="Gambar Artikel"
                                    onclick="openModal(this.src)"
                                >
                            </div>

                        @elseif ($extension === 'pdf')
                            <div class="file-card">
                                <img
                                    src="{{ asset('img/pdf-icon.png') }}"
                                    class="file-icon"
                                    alt="PDF"
                                >

                                <div>
                                    <h3>File PDF</h3>

                                    <a
                                        href="{{ asset('storage/' . $file) }}"
                                        target="_blank"
                                    >
                                        Buka PDF
                                    </a>
                                </div>
                            </div>
                        @endif

                    @endforeach

                    {{-- Gallery --}}
                    @if (count($images) > 1)
                        <div class="gallery-wrapper">

                            @foreach (array_slice($images, 1) as $img)
                                <div class="gallery-item">
                                    <img
                                        src="{{ asset('storage/' . $img) }}"
                                        alt="Gallery Artikel"
                                        onclick="openModal(this.src)"
                                    >
                                </div>
                            @endforeach

                        </div>
                    @endif

                    {{-- Text --}}
                    <div class="detail-text">
                        {!! nl2br(e($article->content)) !!}
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- Image Modal --}}
    <div
        id="imageModal"
        class="image-modal"
    >
        <span
            class="close-modal"
            onclick="closeModal()"
        >
            &times;
        </span>

        <img
            id="modalImage"
            class="modal-content"
            alt="Preview"
        >
    </div>

    {{-- JS --}}
    <script src="{{ asset('js/detail_artikel.js') }}"></script>

</body>

</html>
