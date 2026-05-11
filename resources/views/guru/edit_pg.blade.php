<!DOCTYPE html>
<html>
<head>
<title>Edit Soal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

body{
margin:0;
font-family:Poppins,sans-serif;
background:#f5f7fa;
}

.content{
padding:60px;
display:flex;
justify-content:center;
}

.card{
background:white;
padding:30px;
border-radius:16px;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
width:100%;
max-width:700px;
}

input,textarea,select{
width:100%;
padding:12px;
margin-bottom:15px;
border-radius:8px;
border:1px solid #ddd;
}

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

</style>
</head>

<body>

<div class="content">
<div class="card">

<h3>Edit Soal</h3>

<form action="{{ route('guru.update.pg',$soal->id) }}" method="POST">
@csrf

<input type="hidden" name="kelas_id" value="{{ request('kelas_id') }}">
<input type="hidden" name="mapel" value="{{ request('mapel') }}">
<input type="hidden" name="judul" value="{{ request('judul') }}">

<label>Judul</label>
<input type="text" name="judul" value="{{ $soal->judul }}" required>

<label>Pertanyaan</label>
<textarea name="pertanyaan" rows="3">{{ $soal->pertanyaan }}</textarea>

<label>Opsi A</label>
<input type="text" name="opsi_a" value="{{ $soal->opsi_a }}">

<label>Opsi B</label>
<input type="text" name="opsi_b" value="{{ $soal->opsi_b }}">

<label>Opsi C</label>
<input type="text" name="opsi_c" value="{{ $soal->opsi_c }}">

<label>Opsi D</label>
<input type="text" name="opsi_d" value="{{ $soal->opsi_d }}">

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


</select>

<label>Nilai</label>
<input type="number" name="nilai" value="{{ $soal->nilai }}">

<button class="btn btn-success">
Update Soal
</button>

</form>

</div>
</div>

</body>
</html>
