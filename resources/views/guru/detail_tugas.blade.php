<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>CBT Pilihan Ganda</title>

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/cbt_pg.css') }}"
    >

</head>

<body>

    {{-- Header --}}
    <div class="header">

        <h2>
            {{ $judul }}
        </h2>

        <p>
            Kelas : {{ $kelas->nama_kelas }}
        </p>

        <p>
            Mapel : {{ $mapel }}
        </p>

    </div>

    {{-- Container --}}
    <div class="container">

        {{-- Soal Area --}}
        <div class="soal-area">

            @if($soal->count() == 0)

                <p>Tidak ada soal</p>

            @else

                @foreach($soal as $index => $s)

                    <div
                        class="soal-item"
                        id="soal{{ $index }}"
                        style="{{ $index == 0 ? '' : 'display:none' }}"
                    >

                        <h3>
                            Soal {{ $index + 1 }}
                        </h3>

                        <p>
                            {{ $s->pertanyaan }}
                        </p>

                        <div class="opsi">

                            @php

                                $kunci = explode(',', $s->jawaban_benar);

                                $isMultiple = count($kunci) > 1;

                            @endphp

                            @if($isMultiple)

                                {{-- Multiple Answer --}}
                                <label>
                                    <input
                                        type="checkbox"
                                        name="jawaban[{{ $s->id }}][]"
                                        value="A"
                                    >
                                    A. {{ $s->opsi_a }}
                                </label>

                                <label>
                                    <input
                                        type="checkbox"
                                        name="jawaban[{{ $s->id }}][]"
                                        value="B"
                                    >
                                    B. {{ $s->opsi_b }}
                                </label>

                                <label>
                                    <input
                                        type="checkbox"
                                        name="jawaban[{{ $s->id }}][]"
                                        value="C"
                                    >
                                    C. {{ $s->opsi_c }}
                                </label>

                                <label>
                                    <input
                                        type="checkbox"
                                        name="jawaban[{{ $s->id }}][]"
                                        value="D"
                                    >
                                    D. {{ $s->opsi_d }}
                                </label>

                            @else

                                {{-- Single Answer --}}
                                <label>
                                    <input
                                        type="radio"
                                        name="jawaban[{{ $s->id }}][]"
                                        value="A"
                                    >
                                    A. {{ $s->opsi_a }}
                                </label>

                                <label>
                                    <input
                                        type="radio"
                                        name="jawaban[{{ $s->id }}][]"
                                        value="B"
                                    >
                                    B. {{ $s->opsi_b }}
                                </label>

                                <label>
                                    <input
                                        type="radio"
                                        name="jawaban[{{ $s->id }}][]"
                                        value="C"
                                    >
                                    C. {{ $s->opsi_c }}
                                </label>

                                <label>
                                    <input
                                        type="radio"
                                        name="jawaban[{{ $s->id }}][]"
                                        value="D"
                                    >
                                    D. {{ $s->opsi_d }}
                                </label>

                            @endif

                        </div>

                        {{-- Footer --}}
                        <div class="footer">

                            @if($index > 0)

                                <button
                                    class="btn-prev"
                                    onclick="prevSoal({{ $index }})"
                                >
                                    Sebelumnya
                                </button>

                            @endif

                            @if($index < count($soal) - 1)

                                <button
                                    class="btn-next"
                                    onclick="nextSoal({{ $index }})"
                                >
                                    Berikutnya
                                </button>

                            @endif

                        </div>

                    </div>

                @endforeach

            @endif

        </div>

        {{-- Navigation --}}
        <div class="nav-area">

            <h4>
                Navigasi Soal
            </h4>

            <div class="nomor-grid">

                @foreach($soal as $index => $s)

                    <div
                        class="nomor {{ $index == 0 ? 'active' : '' }}"
                        onclick="lompatSoal({{ $index }})"
                        id="nav{{ $index }}"
                    >

                        {{ $index + 1 }}

                    </div>

                @endforeach

            </div>

            <button class="btn-selesai">
                Selesai Ujian
            </button>

        </div>

    </div>

    {{-- JS --}}
    <script src="{{ asset('js/cbt_pg.js') }}"></script>

</body>

</html>
