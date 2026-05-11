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
padding:20px 40px;
border-bottom:1px solid #ddd;
}

.container{
display:flex;
padding:30px;
gap:30px;
}

.soal-area{
flex:3;
background:white;
padding:30px;
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

.opsi{
margin-top:20px;
}

.opsi label{
display:block;
padding:10px;
border:1px solid #ddd;
border-radius:6px;
margin-bottom:10px;
cursor:pointer;
}

.opsi input{
margin-right:10px;
}

.footer{
margin-top:30px;
display:flex;
justify-content:space-between;
}

button{
padding:10px 20px;
border:none;
border-radius:6px;
cursor:pointer;
}

.btn-next{
background:#4CAF50;
color:white;
}

.btn-prev{
background:#999;
color:white;
}

.btn-selesai{
background:#f44336;
color:white;
width:100%;
margin-top:20px;
}

</style>
</head>

<body>

<div class="header">
<h2>{{ $judul }}</h2>
<p>Kelas : {{ $kelas->nama_kelas }}</p>
<p>Mapel : {{ $mapel }}</p>
</div>

<div class="container">

<div class="soal-area">

@if($soal->count()==0)

<p>Tidak ada soal</p>

@else

@foreach($soal as $index => $s)

<div class="soal-item" id="soal{{ $index }}" style="{{ $index==0 ? '' : 'display:none' }}">

<h3>Soal {{ $index+1 }}</h3>

<p>{{ $s->pertanyaan }}</p>

<div class="opsi">

@php
$kunci = explode(',', $s->jawaban_benar);
$isMultiple = count($kunci) > 1;
@endphp


@if($isMultiple)

{{-- MULTIPLE ANSWER (checkbox) --}}

<label>
<input type="checkbox" name="jawaban[{{ $s->id }}][]" value="A">
A. {{ $s->opsi_a }}
</label>

<label>
<input type="checkbox" name="jawaban[{{ $s->id }}][]" value="B">
B. {{ $s->opsi_b }}
</label>

<label>
<input type="checkbox" name="jawaban[{{ $s->id }}][]" value="C">
C. {{ $s->opsi_c }}
</label>

<label>
<input type="checkbox" name="jawaban[{{ $s->id }}][]" value="D">
D. {{ $s->opsi_d }}
</label>

@else

{{-- SINGLE ANSWER (radio) --}}

<label>
<input type="radio" name="jawaban[{{ $s->id }}][]" value="A">
A. {{ $s->opsi_a }}
</label>

<label>
<input type="radio" name="jawaban[{{ $s->id }}][]" value="B">
B. {{ $s->opsi_b }}
</label>

<label>
<input type="radio" name="jawaban[{{ $s->id }}][]" value="C">
C. {{ $s->opsi_c }}
</label>

<label>
<input type="radio" name="jawaban[{{ $s->id }}][]" value="D">
D. {{ $s->opsi_d }}
</label>

@endif

</div>

<div class="footer">

@if($index>0)
<button class="btn-prev" onclick="prevSoal({{ $index }})">
Sebelumnya
</button>
@endif

@if($index < count($soal)-1)
<button class="btn-next" onclick="nextSoal({{ $index }})">
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

<button class="btn-selesai">
Selesai Ujian
</button>

</div>

</div>


<script>

function nextSoal(i){

document.getElementById("soal"+i).style.display="none";
document.getElementById("soal"+(i+1)).style.display="block";

setActive(i+1);

}

function prevSoal(i){

document.getElementById("soal"+i).style.display="none";
document.getElementById("soal"+(i-1)).style.display="block";

setActive(i-1);

}

function lompatSoal(i){

let total = document.querySelectorAll(".soal-item");

total.forEach((el,index)=>{
el.style.display="none";
});

document.getElementById("soal"+i).style.display="block";

setActive(i);

}

function setActive(i){

document.querySelectorAll(".nomor").forEach(el=>{
el.classList.remove("active");
});

document.getElementById("nav"+i).classList.add("active");

}

</script>

</body>
</html>
