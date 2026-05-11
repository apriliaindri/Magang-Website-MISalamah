<!DOCTYPE html>
<html>
<head>
<title>Buat Soal Pilihan Ganda</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

body{
margin:0;
font-family:Poppins,sans-serif;
background:#f5f7fa;
}

/* TOPBAR */
.topbar{
height:60px;
background:#4CAF50;
display:flex;
align-items:center;
padding:0 20px;
color:white;
position:fixed;
width:100%;
top:0;
}

.topbar-title{
font-weight:600;
margin-left:15px;
}

/* CONTENT */
.content{
padding-top:100px;
display:flex;
justify-content:center;
}

/* CARD */
.card{
background:white;
padding:30px;
border-radius:16px;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
width:100%;
max-width:700px;
}

/* INPUT */
select,input,textarea{
width:100%;
padding:12px;
margin-bottom:15px;
border-radius:8px;
border:1px solid #ddd;
font-size:14px;
box-sizing:border-box;
}

select:focus,input:focus,textarea:focus{
border-color:#4CAF50;
outline:none;
box-shadow:0 0 0 3px rgba(76,175,80,0.15);
}

/* BUTTON */
.btn{
padding:12px;
border:none;
border-radius:8px;
font-weight:600;
cursor:pointer;
}

.btn-success{
background:#4CAF50;
color:white;
}

.btn-primary{
background:#2196F3;
color:white;
}

.btn-danger{
background:#f44336;
color:white;
}

.btn:hover{
opacity:0.9;
}

/* TABLE */
table{
width:100%;
border-collapse:collapse;
margin-top:30px;
}

th,td{
padding:10px;
border:1px solid #ddd;
text-align:center;
}

th{
background:#f1f1f1;
}

.back-btn{
margin-right:5px;
display:flex;
align-items:center;
}

.back-btn img{
width:20px;
height:20px;
cursor:pointer;
margin-left:20px;
filter: invert(1);
}

.info-box{
background:#f5f5f5;
padding:15px;
border-radius:10px;
margin-bottom:20px;
}

</style>
</head>

<body>

<div class="topbar">

<a href="#" onclick="goBack()" class="back-btn">
<img src="/img/back.png" alt="Back">
</a>

<div class="topbar-title">
Manajemen Soal
</div>

</div>


<div class="content">
<div class="card">


{{-- =========================
PILIH KELAS + MAPEL + JUDUL (SEKALI SAJA)
========================= --}}

@if(!request('kelas_id') || !request('mapel') || !request('judul'))

<h3>Pilih Kelas dan Mata Pelajaran</h3>

<form method="GET">

<label>Pilih Kelas</label>
<select name="kelas_id" required>
<option value="">Pilih kelas</option>
@foreach($kelas as $k)
<option value="{{ $k->id }}">
{{ $k->nama_kelas }}
</option>
@endforeach
</select>

<label>Pilih Mata Pelajaran</label>
<select name="mapel" required>
<option value="">Pilih Mata Pelajaran</option>
<option value="IPA">IPA</option>
<option value="Matematika">Matematika</option>
<option value="Bahasa Indonesia">Bahasa Indonesia</option>
<option value="Bahasa Inggris">Bahasa Inggris</option>
</select>

<label>Judul Tugas</label>
<input type="text" name="judul" required>

<label>Instruksi Soal</label>
<textarea name="instruksi" rows="2"
placeholder="Contoh: Pilih jawaban yang paling benar">{{ request('instruksi') }}</textarea>

<button class="btn btn-primary">
Mulai Buat Soal
</button>

</form>

{{-- =========================
HALAMAN TAMBAH SOAL
========================= --}}
@else


<h3>Buat Soal</h3>


<div class="info-box">
<b>Judul:</b> {{ request('judul') }} <br>
<b>Mapel:</b> {{ request('mapel') }} <br>
<b>Instruksi:</b> {{ request('instruksi') }}
</div>


@if(session('success_soal'))
<div style="color:green;margin-bottom:10px;">
{{ session('success_soal') }}
</div>
@endif


