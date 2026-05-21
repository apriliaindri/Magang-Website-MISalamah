<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CBT Pilihan Ganda</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/soal.css') }}">
</head>

<body>

{{-- HEADER --}}
<div class="header">
    <h2>{{ $tugas->judul }}</h2>

    <p>
        Kelas : {{ $kelas->nama_kelas }} <br>
        Mapel : {{ $tugas->mapel }}
    </p>

    @if($tugas->instruksi)
        <p class="instruksi">
            * {{ $tugas->instruksi }}
        </p>
    @endif
</div>

<form method="POST" action="{{ route('siswa.soal.submit') }}">
    @csrf

    <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
    <input type="hidden" name="mapel" value="{{ $tugas->mapel }}">
    <input type="hidden" name="tugas_id" value="{{ $tugas->id }}">

    <div class="container">

        {{-- SOAL AREA --}}
        <div class="soal-area">

            @forelse($soal as $index => $s)

                @php
                    $kunci = json_decode($s->jawaban_benar, true);
                    $kunci = is_array($kunci) ? $kunci : [$s->jawaban_benar];

                    $isMultiple = count($kunci) > 1;
                @endphp

                <div
                    class="soal-item"
                    id="soal{{ $index }}"
                    style="{{ $index === 0 ? '' : 'display:none' }}"
                >

                    <h3>Soal {{ $index + 1 }}</h3>
                    <p>{{ $s->pertanyaan }}</p>

                    <div class="opsi">

                        @foreach(['A','B','C','D'] as $opsi)

                            <label>

                                @if($isMultiple)

                                    <input
                                        type="checkbox"
                                        name="jawaban[{{ $s->id }}][]"
                                        value="{{ $opsi }}"
                                        data-soal="{{ $s->id }}"
                                    >

                                @else

                                    <input
                                        type="radio"
                                        name="jawaban[{{ $s->id }}]"
                                        value="{{ $opsi }}"
                                        data-soal="{{ $s->id }}"
                                    >

                                @endif

                                {{ $opsi }}. {{ $s->{'opsi_' . strtolower($opsi)} }}

                            </label>

                        @endforeach

                    </div>

                    <div class="footer">

                        @if($index > 0)
                            <button type="button" class="btn-prev" data-index="{{ $index }}">
                                Sebelumnya
                            </button>
                        @endif

                        @if($index < count($soal) - 1)
                            <button type="button" class="btn-next" data-index="{{ $index }}">
                                Berikutnya
                            </button>
                        @endif

                    </div>

                </div>

            @empty
                <p>Tidak ada soal</p>
            @endforelse

        </div>

        {{-- NAVIGASI --}}
        <div class="nav-area">

            <h4>Navigasi Soal</h4>

            <div class="nomor-grid">

                @foreach($soal as $index => $s)

                    <div
                        class="nomor {{ $index === 0 ? 'active' : '' }}"
                        id="nav{{ $index }}"
                        data-index="{{ $index }}"
                    >
                        {{ $index + 1 }}
                    </div>

                @endforeach

            </div>

            @if(!$sudah)
                <button type="button" class="btn-selesai">
                    Selesai Ujian
                </button>
            @else
                <button type="button" class="btn-selesai" disabled>
                    Sudah Dikerjakan
                </button>
            @endif

        </div>

    </div>
</form>

{{-- JS external --}}
<script src="{{ asset('js/soal.js') }}"></script>

</body>
</html>
