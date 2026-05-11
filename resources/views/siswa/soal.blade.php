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

.btn-next{background:#4CAF50;color:white;}
.btn-prev{background:#999;color:white;}
.btn-selesai{background:#f44336;color:white;width:100%;margin-top:20px;}
</style>
</head>

<body>

<div class="header">
<h2>{{ $tugas->judul }}</h2>

<p>
Kelas : {{ $kelas->nama_kelas }} <br>
Mapel : {{ $tugas->mapel }}
</p>

@if($tugas->instruksi)
<p style="color:gray;font-size:13px;">
* {{ $tugas->instruksi }}
</p>
@endif

</div>

<form method="POST" action="{{ route('siswa.soal.submit') }}">
@csrf

<input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
<input type="hidden" name="mapel" value="{{ $tugas->mapel }}">
<div class="container">

<div class="soal-area">

@if($soal->count()==0)
<p>Tidak ada soal</p>
@else

@foreach($soal as $index => $s)

<div class="soal-item"
id="soal{{ $index }}"
style="{{ $index==0 ? '' : 'display:none' }}">

<h3>Soal {{ $index+1 }}</h3>
<p>{{ $s->pertanyaan }}</p>

@php
$kunci = json_decode($s->jawaban_benar, true);
if(!is_array($kunci)){
    $kunci = [$s->jawaban_benar];
}
$isMultiple = count($kunci) > 1;
@endphp

<div class="opsi">

@foreach(['A','B','C','D'] as $opsi)
<label>

@if($isMultiple)
<input type="checkbox"
name="jawaban[{{ $s->id }}][]"
value="{{ $opsi }}"
data-soal="{{ $s->id }}">
@else
<input type="radio"
name="jawaban[{{ $s->id }}]"
value="{{ $opsi }}"
data-soal="{{ $s->id }}">
@endif

<input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
<input type="hidden" name="mapel" value="{{ $tugas->mapel }}">
<input type="hidden" name="tugas_id" value="{{ $tugas->id }}">

{{ $opsi }}. {{ $s['opsi_'.strtolower($opsi)] }}

</label>
@endforeach

</div>

<div class="footer">

@if($index>0)
<button type="button" class="btn-prev" onclick="prevSoal({{ $index }})">
Sebelumnya
</button>
@endif

@if($index < count($soal)-1)
<button type="button" class="btn-next" onclick="nextSoal({{ $index }})">
Berikutnya
</button>
@endif

</div>

</div>

@endforeach
@endif

</div>

<!-- NAVIGASI -->
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

@if(!$sudah)
<button type="button" class="btn-selesai" onclick="submitUjian()">
Selesai Ujian
</button>
@else
<button type="button" class="btn-selesai" disabled
style="background:#999;cursor:not-allowed;">
Sudah Dikerjakan
</button>
@endif

</div>

</div>
</form>

<script>

let total = {{ count($soal) }};
let storageKey = "cbt_{{ auth()->id() }}_{{ $kelas->id }}_{{ $tugas->mapel }}";

// NAVIGASI
function nextSoal(i){
if(i+1 >= total) return;
document.getElementById("soal"+i).style.display="none";
document.getElementById("soal"+(i+1)).style.display="block";
setActive(i+1);
}

function prevSoal(i){
if(i-1 < 0) return;
document.getElementById("soal"+i).style.display="none";
document.getElementById("soal"+(i-1)).style.display="block";
setActive(i-1);
}

function lompatSoal(i){
for(let x=0;x<total;x++){
document.getElementById("soal"+x).style.display="none";
}
document.getElementById("soal"+i).style.display="block";
setActive(i);
}

function setActive(i){
document.querySelectorAll(".nomor").forEach(el=>{
el.classList.remove("active");
});
document.getElementById("nav"+i).classList.add("active");
}

// AUTO SAVE
document.querySelectorAll("input").forEach(input => {

input.addEventListener("change", () => {

let data = JSON.parse(localStorage.getItem(storageKey)) || {};

let soal = input.dataset.soal;

if(input.type === "radio"){

data[soal] = input.value;

}else{

if(!data[soal]){
data[soal] = [];
}

if(input.checked){

if(!data[soal].includes(input.value)){
data[soal].push(input.value);
}

}else{

data[soal] = data[soal].filter(v => v !== input.value);

}

}

localStorage.setItem(storageKey, JSON.stringify(data));

});

});

// LOAD DRAFT
window.onload = function(){

let data = JSON.parse(localStorage.getItem(storageKey));

if(data){
Object.keys(data).forEach(soalId => {

let val = data[soalId];

if(Array.isArray(val)){
val.forEach(v=>{
let el = document.querySelector(`input[data-soal='${soalId}'][value='${v}']`);
if(el) el.checked = true;
});
}else{
let el = document.querySelector(`input[data-soal='${soalId}'][value='${val}']`);
if(el) el.checked = true;
}

});
}

// notif submit
if(localStorage.getItem("cbt_success")==="1"){
alert("Tugas berhasil disubmit!");
localStorage.removeItem("cbt_success");
}
};

// SUBMIT
function submitUjian(){
if(confirm("Yakin ingin menyelesaikan ujian?")){
localStorage.removeItem(storageKey);
localStorage.setItem("cbt_success","1");
document.querySelector("form").submit();
}
}

</script>

</body>
</html>,
