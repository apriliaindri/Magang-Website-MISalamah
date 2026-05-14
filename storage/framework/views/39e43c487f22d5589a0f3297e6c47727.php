<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Daftar Pengumuman</title>

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- CSS -->
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/daftar_pengumuman.css')); ?>"
    >

</head>

<body>

    
    <nav class="navbar">

        <a
            href="<?php echo e(url('/')); ?>"
            class="back-btn"
        >

            <span class="back-icon">
                &#10094;
            </span>

            <span>Kembali</span>

        </a>

        <h1 class="navbar-title">
            Daftar Pengumuman
        </h1>

    </nav>

    
    <section class="daftar-pengumuman-section">

        <div class="container">

            <?php if($pengumuman->count() > 0): ?>

                <div class="pengumuman-grid">

                    <?php $__currentLoopData = $pengumuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php

                            $gambar = is_array($p->gambar)
                                ? $p->gambar
                                : json_decode($p->gambar, true) ?? [];

                            $filePertama = $gambar[0] ?? null;

                            $ext = $filePertama
                                ? strtolower(pathinfo($filePertama, PATHINFO_EXTENSION))
                                : null;

                        ?>

                        <a
                            href="<?php echo e(route('pengumuman.detail.pengumuman', $p->id)); ?>"
                            class="pengumuman-card"
                        >

                            
                            <div class="card-image">

                                <?php if($filePertama): ?>

                                    <?php if(in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])): ?>

                                        <img
                                            src="<?php echo e(asset('img/LogoMI.png' . $filePertama)); ?>"
                                            alt="thumbnail"
                                        >

                                    <?php elseif($ext == 'pdf'): ?>

                                        <div class="pdf-preview">

                                            <img
                                                src="<?php echo e(asset('img/pdf-icon.png')); ?>"
                                                alt="PDF"
                                            >

                                            <span>PDF Document</span>

                                        </div>

                                    <?php else: ?>

                                        <img
                                            src="<?php echo e(asset('img/default-news.jpg')); ?>"
                                            alt="default"
                                        >

                                    <?php endif; ?>

                                <?php else: ?>

                                    <img
                                        src="<?php echo e(asset('img/default-news.jpg')); ?>"
                                        alt="default"
                                    >

                                <?php endif; ?>

                            </div>

                            
                            <div class="card-content">

                                <span class="kategori-home">

                                    <?php echo e($p->kelas ? $p->kelas->nama_kelas : 'Umum'); ?>


                                </span>

                                <span class="tanggal">

                                    <?php echo e($p->created_at->format('d M Y')); ?>


                                </span>

                                <h3>

                                    <?php echo e(\Illuminate\Support\Str::limit($p->judul, 70)); ?>


                                </h3>

                                <p>

                                    <?php echo e(\Illuminate\Support\Str::limit(strip_tags($p->isi), 120)); ?>


                                </p>

                            </div>

                        </a>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            <?php else: ?>

                <div class="empty-state">

                    <p>Belum ada pengumuman.</p>

                </div>

            <?php endif; ?>

        </div>

    </section>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/pengumuman/daftar_pengumuman.blade.php ENDPATH**/ ?>