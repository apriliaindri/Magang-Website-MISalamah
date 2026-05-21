<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Edit Artikel
    </title>

    {{-- Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/edit_pengumuman.css') }}"
    >

</head>

<body>
{{-- Topbar --}}
<div class="topbar">
    <div class="topbar-left">

        <a href="{{ route('pengumuman.index') }}" class="back-btn">
            <img src="/img/back.png" alt="Back">
        </a>

        <div class="topbar-title">
            Edit Pengumuman
        </div>

    </div>
</div>

    <div class="content">

        <div class="card">

            {{-- Title --}}
            <h3>
                Edit Artikel
            </h3>

            {{-- Success Alert --}}
            @if(session('success'))

                <div class="alert-success">

                    {{ session('success') }}

                </div>

            @endif

            {{-- Form --}}
            <form
                action="{{ route('artikel.update', $article->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                {{-- Judul --}}
                <label for="title">
                    Judul Artikel
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ $article->title }}"
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

    <option value="Berita" {{ $article->category == 'Berita' ? 'selected' : '' }}>
        Berita
    </option>

    <option value="Kegiatan" {{ $article->category == 'Kegiatan' ? 'selected' : '' }}>
        Kegiatan
    </option>

    <option value="Pengumuman" {{ $article->category == 'Pengumuman' ? 'selected' : '' }}>
        Pengumuman
    </option>

    <option value="Prestasi" {{ $article->category == 'Prestasi' ? 'selected' : '' }}>
        Prestasi
    </option>

    <option value="Agenda" {{ $article->category == 'Agenda' ? 'selected' : '' }}>
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
                    value="{{ $article->sub_category }}"
                >

                {{-- Isi Artikel --}}
                <label for="content">
                    Isi Artikel
                </label>

                <textarea
                    id="content"
                    name="content"
                    rows="8"
                >{{ $article->content }}</textarea>

                {{-- Upload File --}}
                <label for="images">
                    Upload Gambar / File Baru (Opsional)
                </label>

                <input
                    type="file"
                    id="images"
                    name="images[]"
                    multiple
                >

                {{-- File Lama --}}
                @php

                    $images = is_array($article->image)
                        ? $article->image
                        : json_decode($article->image, true) ?? [];

                @endphp

                @if(count($images) > 0)

                    <div class="file-info">

                        <strong>
                            File saat ini:
                        </strong>

                        <ul class="file-list">

                            @foreach($images as $img)

                                <li>

                                    {{ basename($img) }}

                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                {{-- Submit --}}
                <button
                    type="submit"
                    class="btn btn-success"
                >

                    Update Artikel

                </button>

            </form>

        </div>

    </div>

</body>

</html>
