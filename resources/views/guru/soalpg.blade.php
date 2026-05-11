@extends('layouts.auth')

@section('content')

<div style="max-width:900px;margin:auto;padding:40px">

<h2 style="margin-bottom:30px">Buat Soal Pilihan Ganda</h2>

@if(session('success'))
<div style="background:#d4edda;padding:15px;border-radius:8px;margin-bottom:20px">
{{ session('success') }}
</div>
@endif

{{-- =========================
FORM TAMBAH SOAL (SUDAH FIX)
========================= --}}

<form action="{{ route('simpan.pg') }}" method="POST">
@csrf

<input type="hidden" name="tugas_id" value="{{ request('tugas_id') }}">

<div style="background:white;padding:25px;border-radius:12px;box-shadow:0 3px 10px rgba(0,0,0,0.1)">

<label>Pertanyaan</label>
<textarea name="pertanyaan" class="form-control"></textarea>

<br>

<label>Score Soal</label>
<input type="number" name="score" value="10" class="form-control">

<br>

<label>Opsi A</label>
<input type="text" name="opsi_a" class="form-control">

<label>Opsi B</label>
<input type="text" name="opsi_b" class="form-control">

<label>Opsi C</label>
<input type="text" name="opsi_c" class="form-control">

<label>Opsi D</label>
<input type="text" name="opsi_d" class="form-control">

<br>

<label>Jawaban Benar</label>
<select name="jawaban_benar" class="form-control">
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
</select>

<br>

<button style="background:#4CAF50;color:white;padding:10px 20px;border:none;border-radius:8px">
Simpan Soal
</button>

</div>

</form>

{{-- =========================
PUBLISH (SUDAH DIKUNCI PER TUGAS)
========================= --}}

<form action="{{ route('publish.pg') }}" method="POST" style="margin-top:10px">
@csrf

<input type="hidden" name="tugas_id" value="{{ request('tugas_id') }}">

<button style="background:#2196F3;color:white;padding:10px 20px;border:none;border-radius:8px">
Publish ke Siswa
</button>

</form>

{{-- =========================
DAFTAR SOAL
========================= --}}

<h3 style="margin-top:40px">Daftar Soal</h3>

<table border="1" width="100%" cellpadding="10">

<tr>
<th>No</th>
<th>Pertanyaan</th>
<th>Score</th>
<th>Aksi</th>
</tr>

@foreach($soal as $s)

<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $s->pertanyaan }}</td>
<td>{{ $s->score }}</td>

<td>

<form action="{{ route('hapus.pg',$s->id) }}" method="POST">
@csrf
@method('DELETE')

<button style="background:red;color:white;border:none;padding:6px 10px;border-radius:6px">
Hapus
</button>

</form>

</td>

</tr>

@endforeach

</table>

</div>

@endsection
