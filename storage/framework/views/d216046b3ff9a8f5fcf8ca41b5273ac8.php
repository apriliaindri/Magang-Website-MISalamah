<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($pengumuman->judul); ?></title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

/* =========================
   RESET
========================= */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins', sans-serif;
    background:#f5f7fb;
    color:#333;
}

/* =========================
   NAVBAR
========================= */

.navbar{
    width:100%;
    height:86px;

    background:white;

    padding:18px 60px;

    display:flex;
    align-items:center;
    justify-content:center;

    box-shadow:0 4px 12px rgba(0,0,0,0.08);

    position:fixed;
    top:0;
    left:0;

    z-index:1000;
}

/* BACK BUTTON */
.back-btn{
    position:absolute;
    left:60px;

    display:flex;
    align-items:center;

    gap:10px;

    text-decoration:none;

    color:#4CAF50;

    font-weight:600;
    font-size:16px;

    transition:0.3s;

    height:100%;
}

.back-btn:hover{
    opacity:0.8;
}

.back-btn span:last-child{
    position:relative;
    top:1px;
}

.back-icon{
    font-size:30px;

    display:flex;
    align-items:center;

    line-height:1;
}

/* TITLE */

.navbar-title{
    font-size:24px;
    color:#4CAF50;
    font-weight:700;
}
/* =========================
   PAGE
========================= */

.detail-section{
    padding:140px 20px 80px;
}

.container{
    max-width:1000px;
    margin:auto;
}

/* =========================
   DETAIL WRAPPER
========================= */

.detail-wrapper{
    background:white;

    border-radius:28px;

    overflow:hidden;

    box-shadow:
        0 5px 15px rgba(0,0,0,0.04),
        0 15px 40px rgba(0,0,0,0.08);
}

/* =========================
   CONTENT
========================= */

.detail-content{
    padding:50px;
}

/* =========================
   META
========================= */

.detail-meta{
    display:flex;
    align-items:center;
    gap:18px;

    flex-wrap:wrap;

    margin-bottom:25px;
}

/* KATEGORI */

.kategori-badge{
    background:#dff1ff;

    color:#3498db;

    padding:8px 18px;

    border-radius:999px;

    font-size:14px;
    font-weight:600;
}

/* TANGGAL */

.detail-date{
    color:#888;
    font-size:15px;
}

/* =========================
   TITLE
========================= */

.detail-title{
    font-size:52px;
    line-height:1.25;

    color:#111827;

    margin-bottom:40px;

    font-weight:800;
}

/* =========================
   IMAGE
========================= */

.detail-image{
    width:100%;
    margin-bottom:45px;
}

.detail-image img{
    width:100%;

    max-height:520px;

    object-fit:cover;

    border-radius:24px;
}

/* =========================
   TEXT
========================= */

.detail-text{
    font-size:18px;
    line-height:2;

    color:#444;
}

.detail-text p{
    margin-bottom:24px;
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:768px){

    .navbar{
        padding:18px 20px;
    }

    .back-btn{
        left:20px;
    }

    .navbar-title{
        font-size:20px;
    }

    .detail-section{
        padding-top:120px;
    }

    .detail-content{
        padding:25px;
    }

    .detail-title{
        font-size:34px;
    }

    .detail-image img{
        max-height:260px;
    }

    .detail-text{
        font-size:16px;
        line-height:1.9;
    }

}

/* =========================
   GALLERY
========================= */

.gallery-wrapper{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(220px,1fr));
    gap:18px;

    margin-bottom:40px;
}

.gallery-item img{
    width:100%;
    height:220px;

    object-fit:cover;

    border-radius:18px;

    transition:0.3s;
    cursor:pointer;
}

.gallery-item img:hover{
    transform:scale(1.03);
}

/* =========================
   FILE CARD
========================= */

.file-card{
    display:flex;
    align-items:center;
    gap:20px;

    background:#f8fafc;

    padding:20px;

    border-radius:18px;

    margin-bottom:25px;
}

