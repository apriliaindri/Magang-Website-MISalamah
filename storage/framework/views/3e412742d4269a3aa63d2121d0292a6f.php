
<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?php echo e($article->title); ?></title>

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- CSS -->
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/detail_pengumuman.css')); ?>"
    >

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
                            <?php echo e($article->category); ?>

                        </span>

                        <span class="detail-date">
                            <?php echo e($article->created_at->format('d M Y, H:i')); ?>

                        </span>

                    </div>

                    
                    <h1 class="detail-title">
                        <?php echo e($article->title); ?>

                    </h1>

                    <?php

                        $gambar = is_array($article->image)
                            ? $article->image
                            : json_decode($article->image, true) ?? [];

                    ?>

                    
                    <?php $__currentLoopData = $gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php
                            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        ?>

                        <?php if(in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])): ?>

                            <div class="detail-image">

                                <img
                                    src="<?php echo e(asset('storage/' . $file)); ?>"
                                    alt="gambar"
                                    onclick="openModal(this.src)"
                                >

                            </div>

                        <?php elseif($ext == 'pdf'): ?>

                            <div class="file-card">

                                <img
                                    src="<?php echo e(asset('img/pdf-icon.png')); ?>"
                                    class="file-icon"
                                    alt="PDF"
                                >

                                <div>

                                    <h3>File PDF</h3>

                                    <a
                                        href="<?php echo e(asset('storage/' . $file)); ?>"
                                        target="_blank"
                                    >
                                        Buka PDF
                                    </a>

                                </div>

                            </div>

                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    <?php if(count($gambar) > 1): ?>

                        <div class="gallery-wrapper">

                            <?php $__currentLoopData = array_slice($gambar, 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="gallery-item">

                                    <img
                                        src="<?php echo e(asset('storage/' . $img)); ?>"
                                        alt="gallery"
                                        onclick="openModal(this.src)"
                                    >

                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    <?php endif; ?>

                    
                    <div class="detail-text">

                        <?php echo nl2br(e($article->content)); ?>


                    </div>

                </div>

            </div>

        </div>

    </section>

    
    <div id="imageModal" class="image-modal">

        <span class="close-modal" onclick="closeModal()">
            &times;
        </span>

        <img id="modalImage" class="modal-content" alt="Preview">

    </div>

    <script>

        function openModal(src) {

            document.getElementById('imageModal').style.display = 'flex';

            document.getElementById('modalImage').src = src;

        }

        function closeModal() {

            document.getElementById('imageModal').style.display = 'none';

        }

        document
            .getElementById('imageModal')
            .addEventListener('click', function (e) {

                if (e.target.id === 'imageModal') {

                    closeModal();

                }

            });

    </script>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/artikel/detail_artikel.blade.php ENDPATH**/ ?>