<!DOCTYPE html>
<html>
<head>
<title>Tambah Pengumuman</title>
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

/* ================= CONTENT ================= */
.content{
    display:flex;
    justify-content:center;
    margin-top: 55px;
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

/* HEADER FLEX */
.header-flex{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
}

/* LINK BUTTON */
.link-btn{
background:#2196F3;
color:white;
padding:8px 14px;
border-radius:8px;
text-decoration:none;
font-size:14px;
}

.link-btn:hover{
opacity:0.9;
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
width:100%;
padding:12px;
border:none;
border-radius:8px;
font-weight:600;
background:#4CAF50;
color:white;
cursor:pointer;
}

.btn:hover{
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

/* ================= FILE LIST ================= */

#file-list{
    margin-top:10px;
}

.file-item{
    background:#f1f5f9;
    padding:10px 14px;
    border-radius:10px;
    margin-bottom:8px;
    font-size:14px;
    color:#333;

    display:flex;
    align-items:center;
    justify-content:space-between;
}

.file-left{
    display:flex;
    align-items:center;
    gap:10px;
}

.remove-file{
    background:#ef4444;
    color:white;
    border:none;
    width:24px;
    height:24px;
    border-radius:50%;
    cursor:pointer;
    font-size:14px;
    font-weight:bold;
}

.remove-file:hover{
    opacity:0.85;
}
</style>
</head>

<body>

<!-- TOPBAR -->
<div class="topbar">

    <a href="#" onclick="goBack()" class="back-btn">
        <img src="/img/back.png">
    </a>

    <div class="topbar-title">
        Tambah Pengumuman
    </div>

</div>

<div class="page-wrapper">

    <div class="content">

        <div class="card">

            <!-- HEADER + BUTTON -->
            <div class="header-flex">
                <h3 style="margin:0;">Tambah Pengumuman</h3>

<a href="<?php echo e(url('/pengumuman')); ?>" class="link-btn">
                    Daftar Pengumuman
                </a>
            </div>

            <?php if(session('success')): ?>
                <div class="alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('pengumuman.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <label>Judul</label>
                <input type="text" name="judul" placeholder="Masukkan judul" required>

                <label>Isi Pengumuman</label>
                <textarea name="isi" rows="4" placeholder="Tulis pengumuman..." required></textarea>

                <label>Pilih Kelas</label>
                <select name="kelas_id">
                    <option value="">Umum (Semua Kelas)</option>
                    <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($k->id); ?>"><?php echo e($k->nama_kelas); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

<label>Upload File / Gambar</label>

<input
    type="file"
    id="files"
    name="files[]"
    multiple
    accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">

<!-- LIST FILE -->
<div id="file-list"></div>

                <button type="submit" class="btn">
                    Upload Pengumuman
                </button>
            </form>

        </div>

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
<script>

function goBack(){

    if(document.referrer === window.location.href || document.referrer === ""){

        window.location.href = "<?php echo e(route('kepalasekolah.dashboard')); ?>";

    }else{

        window.history.back();

    }
}


function goBack(){

    if(document.referrer === window.location.href || document.referrer === ""){

        window.location.href = "<?php echo e(route('kepalasekolah.dashboard')); ?>";

    }else{

        window.history.back();

    }
}


/* =========================
   MULTIPLE FILE PREVIEW
========================= */

const inputFiles = document.getElementById('files');
const fileList = document.getElementById('file-list');

let selectedFiles = [];

inputFiles.addEventListener('change', function(e){

    Array.from(e.target.files).forEach(file => {

        selectedFiles.push(file);

    });

    updateInputFiles();

    renderFiles();

});


function renderFiles(){

    fileList.innerHTML = '';

    selectedFiles.forEach((file, index) => {

        const div = document.createElement('div');

        div.classList.add('file-item');

        div.innerHTML = `
            <div class="file-left">
                <span>📎</span>
                <span>${file.name}</span>
            </div>

            <button
                type="button"
                class="remove-file"
                onclick="removeFile(${index})">
                ×
            </button>
        `;

        fileList.appendChild(div);

    });

}

function updateInputFiles(){

    const dataTransfer = new DataTransfer();

    selectedFiles.forEach(file => {

        dataTransfer.items.add(file);

    });

    inputFiles.files = dataTransfer.files;

}

/* HAPUS FILE */
function removeFile(index){

    selectedFiles.splice(index, 1);

    updateInputFiles();

    renderFiles();

}
</script>
</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/pengumuman/create.blade.php ENDPATH**/ ?>