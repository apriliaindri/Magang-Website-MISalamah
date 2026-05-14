<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Pengumuman</title>

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('css/tambah_pengumuman.css') }}"
    >

</head>

<body>

    {{-- Topbar --}}
    <div class="topbar">

        <a
            href="#"
            onclick="goBack()"
            class="back-btn"
        >
            <img src="/img/back.png" alt="Back">
        </a>

        <div class="topbar-title">
            Tambah Pengumuman
        </div>

    </div>

    {{-- Content --}}
    <div class="page-wrapper">

        <div class="content">

            <div class="card">

                <div class="header-flex">

                    <h3>Tambah Pengumuman</h3>

                    <a
                        href="{{ url('/pengumuman') }}"
                        class="link-btn"
                    >
                        Daftar Pengumuman
                    </a>

                </div>

                @if(session('success'))

                    <div class="alert-success">

                        {{ session('success') }}

                    </div>

                @endif

                <form
                    method="POST"
                    action="{{ route('pengumuman.store') }}"
                    enctype="multipart/form-data"
                >

                    @csrf

                    <label>Judul</label>

                    <input
                        type="text"
                        name="judul"
                        placeholder="Masukkan judul"
                        required
                    >

                    <label>Isi Pengumuman</label>

                    <textarea
                        name="isi"
                        rows="4"
                        placeholder="Tulis pengumuman..."
                        required
                    ></textarea>

                    <label>Pilih Kelas</label>

                    <select name="kelas_id">

                        <option value="">
                            Umum (Semua Kelas)
                        </option>

                        @foreach($kelas as $k)

                            <option value="{{ $k->id }}">

                                {{ $k->nama_kelas }}

                            </option>

                        @endforeach

                    </select>

                    <label>Upload File / Gambar</label>

                    <input
                        type="file"
                        id="files"
                        name="files[]"
                        multiple
                        accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                    >

                    {{-- File Preview --}}
                    <div id="file-list"></div>

                    <button
                        type="submit"
                        class="btn"
                    >
                        Upload Pengumuman
                    </button>

                </form>

            </div>

        </div>

    </div>

    <script>

        function goBack() {

            if (
                document.referrer === window.location.href ||
                document.referrer === ""
            ) {

                window.location.href = "{{ route('kepalasekolah.dashboard') }}";

            } else {

                window.history.back();

            }

        }

        const inputFiles = document.getElementById('files');

        const fileList = document.getElementById('file-list');

        let selectedFiles = [];

        inputFiles.addEventListener('change', function (e) {

            Array.from(e.target.files).forEach(file => {

                selectedFiles.push(file);

            });

            updateInputFiles();

            renderFiles();

        });

        function renderFiles() {

            fileList.innerHTML = '';

            selectedFiles.forEach((file, index) => {

                const div = document.createElement('div');

                div.classList.add('file-item');

                div.innerHTML = `
                    <div class="file-left">

                        <span>📎</span>

                        <span>${file.name}</span>

                    </div>

                    <button
                        type="button"
                        class="remove-file"
                        onclick="removeFile(${index})"
                    >
                        ×
                    </button>
                `;

                fileList.appendChild(div);

            });

        }

        function updateInputFiles() {

            const dataTransfer = new DataTransfer();

            selectedFiles.forEach(file => {

                dataTransfer.items.add(file);

            });

            inputFiles.files = dataTransfer.files;

        }

        function removeFile(index) {

            selectedFiles.splice(index, 1);

            updateInputFiles();

            renderFiles();

        }

    </script>

</body>
</html>
