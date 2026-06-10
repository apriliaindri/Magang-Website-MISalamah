<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Daftar Artikel</title>

    
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/daftar_pengumuman.css')); ?>"
    >
</head>

<body>

    
    <nav class="navbar">
        <a
            href="<?php echo e(url()->previous()); ?>"
            class="back-btn"
        >
            <span class="back-icon">&#10094;</span>
            <span class="back-text">Kembali</span>
        </a>

        <h1 class="navbar-title">
            Daftar Artikel
        </h1>
    </nav>

    
    <section class="daftar-pengumuman-section">
        <div class="container">

            
            <div class="pengumuman-grid">

                <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <?php
                        $images = is_array($article->image)
                            ? $article->image
                            : json_decode($article->image, true) ?? [];

                        $firstFile = $images[0] ?? $article->image ?? null;

                        $extension = $firstFile
                            ? strtolower(pathinfo($firstFile, PATHINFO_EXTENSION))
                            : null;

                        $imageExtensions = ['jpg', 'jpeg', 'png', 'webp'];
                    ?>

                    <a
                        href="<?php echo e(route('artikel.detail.artikel', $article->id)); ?>"
                        class="pengumuman-card"
                    >

                        
                        <div class="card-image">

                            <?php if($firstFile && in_array($extension, $imageExtensions)): ?>
                                <img
                                    src="<?php echo e(asset('storage/' . $firstFile)); ?>"
                                    alt="Thumbnail Artikel"
                                >

                            <?php elseif($firstFile && $extension === 'pdf'): ?>
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
                                    alt="Default Thumbnail"
                                >
                            <?php endif; ?>

                        </div>

                        
                        <div class="card-content">

                            <span class="kategori-home">
                                <?php echo e($article->category); ?>

                            </span>

                            <br>

                            <span class="tanggal">
                                <?php echo e($article->created_at->format('d M Y')); ?>

                            </span>

                            <h3>
                                <?php echo e(\Illuminate\Support\Str::limit($article->title, 70)); ?>

                            </h3>

                            <p>
                                <?php echo e(\Illuminate\Support\Str::limit(strip_tags($article->content), 120)); ?>

                            </p>

                        </div>

                    </a>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <div class="empty-state">
                        <p>Belum ada artikel.</p>
                    </div>

                <?php endif; ?>

            </div>

        </div>
    </section>

    
    <script src="<?php echo e(asset('js/daftar_artikel.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\artikel\daftar_artikel.blade.php ENDPATH**/ ?>