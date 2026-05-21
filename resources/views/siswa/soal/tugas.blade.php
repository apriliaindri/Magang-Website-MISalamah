<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CBT Pilihan Ganda</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/cbt.css') }}">
</head>

<body>

@if(!$tugas)
    <p style="padding:20px;">Tugas tidak ditemukan</p>
@else

{{-- HEADER --}}
<div class="header">
    <h2>{{ $tugas->judul }}</h2>

    <p>
        Kelas : {{ $kelas->nama_kelas }} <br>
        Mapel : {{ $tugas->mapel }}
    </p>

    <p style="color:gray;font-size:13px;">
        * Beberapa soal dapat memiliki lebih dari satu jawaban benar
    </p>
</div>

<form method="POST" action="{{ route('siswa.soal.submit') }}">
    @csrf

    <input type="hidden" name="tugas_id" value="{{ $tugas->id }}">
    <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
    <input type="hidden" name="mapel" value="{{ $tugas->mapel }}">

    <div class="container">

        {{-- SOAL AREA --}}
        <div class="soal-area">

            @forelse($soal as $index => $s)

                @php
                    $kunci = json_decode($s->jawaban_benar, true);
                    $kunci = is_array($kunci) ? $kunci : [$s->jawaban_benar];

                    $isMultiple = count($kunci) > 1;

                    $jawabanDraft = isset($draft[$s->id])
                        ? json_decode($draft[$s->id], true)
                        : null;
                @endphp

                <div class="soal-item {{ $loop->first ? 'active' : '' }}" id="soal{{ $index }}">

                    <h3>Soal {{ $index + 1 }}</h3>

                    <p>{{ $s->pertanyaan }}</p>

                    <div class="opsi">

                        @foreach(['A','B','C','D'] as $opt)

                            <label>

                                @if($isMultiple)

                                    <input
                                        type="checkbox"
                                        name="jawaban[{{ $s->id }}][]"
                                        value="{{ $opt }}"
                                        {{ is_array($jawabanDraft) && in_array($opt, $jawabanDraft) ? 'checked' : '' }}
                                    >

                                @else

                                    <input
                                        type="radio"
                                        name="jawaban[{{ $s->id }}]"
                                        value="{{ $opt }}"
                                        {{ $jawabanDraft == $opt ? 'checked' : '' }}
                                    >

                                @endif

                                {{ $opt }}. {{ $s->{'opsi_' . strtolower($opt)} }}

                            </label>

                        @endforeach

                    </div>

                    <div class="footer">

                        @if(!$loop->first)
                            <button type="button" class="btn-prev" data-index="{{ $index }}">
                                Sebelumnya
                            </button>
                        @endif

                        @if(!$loop->last)
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
                        class="nomor {{ $loop->first ? 'active' : '' }}"
                        id="nav{{ $index }}"
                        data-index="{{ $index }}"
                    >
                        {{ $index + 1 }}
                    </div>
                @endforeach

            </div>

            <button type="button" class="btn-selesai">
                Selesai Ujian
            </button>

        </div>

    </div>
</form>

@endif

{{-- JS external --}}
<script src="{{ asset('js/cbt.js') }}"></script>

</body>
</html>
