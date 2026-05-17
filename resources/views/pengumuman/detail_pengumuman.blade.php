<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $pengumuman->judul }}</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
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
                            {{ $pengumuman->kelas ? $pengumuman->kelas->nama_kelas : 'Semua Kelas' }}
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
                        $gambar = is_array($pengumuman->gambar)
                            ? $pengumuman->gambar
                            : json_decode($pengumuman->gambar, true) ?? [];
                    @endphp

                    {{-- File & Image --}}
                    @foreach($gambar as $file)

                        @php
                            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        @endphp

                        @if(in_array($ext, ['jpg', 'jpeg', 'png', 'webp']))

                            <div class="detail-image">

                                <img
                                    src="{{ asset('storage/' . $file) }}"
                                    alt="gambar"
                                    onclick="openModal(this.src)"
                                >

                            </div>

                        @elseif($ext == 'pdf')

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
                    @if(count($gambar) > 1)

                        <div class="gallery-wrapper">

                            @foreach(array_slice($gambar, 1) as $img)

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

    {{-- Image Modal --}}
    <div id="imageModal" class="image-modal">

        <span class="close-modal" onclick="closeModal()">
            &times;
        </span>

        <img id="modalImage" class="modal-content" alt="Preview">

    </div>

    <script>

        function openModal(src) {

            document.getElementById('imageModal').style.display = 'flex';

            document.getElementById('modalImage').src = src;

        }

        function closeModal() {

            document.getElementById('imageModal').style.display = 'none';

        }

        document
            .getElementById('imageModal')
            .addEventListener('click', function (e) {

                if (e.target.id === 'imageModal') {

                    closeModal();

                }

            });

    </script>

</body>
</html>
