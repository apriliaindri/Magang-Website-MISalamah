<!DOCTYPE html>
<html>
<head>
<title>CBT Pilihan Ganda</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body{
font-family:Poppins,sans-serif;
background:#f4f6f9;
margin:0;
}

.header{
background:white;
padding:20px;
border-bottom:1px solid #ddd;
}

.container{
display:flex;
padding:20px;
gap:20px;
}

.soal-area{
flex:3;
background:white;
padding:20px;
border-radius:10px;
}

.nav-area{
flex:1;
background:white;
padding:20px;
border-radius:10px;
height:fit-content;
}

.nomor-grid{
display:grid;
grid-template-columns:repeat(5,1fr);
gap:10px;
}

.nomor{
padding:10px;
text-align:center;
background:#eee;
border-radius:6px;
cursor:pointer;
}

.nomor.active{
background:#2196F3;
color:white;
}

.opsi label{
display:block;
padding:10px;
border:1px solid #ddd;
border-radius:6px;
margin-bottom:10px;
cursor:pointer;
}

.footer{
margin-top:20px;
display:flex;
justify-content:space-between;
}

button{
padding:10px 20px;
border:none;
border-radius:6px;
cursor:pointer;
}

.soal-item{
display:none;
}

.soal-item.active{
display:block;
}

.btn-next{background:#4CAF50;color:white;}
.btn-prev{background:#999;color:white;}
.btn-selesai{background:#f44336;color:white;width:100%;margin-top:20px;}
</style>
</head>

<body>

@if(!$tugas)
<p style="padding:20px;">Tugas tidak ditemukan</p>
@else

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

<div class="soal-area">

@if($soal->count()==0)

<p>Tidak ada soal</p>

@else

@foreach($soal as $index => $s)

@php
$kunci = json_decode($s->jawaban_benar, true);
if(!is_array($kunci)){
    $kunci = [$s->jawaban_benar];
}
$isMultiple = count($kunci) > 1;

$jawabanDraft = isset($draft[$s->id]) ? json_decode($draft[$s->id], true) : null;
@endphp

<div class="soal-item {{ $index==0 ? 'active' : '' }}"
id="soal{{ $index }}">

<h3>Soal {{ $index+1 }}</h3>

<p>{{ $s->pertanyaan }}</p>


<div class="opsi">

<label>
@if($isMultiple)
<input type="checkbox" name="jawaban[{{ $s->id }}][]" value="A"
{{ is_array($jawabanDraft) && in_array('A',$jawabanDraft) ? 'checked' : '' }}>
@else
<input type="radio" name="jawaban[{{ $s->id }}]" value="A"
{{ $jawabanDraft == 'A' ? 'checked' : '' }}>
@endif
A. {{ $s->opsi_a }}
</label>

<label>
@if($isMultiple)
<input type="checkbox" name="jawaban[{{ $s->id }}][]" value="B"
{{ is_array($jawabanDraft) && in_array('B',$jawabanDraft) ? 'checked' : '' }}>
@else
<input type="radio" name="jawaban[{{ $s->id }}]" value="B"
{{ $jawabanDraft == 'B' ? 'checked' : '' }}>
@endif
B. {{ $s->opsi_b }}
</label>

<label>
@if($isMultiple)
<input type="checkbox" name="jawaban[{{ $s->id }}][]" value="C"
{{ is_array($jawabanDraft) && in_array('C',$jawabanDraft) ? 'checked' : '' }}>
@else
<input type="radio" name="jawaban[{{ $s->id }}]" value="C"
{{ $jawabanDraft == 'C' ? 'checked' : '' }}>
@endif
C. {{ $s->opsi_c }}
</label>

<label>
@if($isMultiple)
<input type="checkbox" name="jawaban[{{ $s->id }}][]" value="D"
{{ is_array($jawabanDraft) && in_array('D',$jawabanDraft) ? 'checked' : '' }}>
@else
<input type="radio" name="jawaban[{{ $s->id }}]" value="D"
{{ $jawabanDraft == 'D' ? 'checked' : '' }}>
@endif
D. {{ $s->opsi_d }}
</label>

</div>

<div class="footer">

@if($index>0)
<button
type="button"
class="btn-prev"
data-index="{{ $index }}">
Sebelumnya
</button>
@endif

@if($index < $soal->count()-1)
<button
type="button"
class="btn-next"
data-index="{{ $index }}">
Berikutnya
</button>
@endif

</div>

</div>

@endforeach

@endif

</div>

<div class="nav-area">

<h4>Navigasi Soal</h4>

<div class="nomor-grid">

@foreach($soal as $index => $s)
<div class="nomor {{ $index==0 ? 'active' : '' }}"
onclick="lompatSoal({{ $index }})"
id="nav{{ $index }}">
{{ $index+1 }}
</div>
@endforeach

</div>

<button type="button" class="btn-selesai" onclick="submitUjian()">
Selesai Ujian
</button>

</div>

</div>

</form>

@endif

<script>

document.addEventListener("DOMContentLoaded", function(){

var nextButtons = document.querySelectorAll(".btn-next");

nextButtons.forEach(function(btn){

btn.addEventListener("click", function(){

var i = parseInt(this.dataset.index);

document.getElementById("soal"+i)
.classList.remove("active");

document.getElementById("soal"+(i+1))
.classList.add("active");

setActive(i+1);

});

});


var prevButtons = document.querySelectorAll(".btn-prev");

prevButtons.forEach(function(btn){

btn.addEventListener("click", function(){

var i = parseInt(this.dataset.index);

document.getElementById("soal"+i)
.classList.remove("active");

document.getElementById("soal"+(i-1))
.classList.add("active");

setActive(i-1);

});

});

});


function lompatSoal(i){

var soal = document.querySelectorAll(".soal-item");

for(var x = 0; x < soal.length; x++){

soal[x].classList.remove("active");

}

document.getElementById("soal"+i)
.classList.add("active");

setActive(i);

}


function setActive(i){

var nomor = document.querySelectorAll(".nomor");

for(var x = 0; x < nomor.length; x++){

nomor[x].classList.remove("active");

}

document.getElementById("nav"+i)
.classList.add("active");

}


function submitUjian(){

if(confirm("Yakin ingin menyelesaikan ujian?")){

document.querySelector("form").submit();

}

}

</script>

</body>
</html>
