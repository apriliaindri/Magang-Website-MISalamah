<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Artikel</title>

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('css/edit_pengumuman.css') }}"
    >

</head>

<body>

    <div class="content">

        <div class="card">

            <h3>Edit Artikel</h3>

            @if(session('success'))

                <div class="alert-success">

                    {{ session('success') }}

                </div>

            @endif

            <form
                action="{{ route('artikel.update', $article->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                {{-- Judul --}}
                <label>Judul Artikel</label>

                <input
                    type="text"
                    name="title"
                    value="{{ $article->title }}"
                    required
                >

                {{-- Kategori --}}
                <label>Kategori</label>

                <input
                    type="text"
                    name="category"
                    value="{{ $article->category }}"
                    required
                >

                {{-- Sub Kategori --}}
                <label>Sub Kategori</label>

                <input
                    type="text"
                    name="sub_category"
                    value="{{ $article->sub_category }}"
                >

                {{-- Isi --}}
                <label>Isi Artikel</label>

                <textarea
                    name="content"
                    rows="8"
                >{{ $article->content }}</textarea>

                {{-- Upload --}}
                <label>Upload Gambar / File Baru (Opsional)</label>

                <input
                    type="file"
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

                        <strong>File saat ini:</strong>

                        <ul style="margin-top:10px; padding-left:18px;">

                            @foreach($images as $img)

                                <li>

                                    {{ basename($img) }}

                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                {{-- Button --}}
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
