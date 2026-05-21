<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Upload Artikel
    </title>

    {{-- CSS --}}
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

            <img
                src="/img/back.png"
                alt="Back"
            >

        </a>

        <div class="topbar-title">
            Upload Artikel
        </div>

    </div>

    {{-- Content --}}
    <div class="content">

        <div class="card">

            {{-- Header --}}
            <div class="header-flex">

                <h3>
                    Upload Artikel
                </h3>

                <a
                    href="{{ route('kepalasekolah.artikel.index') }}"
                    class="link-btn"
                >
                    Daftar Artikel
                </a>

            </div>

            {{-- Success Alert --}}
            @if(session('success'))

                <div class="alert-success">

                    {{ session('success') }}

                </div>

            @endif

            {{-- Form --}}
            <form
                method="POST"
                action="{{ route('kepalasekolah.artikel.store') }}"
                enctype="multipart/form-data"
            >

                @csrf

                {{-- Judul --}}
                <label for="title">
                    Judul
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    placeholder="Masukkan judul artikel"
                    required
                >

                {{-- Kategori --}}
                <label for="category">
                    Kategori
                </label>

                <select
                    id="category"
                    name="category"
                    required
                >

                    <option value="">
                        -- Pilih Kategori --
                    </option>

                    <option value="Berita">
                        Berita
                    </option>

                    <option value="Kegiatan">
                        Kegiatan
                    </option>

                    <option value="Pengumuman">
                        Pengumuman
                    </option>

                    <option value="Prestasi">
                        Prestasi
                    </option>

                    <option value="Agenda">
                        Agenda Sekolah
                    </option>

                </select>

                {{-- Sub Kategori --}}
                <label for="sub_category">
                    Sub Kategori
                </label>

                <input
                    type="text"
                    id="sub_category"
                    name="sub_category"
                    placeholder="Contoh: Upacara, Lomba, Study Tour"
                >

                {{-- Isi Artikel --}}
                <label for="content">
                    Isi Artikel
                </label>

                <textarea
                    id="content"
                    name="content"
                    rows="5"
                    placeholder="Tulis isi artikel..."
                    required
                ></textarea>

                {{-- Upload File --}}
                <label for="files">
                    Upload Foto / File
                </label>

                <input
                    type="file"
                    id="files"
                    name="images[]"
                    multiple
                    accept=".jpg,.jpeg,.png,.webp,.pdf,.doc,.docx"
                >

                {{-- Preview File --}}
                <div id="file-list"></div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="btn"
                >
                    Upload Artikel
                </button>

            </form>

        </div>

    </div>

    {{-- JS --}}
    <script src="{{ asset('js/upload_artikel.js') }}"></script>

</body>

</html>