<form action="{{ route('guru.simpan.pg') }}" method="POST">

@csrf

<input type="hidden" name="instruksi"
value="{{ request('instruksi') }}">

<input type="hidden" name="kelas_id"
value="{{ request('kelas_id') }}">

<input type="hidden" name="mapel"
value="{{ request('mapel') }}">

<input type="hidden" name="judul"
value="{{ request('judul') }}">

<input type="hidden" name="tugas_id"
value="{{ request('tugas_id') }}">

<input type="hidden" name="mapel"
value="{{ request('mapel') }}">

<label>Pertanyaan</label>
<textarea name="pertanyaan" rows="3" required></textarea>


<label>Opsi A</label>
<input type="text" name="opsi_a" required>

<label>Opsi B</label>
<input type="text" name="opsi_b" required>

<label>Opsi C</label>
<input type="text" name="opsi_c" required>

<label>Opsi D</label>
<input type="text" name="opsi_d" required>


<label>Jawaban Benar</label>

<div style="margin-bottom:15px;">

<label style="display:block;margin-bottom:8px;">
<input type="checkbox"
name="jawaban_benar[]"
value="A"
style="width:auto;margin-right:10px;">
A
</label>

<label style="display:block;margin-bottom:8px;">
<input type="checkbox"
name="jawaban_benar[]"
value="B"
style="width:auto;margin-right:10px;">
B
</label>

<label style="display:block;margin-bottom:8px;">
<input type="checkbox"
name="jawaban_benar[]"
value="C"
style="width:auto;margin-right:10px;">
C
</label>

<label style="display:block;margin-bottom:8px;">
<input type="checkbox"
name="jawaban_benar[]"
value="D"
style="width:auto;margin-right:10px;">
D
</label>

</div>


<label>Nilai Soal</label>
<input type="number" name="nilai" required>


<button type="submit" class="btn btn-success">
Tambah Soal
</button>

</form>


<hr>


<h3>Daftar Soal</h3>

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

<td style="text-align:left">

A. {{ $s->opsi_a }} <br>
B. {{ $s->opsi_b }} <br>
C. {{ $s->opsi_c }} <br>
D. {{ $s->opsi_d }}

</td>

<td>
<strong>{{ $s->jawaban_benar }}</strong>
</td>

<td>{{ $s->nilai }}</td>

<td>

<a href="{{ route('guru.edit.pg',$s->id) }}?kelas_id={{ request('kelas_id') }}&mapel={{ request('mapel') }}&judul={{ request('judul') }}"
class="btn btn-primary">
Edit
</a>

<br><br>

<form action="{{ route('guru.hapus.pg',$s->id) }}"
method="POST">

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


<form action="{{ route('guru.simpan.tugas') }}" method="POST">

@csrf

<input type="hidden" name="instruksi"
value="{{ request('instruksi') }}">

<input type="hidden" name="kelas_id"
value="{{ request('kelas_id') }}">

<input type="hidden" name="mapel"
value="{{ request('mapel') }}">

<input type="hidden" name="judul"
value="{{ request('judul') }}">


<button class="btn btn-success" style="width:100%;">
Simpan Tugas
</button>

</form>

@endif
</div>
</div>

<div id="modalSuccess" style="
display:none;
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.5);
justify-content:center;
align-items:center;
">

<div style="
background:white;
padding:30px;
border-radius:12px;
text-align:center;
width:300px;
">

<h3>CBT berhasil dibuat</h3>

<button onclick="closeModal()" class="btn btn-success">
OK
</button>

</div>
</div>


<script>
function goBack(){
    if(window.history.length > 1){
        window.history.back();
    }else{
        window.location.href = "{{ route('guru.dashboard') }}";
    }
}

function closeModal(){
    document.getElementById('modalSuccess').style.display = 'none';
    window.location.href = "{{ route('guru.dashboard') }}";
}

@if(session('success_tugas'))
window.onload = function(){
    document.getElementById('modalSuccess').style.display = 'flex';
};
@endif

</script>

</body>
</html>
