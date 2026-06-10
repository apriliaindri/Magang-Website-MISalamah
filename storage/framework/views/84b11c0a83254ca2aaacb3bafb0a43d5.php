<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo e($pengumuman->judul); ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/detail_pengumuman.css')); ?>">
</head>

<body>

    
    <nav class="navbar">
        <a href="<?php echo e(url()->previous()); ?>" class="back-btn">
            <span class="back-icon">&#10094;</span>
            <span>Kembali</span>
        </a>
    </nav>

    
    <section class="detail-section">
        <div class="container">
            <div class="detail-wrapper">

                <div class="detail-content">

                    
                    <div class="detail-meta">
                        <span class="kategori-badge">
                            <?php echo e($pengumuman->kelas?->nama_kelas ?? 'Semua Kelas'); ?>

                        </span>

                        <span class="detail-date">
                            <?php echo e($pengumuman->created_at->format('d M Y, H:i')); ?>

                        </span>
                    </div>

                    
                    <h1 class="detail-title">
                        <?php echo e($pengumuman->judul); ?>

                    </h1>

                    <?php
                        $media = $pengumuman->media_list;
                    ?>

                    
                    <?php $__currentLoopData = $media ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php
                            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        ?>

                        <?php if(in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])): ?>

                            <div class="detail-image">
                                <img
                                    src="<?php echo e(asset('storage/' . $file)); ?>"
                                    alt="gambar"
                                    data-image="<?php echo e(asset('storage/' . $file)); ?>"
                                >
                            </div>

                        <?php elseif($ext === 'pdf'): ?>

                            <div class="file-card">
                                <img src="<?php echo e(asset('img/pdf-icon.png')); ?>" class="file-icon" alt="PDF">

                                <div>
                                    <h3>File PDF</h3>

                                    <a href="<?php echo e(asset('storage/' . $file)); ?>" target="_blank">
                                        Buka PDF
                                    </a>
                                </div>
                            </div>

                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
<?php if(count($media ?? []) > 0): ?>

                        <div class="gallery-wrapper">
                            <?php $__currentLoopData = array_slice($media, 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="gallery-item">
                                    <img
                                        src="<?php echo e(asset('storage/' . $img)); ?>"
                                        alt="gallery"
                                    >
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    <?php endif; ?>

                    
                    <div class="detail-text">
                        <?php echo nl2br(e($pengumuman->isi)); ?>

                    </div>

                </div>

            </div>
        </div>
    </section>

    
    <div id="imageModal" class="image-modal">
        <span class="close-modal">&times;</span>
        <img id="modalImage" class="modal-content" alt="Preview">
    </div>

    
    <script src="<?php echo e(asset('js/detail_pengumuman.js')); ?>"></script>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\pengumuman\detail_pengumuman.blade.php ENDPATH**/ ?>