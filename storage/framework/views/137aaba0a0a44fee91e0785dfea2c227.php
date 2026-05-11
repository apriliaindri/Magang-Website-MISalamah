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
<h2><?php echo e($judul); ?></h2>
<p>Kelas : <?php echo e($kelas->nama_kelas); ?></p>
<p>Mapel : <?php echo e($mapel); ?></p>
</div>

<div class="container">

<div class="soal-area">

<?php if($soal->count()==0): ?>

<p>Tidak ada soal</p>

<?php else: ?>

<?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="soal-item" id="soal<?php echo e($index); ?>" style="<?php echo e($index==0 ? '' : 'display:none'); ?>">

<h3>Soal <?php echo e($index+1); ?></h3>

<p><?php echo e($s->pertanyaan); ?></p>

<div class="opsi">

<?php
$kunci = explode(',', $s->jawaban_benar);
$isMultiple = count($kunci) > 1;
?>


<?php if($isMultiple): ?>



<label>
<input type="checkbox" name="jawaban[<?php echo e($s->id); ?>][]" value="A">
A. <?php echo e($s->opsi_a); ?>

</label>

<label>
<input type="checkbox" name="jawaban[<?php echo e($s->id); ?>][]" value="B">
B. <?php echo e($s->opsi_b); ?>

</label>

<label>
<input type="checkbox" name="jawaban[<?php echo e($s->id); ?>][]" value="C">
C. <?php echo e($s->opsi_c); ?>

</label>

<label>
<input type="checkbox" name="jawaban[<?php echo e($s->id); ?>][]" value="D">
D. <?php echo e($s->opsi_d); ?>

</label>

<?php else: ?>



<label>
<input type="radio" name="jawaban[<?php echo e($s->id); ?>][]" value="A">
A. <?php echo e($s->opsi_a); ?>

</label>

<label>
<input type="radio" name="jawaban[<?php echo e($s->id); ?>][]" value="B">
B. <?php echo e($s->opsi_b); ?>

</label>

<label>
<input type="radio" name="jawaban[<?php echo e($s->id); ?>][]" value="C">
C. <?php echo e($s->opsi_c); ?>

</label>

<label>
<input type="radio" name="jawaban[<?php echo e($s->id); ?>][]" value="D">
D. <?php echo e($s->opsi_d); ?>

</label>

<?php endif; ?>

</div>

<div class="footer">

<?php if($index>0): ?>
<button class="btn-prev" onclick="prevSoal(<?php echo e($index); ?>)">
Sebelumnya
</button>
<?php endif; ?>

<?php if($index < count($soal)-1): ?>
<button class="btn-next" onclick="nextSoal(<?php echo e($index); ?>)">
Berikutnya
</button>
<?php endif; ?>

</div>

</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>

</div>


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
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/guru/detail_tugas.blade.php ENDPATH**/ ?>