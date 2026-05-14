<!DOCTYPE html>
<html>
<head>
<title>Edit Pengumuman</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

body{
margin:0;
font-family:Poppins,sans-serif;
background:#f5f7fa;
}

/* CONTENT */
.content{
padding:60px;
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
input,textarea,select{
width:100%;
padding:12px;
margin-bottom:15px;
border-radius:8px;
border:1px solid #ddd;
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

.btn-success:hover{
opacity:0.9;
}

/* ALERT */
.alert-success{
background:#e8f5e9;
color:#2e7d32;
padding:10px;
border-radius:8px;
margin-bottom:15px;
}

</style>
</head>

<body>

<div class="content">
<div class="card">

<h3>Edit Pengumuman</h3>

<?php if(session('success')): ?>
<div class="alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<form action="<?php echo e(route('pengumuman.update', $pengumuman->id)); ?>" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<?php echo method_field('PUT'); ?>

<label>Judul</label>
<input type="text" name="judul" value="<?php echo e($pengumuman->judul); ?>" required>

<label>Isi Pengumuman</label>
<textarea name="isi" rows="4"><?php echo e($pengumuman->isi); ?></textarea>

<label>Pilih Kelas</label>
<select name="kelas_id">
    <option value="">Umum (Semua Kelas)</option>
    <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($k->id); ?>"
            <?php echo e($pengumuman->kelas_id == $k->id ? 'selected' : ''); ?>>
            <?php echo e($k->nama_kelas); ?>

        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

<label>Upload File (Opsional)</label>
<input type="file" name="file">

<?php if($pengumuman->file): ?>
    <small>File saat ini: <?php echo e($pengumuman->file); ?></small>
<?php endif; ?>

<br><br>

<button class="btn btn-success">
    Update Pengumuman
</button>

</form>

</div>
</div>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/pengumuman/edit_pengumuman.blade.php ENDPATH**/ ?>