.file-icon{
    width:70px !important;
    height:70px !important;
    object-fit:contain !important;
}

.file-card h3{
    margin-bottom:8px;
    font-size:20px;
}

.file-card a{
    color:#2563eb;
    text-decoration:none;
    font-weight:600;
}

/* =========================
   IMAGE POPUP
========================= */

.image-modal{
    display:none;

    position:fixed;
    z-index:9999;

    left:0;
    top:0;

    width:100%;
    height:100%;

    background:rgba(0,0,0,0.9);

    justify-content:center;
    align-items:center;

    padding:20px;
}

.modal-content{
    max-width:90%;
    max-height:90%;

    border-radius:16px;

    animation:zoomIn 0.25s ease;
}

.close-modal{
    position:absolute;

    top:20px;
    right:35px;

    color:white;

    font-size:45px;
    font-weight:bold;

    cursor:pointer;
}

@keyframes zoomIn{

    from{
        transform:scale(0.8);
        opacity:0;
    }

    to{
        transform:scale(1);
        opacity:1;
    }

}
    </style>
</head>

<body>

<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">

    <!-- BACK -->
<a href="<?php echo e(url()->previous()); ?>"
   class="back-btn">

        <span class="back-icon">
            &#10094;
        </span>

        <span>Kembali</span>

    </a>


</nav>

<!-- =========================
     CONTENT
========================= -->

<section class="detail-section">

    <div class="container">

        <div class="detail-wrapper">

            <div class="detail-content">

                <!-- META -->
                <div class="detail-meta">

                    <span class="kategori-badge">

                     <?php echo e($pengumuman->kelas ? $pengumuman->kelas->nama_kelas : 'Umum'); ?>

                    </span>

                    <span class="detail-date">

                        <?php echo e($pengumuman->created_at->format('d M Y, H:i')); ?>


                    </span>

                </div>

                <!-- TITLE -->
                <h1 class="detail-title">

                    <?php echo e($pengumuman->judul); ?>


                </h1>

<?php

$gambar = [];

if(is_array($pengumuman->gambar)){

    $gambar = $pengumuman->gambar;

}else{

    $gambar = json_decode($pengumuman->gambar, true) ?? [];

}

?>


<?php $__currentLoopData = $gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
?>


<?php if(in_array($ext, ['jpg','jpeg','png','webp'])): ?>

    <div class="detail-image">

        <img
            src="<?php echo e(asset('storage/'.$file)); ?>"
            alt="gambar"
            onclick="openModal(this.src)">

    </div>

<?php elseif($ext == 'pdf'): ?>

    <div class="file-card">

        <img
            src="<?php echo e(asset('img/pdf-icon.png')); ?>"
            class="file-icon">

        <div>

            <h3>File PDF</h3>

            <a
                href="<?php echo e(asset('storage/'.$file)); ?>"
                target="_blank">

                Buka PDF

            </a>

        </div>

    </div>

<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<!-- GALERI GAMBAR LAIN -->
<?php if(count($gambar) > 1): ?>

<div class="gallery-wrapper">

    <?php $__currentLoopData = array_slice($gambar, 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="gallery-item">

            <img src="<?php echo e(asset('storage/'.$img)); ?>">

        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

<?php endif; ?>

                <!-- TEXT -->
                <div class="detail-text">

                    <?php echo nl2br(e($pengumuman->isi)); ?>


                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================
     IMAGE POPUP
========================= -->

<div id="imageModal" class="image-modal">

    <span class="close-modal" onclick="closeModal()">
        &times;
    </span>

    <img id="modalImage" class="modal-content">

</div>

<script>

function openModal(src){

    document.getElementById('imageModal').style.display = 'flex';

    document.getElementById('modalImage').src = src;

}

function closeModal(){

    document.getElementById('imageModal').style.display = 'none';

}

document.getElementById('imageModal')
.addEventListener('click', function(e){

    if(e.target.id === 'imageModal'){

        closeModal();

    }

});

</script>
</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/pengumuman/detail_pengumuman.blade.php ENDPATH**/ ?>