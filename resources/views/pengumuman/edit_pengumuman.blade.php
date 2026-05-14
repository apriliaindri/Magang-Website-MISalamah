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

    <div class="content">

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
                        Umum (Semua Kelas)
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

                <label>Upload File (Opsional)</label>

                <input
                    type="file"
                    name="file"
                >

                @if($pengumuman->file)

                    <small class="file-info">

                        File saat ini:
                        {{ $pengumuman->file }}

                    </small>

                @endif

                <button
                    type="submit"
                    class="btn btn-success"
                >

                    Update Pengumuman

                </button>

            </form>

        </div>

    </div>

</body>
</html>
