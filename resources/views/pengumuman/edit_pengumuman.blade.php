<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Pengumuman</title>

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
{{-- Topbar --}}
<div class="topbar">

    <div class="topbar-left">

        <a
            href="{{ route('pengumuman.index') }}"
            class="back-btn"
        >

            <img
                src="/img/back.png"
                alt="Back"
            >

        </a>

        <div class="topbar-title">

            Edit Pengumuman

        </div>

    </div>

</div>

<div class="content with-navbar">

        <div class="card">

            <h3>Edit Pengumuman</h3>

            @if(session('success'))

                <div class="alert-success">

                    {{ session('success') }}

                </div>

            @endif

            <form
                action="{{ route('pengumuman.update', $pengumuman->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                <label>Judul</label>

                <input
                    type="text"
                    name="judul"
                    value="{{ $pengumuman->judul }}"
                    required
                >

                <label>Isi Pengumuman</label>

                <textarea
                    name="isi"
                    rows="4"
                >{{ $pengumuman->isi }}</textarea>

                <label>Pilih Kelas</label>

                <select name="kelas_id">

                    <option value="">
                        Semua Kelas
                    </option>

                    @foreach($kelas as $k)

                        <option
                            value="{{ $k->id }}"
                            {{ $pengumuman->kelas_id == $k->id ? 'selected' : '' }}
                        >

                            {{ $k->nama_kelas }}

                        </option>

                    @endforeach

                </select>

@php

    $files = json_decode($pengumuman->gambar, true) ?? [];

@endphp

<label>File Saat Ini</label>

@if(count($files) > 0)

    <div class="file-list">

    @foreach($files as $index => $file)

        @php

            $ext = strtolower(
                pathinfo($file, PATHINFO_EXTENSION)
            );

        @endphp

<div
    class="file-item"
    id="file-{{ $index }}"
>

            <div class="preview-card">

                {{-- IMAGE --}}
                @if(in_array($ext, ['jpg','jpeg','png','webp']))

                    <img
                        src="{{ asset('storage/' . $file) }}"
                        class="preview-image"
                        onclick="openModal(this.src)"
                    >

                    <div class="preview-name">

                        {{ basename($file) }}

                    </div>

                {{-- PDF --}}
                @elseif($ext == 'pdf')

                    <a
                        href="{{ asset('storage/' . $file) }}"
                        target="_blank"
                        class="pdf-preview"
                    >

                        <img
                            src="{{ asset('img/pdf-icon.png') }}"
                            class="pdf-icon"
                        >

                        <span>

                            {{ basename($file) }}

                        </span>

                    </a>

                {{-- FILE --}}
                @else

                    <div class="file-card">

                        <div class="preview-name">

                            📎 {{ basename($file) }}

                        </div>

                    </div>

                @endif

                {{-- BUTTON HAPUS --}}
                <button
                    type="button"
                    class="remove-file"
                    onclick="removeExistingFile(
                        '{{ $index }}',
                        '{{ $file }}'
                    )"
                >
                    ×
                </button>

            </div>

        </div>

    @endforeach

</div>

{{-- input hidden penampung file yg dihapus --}}
<div id="deleted-files"></div>


@endif

<label>Tambah File Baru</label>

<input
    type="file"
    name="gambar[]"
    multiple
>

                <button
                    type="submit"
                    class="btn btn-success"
                >

                    Update Pengumuman

                </button>

            </form>

        </div>

    </div>

    <script>

    function removeExistingFile(index, file){

        // hapus preview dari tampilan
        document
            .getElementById(`file-${index}`)
            .remove();

        // buat input hidden
        const input = document.createElement('input');

        input.type = 'hidden';

        input.name = 'hapus_file[]';

        input.value = file;

        document
            .getElementById('deleted-files')
            .appendChild(input);

    }

    function openModal(src){

        document.getElementById('imageModal').style.display = 'flex';

        document.getElementById('modalImage').src = src;

    }

    function closeModal(){

        document.getElementById('imageModal').style.display = 'none';

    }

</script>

<div id="imageModal" class="image-modal">

    <span
        class="close-modal"
        onclick="closeModal()"
    >
        &times;
    </span>

    <img
        id="modalImage"
        class="modal-content"
    >

</div>

</body>
</html>
