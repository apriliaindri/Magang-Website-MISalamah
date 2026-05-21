<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Soal</title>

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/edit_soal.css') }}"
    >

</head>

<body>

    <div class="content">

        <div class="card">

            <h3>
                Edit Soal
            </h3>

            <form
                action="{{ route('guru.update.pg', $soal->id) }}"
                method="POST"
            >

                @csrf

                {{-- Hidden Input --}}
                <input
                    type="hidden"
                    name="kelas_id"
                    value="{{ request('kelas_id') }}"
                >

                <input
                    type="hidden"
                    name="mapel"
                    value="{{ request('mapel') }}"
                >

                <input
                    type="hidden"
                    name="judul"
                    value="{{ request('judul') }}"
                >

                {{-- Judul --}}
                <label>
                    Judul
                </label>

                <input
                    type="text"
                    name="judul"
                    value="{{ $soal->judul }}"
                    required
                >

                {{-- Pertanyaan --}}
                <label>
                    Pertanyaan
                </label>

                <textarea
                    name="pertanyaan"
                    rows="3"
                >{{ $soal->pertanyaan }}</textarea>

                {{-- Opsi A --}}
                <label>
                    Opsi A
                </label>

                <input
                    type="text"
                    name="opsi_a"
                    value="{{ $soal->opsi_a }}"
                >

                {{-- Opsi B --}}
                <label>
                    Opsi B
                </label>

                <input
                    type="text"
                    name="opsi_b"
                    value="{{ $soal->opsi_b }}"
                >

                {{-- Opsi C --}}
                <label>
                    Opsi C
                </label>

                <input
                    type="text"
                    name="opsi_c"
                    value="{{ $soal->opsi_c }}"
                >

                {{-- Opsi D --}}
                <label>
                    Opsi D
                </label>

                <input
                    type="text"
                    name="opsi_d"
                    value="{{ $soal->opsi_d }}"
                >

                {{-- Jawaban Benar --}}
                <label>
                    Jawaban Benar
                </label>

                <div class="jawaban-group">

                    <label class="jawaban-item">

                        <input
                            type="checkbox"
                            name="jawaban_benar[]"
                            value="A"
                        >

                        A

                    </label>

                    <label class="jawaban-item">

                        <input
                            type="checkbox"
                            name="jawaban_benar[]"
                            value="B"
                        >

                        B

                    </label>

                    <label class="jawaban-item">

                        <input
                            type="checkbox"
                            name="jawaban_benar[]"
                            value="C"
                        >

                        C

                    </label>

                    <label class="jawaban-item">

                        <input
                            type="checkbox"
                            name="jawaban_benar[]"
                            value="D"
                        >

                        D

                    </label>

                </div>

                {{-- Nilai --}}
                <label>
                    Nilai
                </label>

                <input
                    type="number"
                    name="nilai"
                    value="{{ $soal->nilai }}"
                >

                {{-- Submit --}}
                <button class="btn btn-success">
                    Update Soal
                </button>

            </form>

        </div>

    </div>

    {{-- JS --}}
    <script src="{{ asset('js/edit_soal.js') }}"></script>

</body>

</html>
