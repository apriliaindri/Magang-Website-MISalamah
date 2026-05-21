@extends('layouts.auth')

@section('content')

    <div class="container-pg">

        {{-- Title --}}
        <h2 class="page-title">
            Buat Soal Pilihan Ganda
        </h2>

        {{-- Success Message --}}
        @if(session('success'))

            <div class="alert-success">
                {{ session('success') }}
            </div>

        @endif

        {{-- Form Tambah Soal --}}
        <form
            action="{{ route('simpan.pg') }}"
            method="POST"
        >

            @csrf

            <input
                type="hidden"
                name="tugas_id"
                value="{{ request('tugas_id') }}"
            >

            <div class="form-card">

                {{-- Pertanyaan --}}
                <label>
                    Pertanyaan
                </label>

                <textarea
                    name="pertanyaan"
                    class="form-control"
                ></textarea>

                <br>

                {{-- Score --}}
                <label>
                    Score Soal
                </label>

                <input
                    type="number"
                    name="score"
                    value="10"
                    class="form-control"
                >

                <br>

                {{-- Opsi --}}
                <label>
                    Opsi A
                </label>

                <input
                    type="text"
                    name="opsi_a"
                    class="form-control"
                >

                <label>
                    Opsi B
                </label>

                <input
                    type="text"
                    name="opsi_b"
                    class="form-control"
                >

                <label>
                    Opsi C
                </label>

                <input
                    type="text"
                    name="opsi_c"
                    class="form-control"
                >

                <label>
                    Opsi D
                </label>

                <input
                    type="text"
                    name="opsi_d"
                    class="form-control"
                >

                <br>

                {{-- Jawaban Benar --}}
                <label>
                    Jawaban Benar
                </label>

                <select
                    name="jawaban_benar"
                    class="form-control"
                >

                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>

                </select>

                <br>

                {{-- Submit --}}
                <button class="btn btn-success">
                    Simpan Soal
                </button>

            </div>

        </form>

        {{-- Publish --}}
        <form
            action="{{ route('publish.pg') }}"
            method="POST"
            class="publish-form"
        >

            @csrf

            <input
                type="hidden"
                name="tugas_id"
                value="{{ request('tugas_id') }}"
            >

            <button class="btn btn-primary">
                Publish ke Siswa
            </button>

        </form>

        {{-- Daftar Soal --}}
        <h3 class="section-title">
            Daftar Soal
        </h3>

        <table class="table-soal">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Pertanyaan</th>
                    <th>Score</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($soal as $s)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $s->pertanyaan }}
                        </td>

                        <td>
                            {{ $s->score }}
                        </td>

                        <td>

                            <form
                                action="{{ route('hapus.pg', $s->id) }}"
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

    </div>

    {{-- JS --}}
    <script src="{{ asset('js/buat_pg.js') }}"></script>

@endsection
