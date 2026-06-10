<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Edit Artikel
    </title>

    
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/edit_pengumuman.css')); ?>"
    >

</head>

<body>

<div class="topbar">
    <div class="topbar-left">

        <a href="<?php echo e(route('pengumuman.index')); ?>" class="back-btn">
            <img src="/img/back.png" alt="Back">
        </a>

        <div class="topbar-title">
            Edit Pengumuman
        </div>

    </div>
</div>

    <div class="content">

        <div class="card">

            
            <h3>
                Edit Artikel
            </h3>

            
            <?php if(session('success')): ?>

                <div class="alert-success">

                    <?php echo e(session('success')); ?>


                </div>

            <?php endif; ?>

            
            <form
                action="<?php echo e(route('artikel.update', $article->id)); ?>"
                method="POST"
                enctype="multipart/form-data"
            >

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                
                <label for="title">
                    Judul Artikel
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="<?php echo e($article->title); ?>"
                    required
                >

                
                <label for="category">
                    Kategori
                </label>

                <select
    id="category"
    name="category"
    required
>
    <option value="">
        -- Pilih Kategori --
    </option>

    <option value="Berita" <?php echo e($article->category == 'Berita' ? 'selected' : ''); ?>>
        Berita
    </option>

    <option value="Kegiatan" <?php echo e($article->category == 'Kegiatan' ? 'selected' : ''); ?>>
        Kegiatan
    </option>

    <option value="Pengumuman" <?php echo e($article->category == 'Pengumuman' ? 'selected' : ''); ?>>
        Pengumuman
    </option>

    <option value="Prestasi" <?php echo e($article->category == 'Prestasi' ? 'selected' : ''); ?>>
        Prestasi
    </option>

    <option value="Agenda" <?php echo e($article->category == 'Agenda' ? 'selected' : ''); ?>>
        Agenda Sekolah
    </option>
</select>

                
                <label for="sub_category">
                    Sub Kategori
                </label>

                <input
                    type="text"
                    id="sub_category"
                    name="sub_category"
                    value="<?php echo e($article->sub_category); ?>"
                >

                
                <label for="content">
                    Isi Artikel
                </label>

                <textarea
                    id="content"
                    name="content"
                    rows="8"
                ><?php echo e($article->content); ?></textarea>

                
                <label for="images">
                    Upload Gambar / File Baru (Opsional)
                </label>

                <input
                    type="file"
                    id="images"
                    name="images[]"
                    multiple
                >

                
                <?php

                    $images = is_array($article->image)
                        ? $article->image
                        : json_decode($article->image, true) ?? [];

                ?>

                <?php if(count($images) > 0): ?>

                    <div class="file-info">

                        <strong>
                            File saat ini:
                        </strong>

                        <ul class="file-list">

                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li>

                                    <?php echo e(basename($img)); ?>


                                </li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>

                    </div>

                <?php endif; ?>

                
                <button
                    type="submit"
                    class="btn btn-success"
                >

                    Update Artikel

                </button>

            </form>

        </div>

    </div>

</body>

</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\kepalasekolah\artikel\edit_artikel.blade.php ENDPATH**/ ?>