<!DOCTYPE html>
<html>
<head>
<title>Upload Artikel</title>
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

.back-btn img{
width:20px;
margin-left:10px;
filter: invert(1);
cursor:pointer;
}

/* CONTENT */
.content{
display:flex;
justify-content:center;
margin-top:60px;
padding:40px 20px;
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
width:100%;
padding:12px;
border:none;
border-radius:8px;
font-weight:600;
background:#4CAF50;
color:white;
cursor:pointer;
}
</style>
</head>

<body>

<div class="topbar">
    <a href="#" onclick="goBack()" class="back-btn">
        <img src="/img/back.png">
    </a>

    <div class="topbar-title">Upload Artikel</div>
</div>

<div class="content">
<div class="card">

<h3>Upload Artikel</h3>

<form method="POST" action="<?php echo e(route('kepalasekolah.artikel.store')); ?>" enctype="multipart/form-data">
<?php echo csrf_field(); ?>

<!-- JUDUL -->
<input type="text" name="title" placeholder="Judul" required>

<!-- KATEGORI (DROPDOWN) -->
<label>Kategori</label>
<select name="category" required>
    <option value="">-- Pilih Kategori --</option>
    <option value="Berita">Berita</option>
    <option value="Kegiatan">Kegiatan</option>
    <option value="Pengumuman">Pengumuman</option>
    <option value="Prestasi">Prestasi</option>
    <option value="Agenda">Agenda Sekolah</option>
</select>

<!-- SUB KATEGORI -->
<label>Sub Kategori</label>
<input type="text" name="sub_category" placeholder="Contoh: Upacara, Lomba, Study Tour">

<!-- ISI -->
<textarea name="content" rows="4" placeholder="Isi Artikel" required></textarea>

<!-- GAMBAR -->
<input type="file" name="image">

<button class="btn">Upload Artikel</button>

</form>

</div>
</div>

<script>
function goBack(){
    if(document.referrer === window.location.href || document.referrer === ""){
        window.location.href = "<?php echo e(route('kepalasekolah.dashboard')); ?>";
    }else{
        window.history.back();
    }
}
</script>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/kepalasekolah/artikel/create.blade.php ENDPATH**/ ?>