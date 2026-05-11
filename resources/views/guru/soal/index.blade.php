@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Daftar Soal</h2>

    @if($soals->count() > 0)

        @foreach($soals as $soal)
            <div style="margin-bottom: 20px; padding:10px; border:1px solid #ccc;">
                <strong>{{ $loop->iteration }}. {{ $soal->pertanyaan }}</strong>

                <p>A. {{ $soal->pilihan_a }}</p>
                <p>B. {{ $soal->pilihan_b }}</p>
                <p>C. {{ $soal->pilihan_c }}</p>
                <p>D. {{ $soal->pilihan_d }}</p>

                <p><strong>Kunci:</strong> {{ $soal->kunci_jawaban }}</p>
                <p><strong>Score:</strong> {{ $soal->score }}</p>
            </div>
        @endforeach

    @else
        <p>Belum ada soal.</p>
    @endif
</div>

@endsection
