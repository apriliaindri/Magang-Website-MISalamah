<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Buat Soal Pilihan Ganda
    </title>

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/tambah_pg.css') }}"
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
            Manajemen Soal
        </div>

    </div>

    {{-- Content --}}
    <div class="content">

        <div class="card">

            {{-- FORM PILIH KELAS --}}
            @if(!request('kelas_id') || !request('mapel') || !request('judul'))

                <h3>
                    Pilih Kelas dan Mata Pelajaran
                </h3>

                <form method="GET">

                    {{-- Kelas --}}
                    <label>
                        Pilih Kelas
                    </label>

                    <select
                        name="kelas_id"
                        required
                    >

                        <option value="">
                            Pilih kelas
                        </option>

                        @foreach($kelas as $k)

                            <option value="{{ $k->id }}">
                                {{ $k->nama_kelas }}
                            </option>

                        @endforeach

                    </select>

                    {{-- Mapel --}}
                    <label>
                        Pilih Mata Pelajaran
                    </label>

                    <select
                        name="mapel"
                        required
                    >

                        <option value="">
                            Pilih Mata Pelajaran
                        </option>

                        <option value="IPA">IPA</option>
                        <option value="Matematika">Matematika</option>
                        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                        <option value="Bahasa Inggris">Bahasa Inggris</option>

                    </select>

                    {{-- Judul --}}
                    <label>
                        Judul Tugas
                    </label>

                    <input
                        type="text"
                        name="judul"
                        required
                    >

                    {{-- Instruksi --}}
                    <label>
                        Instruksi Soal
                    </label>

                    <textarea
                        name="instruksi"
                        rows="2"
                        placeholder="Contoh: Pilih jawaban yang paling benar"
                    >{{ request('instruksi') }}</textarea>

                    <button class="btn btn-primary">
                        Mulai Buat Soal
                    </button>

                </form>

            @else

                {{-- FORM TAMBAH SOAL --}}
                <h3>
                    Buat Soal
                </h3>

                <div class="info-box">

                    <b>Judul:</b> {{ request('judul') }}
                    <br>

                    <b>Mapel:</b> {{ request('mapel') }}
                    <br>

                    <b>Instruksi:</b> {{ request('instruksi') }}

                </div>

                @if(session('success_soal'))

                    <div class="success-message">
                        {{ session('success_soal') }}
                    </div>

                @endif

                <form
                    action="{{ route('guru.simpan.pg') }}"
                    method="POST"
                >

                    @csrf

                    {{-- Hidden --}}
                    <input type="hidden" name="instruksi" value="{{ request('instruksi') }}">
                    <input type="hidden" name="kelas_id" value="{{ request('kelas_id') }}">
                    <input type="hidden" name="mapel" value="{{ request('mapel') }}">
                    <input type="hidden" name="judul" value="{{ request('judul') }}">
                    <input type="hidden" name="tugas_id" value="{{ request('tugas_id') }}">

                    {{-- Pertanyaan --}}
                    <label>
                        Pertanyaan
                    </label>

                    <textarea
                        name="pertanyaan"
                        rows="3"
                        required
                    ></textarea>

                    {{-- Opsi --}}
                    <label>Opsi A</label>
                    <input type="text" name="opsi_a" required>

                    <label>Opsi B</label>
                    <input type="text" name="opsi_b" required>

                    <label>Opsi C</label>
                    <input type="text" name="opsi_c" required>

                    <label>Opsi D</label>
                    <input type="text" name="opsi_d" required>

                    {{-- Jawaban --}}
                    <label>
                        Jawaban Benar
                    </label>

                    <div class="jawaban-group">

                        @foreach(['A', 'B', 'C', 'D'] as $opsi)

                            <label class="jawaban-item">

                                <input
                                    type="checkbox"
                                    name="jawaban_benar[]"
                                    value="{{ $opsi }}"
                                >

                                {{ $opsi }}

                            </label>

                        @endforeach

                    </div>

                    {{-- Nilai --}}
                    <label>
                        Nilai Soal
                    </label>

                    <input
                        type="number"
                        name="nilai"
                        required
                    >

                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        Tambah Soal
                    </button>

                </form>

                <hr>

                {{-- TABLE --}}
                <h3>
                    Daftar Soal
                </h3>

                <table>

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Opsi Jawaban</th>
                            <th>Kunci</th>
                            <th>Nilai</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($soal as $s)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $s->pertanyaan }}</td>

                                <td class="opsi-column">

                                    A. {{ $s->opsi_a }} <br>
                                    B. {{ $s->opsi_b }} <br>
                                    C. {{ $s->opsi_c }} <br>
                                    D. {{ $s->opsi_d }}

                                </td>

                                <td>
                                    <strong>{{ $s->jawaban_benar }}</strong>
                                </td>

                                <td>
                                    {{ $s->nilai }}
                                </td>

                                <td>

                                    <a
                                        href="{{ route('guru.edit.pg', $s->id) }}?kelas_id={{ request('kelas_id') }}&mapel={{ request('mapel') }}&judul={{ request('judul') }}"
                                        class="btn btn-primary"
                                    >
                                        Edit
                                    </a>

                                    <br><br>

                                    <form
                                        action="{{ route('guru.hapus.pg', $s->id) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger">
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

                <br>

                {{-- SIMPAN TUGAS --}}
                <form
                    action="{{ route('guru.simpan.tugas') }}"
                    method="POST"
                >

                    @csrf

                    <input type="hidden" name="instruksi" value="{{ request('instruksi') }}">
                    <input type="hidden" name="kelas_id" value="{{ request('kelas_id') }}">
                    <input type="hidden" name="mapel" value="{{ request('mapel') }}">
                    <input type="hidden" name="judul" value="{{ request('judul') }}">

                    <button class="btn btn-success btn-full">
                        Simpan Tugas
                    </button>

                </form>

            @endif

        </div>

    </div>

    {{-- Modal --}}
    <div id="modalSuccess" class="modal-success">

        <div class="modal-box">

            <h3>
                CBT berhasil dibuat
            </h3>

            <button
                onclick="closeModal()"
                class="btn btn-success"
            >
                OK
            </button>

        </div>

    </div>

    {{-- JS --}}
    <script>
        window.successTugas = @json(session('success_tugas'));
        window.dashboardUrl = @json(route('guru.dashboard'));
    </script>

    <script src="{{ asset('js/tambah_pg.js') }}"></script>

</body>

</html>
