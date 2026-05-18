<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $pengumuman->judul }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/detail_pengumuman.css') }}">
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar">
        <a href="{{ url()->previous() }}" class="back-btn">
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
                            {{ $pengumuman->kelas?->nama_kelas ?? 'Semua Kelas' }}
                        </span>

                        <span class="detail-date">
                            {{ $pengumuman->created_at->format('d M Y, H:i') }}
                        </span>
                    </div>

                    {{-- Title --}}
                    <h1 class="detail-title">
                        {{ $pengumuman->judul }}
                    </h1>

                    @php
                        $media = $pengumuman->media_list;
                    @endphp

                    {{-- File & Image --}}
                    @foreach($media ?? [] as $file)

                        @php
                            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        @endphp

                        @if(in_array($ext, ['jpg', 'jpeg', 'png', 'webp']))

                            <div class="detail-image">
                                <img
                                    src="{{ asset('storage/' . $file) }}"
                                    alt="gambar"
                                    data-image="{{ asset('storage/' . $file) }}"
                                >
                            </div>

                        @elseif($ext === 'pdf')

                            <div class="file-card">
                                <img src="{{ asset('img/pdf-icon.png') }}" class="file-icon" alt="PDF">

                                <div>
                                    <h3>File PDF</h3>

                                    <a href="{{ asset('storage/' . $file) }}" target="_blank">
                                        Buka PDF
                                    </a>
                                </div>
                            </div>

                        @endif

                    @endforeach

                    {{-- Gallery --}}
@if(count($media ?? []) > 0)

                        <div class="gallery-wrapper">
                            @foreach(array_slice($media, 1) as $img)

                                <div class="gallery-item">
                                    <img
                                        src="{{ asset('storage/' . $img) }}"
                                        alt="gallery"
                                    >
                                </div>

                            @endforeach
                        </div>

                    @endif

                    {{-- Text --}}
                    <div class="detail-text">
                        {!! nl2br(e($pengumuman->isi)) !!}
                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- Modal --}}
    <div id="imageModal" class="image-modal">
        <span class="close-modal">&times;</span>
        <img id="modalImage" class="modal-content" alt="Preview">
    </div>

    {{-- JS dipisah --}}
    <script src="{{ asset('js/detail_pengumuman.js') }}"></script>

</body>
</html>
