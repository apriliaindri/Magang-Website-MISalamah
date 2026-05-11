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
<h2><?php echo e($tugas->judul); ?></h2>

<p>
Kelas : <?php echo e($kelas->nama_kelas); ?> <br>
Mapel : <?php echo e($tugas->mapel); ?>

</p>

<?php if($tugas->instruksi): ?>
<p style="color:gray;font-size:13px;">
* <?php echo e($tugas->instruksi); ?>

</p>
<?php endif; ?>

</div>

<form method="POST" action="<?php echo e(route('siswa.soal.submit')); ?>">
<?php echo csrf_field(); ?>

<input type="hidden" name="kelas_id" value="<?php echo e($kelas->id); ?>">
<input type="hidden" name="mapel" value="<?php echo e($tugas->mapel); ?>">
<div class="container">

<div class="soal-area">

<?php if($soal->count()==0): ?>
<p>Tidak ada soal</p>
<?php else: ?>

<?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="soal-item"
id="soal<?php echo e($index); ?>"
style="<?php echo e($index==0 ? '' : 'display:none'); ?>">

<h3>Soal <?php echo e($index+1); ?></h3>
<p><?php echo e($s->pertanyaan); ?></p>

<?php
$kunci = json_decode($s->jawaban_benar, true);
if(!is_array($kunci)){
    $kunci = [$s->jawaban_benar];
}
$isMultiple = count($kunci) > 1;
?>

<div class="opsi">

<?php $__currentLoopData = ['A','B','C','D']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opsi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<label>

<?php if($isMultiple): ?>
<input type="checkbox"
name="jawaban[<?php echo e($s->id); ?>][]"
value="<?php echo e($opsi); ?>"
data-soal="<?php echo e($s->id); ?>">
<?php else: ?>
<input type="radio"
name="jawaban[<?php echo e($s->id); ?>]"
value="<?php echo e($opsi); ?>"
data-soal="<?php echo e($s->id); ?>">
<?php endif; ?>

<input type="hidden" name="kelas_id" value="<?php echo e($kelas->id); ?>">
<input type="hidden" name="mapel" value="<?php echo e($tugas->mapel); ?>">
<input type="hidden" name="tugas_id" value="<?php echo e($tugas->id); ?>">

<?php echo e($opsi); ?>. <?php echo e($s['opsi_'.strtolower($opsi)]); ?>


</label>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

<div class="footer">

<?php if($index>0): ?>
<button type="button" class="btn-prev" onclick="prevSoal(<?php echo e($index); ?>)">
Sebelumnya
</button>
<?php endif; ?>

<?php if($index < count($soal)-1): ?>
<button type="button" class="btn-next" onclick="nextSoal(<?php echo e($index); ?>)">
Berikutnya
</button>
<?php endif; ?>

</div>

</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

</div>

<!-- NAVIGASI -->
<div class="nav-area">

<h4>Navigasi Soal</h4>

<div class="nomor-grid">
<?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="nomor <?php echo e($index==0 ? 'active' : ''); ?>"
onclick="lompatSoal(<?php echo e($index); ?>)"
id="nav<?php echo e($index); ?>">
<?php echo e($index+1); ?>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php if(!$sudah): ?>
<button type="button" class="btn-selesai" onclick="submitUjian()">
Selesai Ujian
</button>
<?php else: ?>
<button type="button" class="btn-selesai" disabled
style="background:#999;cursor:not-allowed;">
Sudah Dikerjakan
</button>
<?php endif; ?>

</div>

</div>
</form>

<script>

let total = <?php echo e(count($soal)); ?>;
let storageKey = "cbt_<?php echo e(auth()->id()); ?>_<?php echo e($kelas->id); ?>_<?php echo e($tugas->mapel); ?>";

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
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/siswa/soal.blade.php ENDPATH**/ ?>