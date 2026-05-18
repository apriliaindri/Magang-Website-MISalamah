<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Pengumuman</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/tambah_pengumuman.css') }}">

    @stack('styles')

</head>

<body>

    {{-- TOPBAR --}}
    <div class="topbar">

        <div class="topbar-left">

            <a href="{{ route('pengumuman.index') }}" class="back-btn">
                <img src="/img/back.png" alt="Back">
            </a>

            <div class="topbar-title">
                Tambah Pengumuman
            </div>

        </div>

    </div>

    {{-- CONTENT --}}
    <div class="page-wrapper">

        <div class="content">

            <div class="card">

                <div class="header-flex">

                    <h3>Tambah Pengumuman</h3>

                    <a href="{{ url('/pengumuman') }}" class="link-btn">
                        Daftar Pengumuman
                    </a>

                </div>

                @if(session('success'))
                    <div class="alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST"
                      action="{{ route('pengumuman.store') }}"
                      enctype="multipart/form-data"
                      id="uploadForm">

                    @csrf

                    <label>Judul</label>
                    <input type="text" name="judul" required>

                    <label>Isi Pengumuman</label>
                    <textarea name="isi" rows="4" required></textarea>

                    <label>Pilih Kelas</label>
                    <select name="kelas_id">
                        <option value="">Semua Kelas</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}">
                                {{ $k->nama_kelas }}
                            </option>
                        @endforeach
                    </select>

                    <label>Upload File / Gambar</label>

                    <input type="file"
                           id="files"
                           name="files[]"
                           multiple
                           accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">

                    <div id="file-list"></div>

                    <button type="submit" class="btn">
                        Upload Pengumuman
                    </button>

                </form>

            </div>

        </div>

    </div>

    {{-- MODAL IMAGE --}}
    <div id="imageModal" class="image-modal">
        <span class="close-modal" onclick="closeModal()">&times;</span>
        <img id="modalImage" class="modal-content">
    </div>

    {{-- JS DIPISAH --}}
    <script src="{{ asset('js/pengumuman_upload.js') }}"></script>

</body>
</html>
