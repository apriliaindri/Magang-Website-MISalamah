@extends('layouts.app')

@section('content')

<div class="card">
    <h3>Tambah Soal - {{ $tugas->judul }}</h3>

    <form method="POST" action="{{ route('guru.soal.store', $tugas->id) }}">
        @csrf

        <textarea name="pertanyaan" placeholder="Pertanyaan" required></textarea>

        <input type="text" name="pilihan_a" placeholder="Pilihan A" required>
        <input type="text" name="pilihan_b" placeholder="Pilihan B" required>
        <input type="text" name="pilihan_c" placeholder="Pilihan C" required>
        <input type="text" name="pilihan_d" placeholder="Pilihan D" required>

        <select name="kunci_jawaban" required>
            <option value="">Pilih Kunci Jawaban</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>

        <input type="number" name="score" placeholder="Score" required>

        <button type="submit">Simpan Soal</button>
    </form>
</div>

@endsection
