<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Artikel</title>

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- CSS -->
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/edit_pengumuman.css')); ?>"
    >

</head>

<body>

    <div class="content">

        <div class="card">

            <h3>Edit Artikel</h3>

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

                
                <label>Judul Artikel</label>

                <input
                    type="text"
                    name="title"
                    value="<?php echo e($article->title); ?>"
                    required
                >

                
                <label>Kategori</label>

                <input
                    type="text"
                    name="category"
                    value="<?php echo e($article->category); ?>"
                    required
                >

                
                <label>Sub Kategori</label>

                <input
                    type="text"
                    name="sub_category"
                    value="<?php echo e($article->sub_category); ?>"
                >

                
                <label>Isi Artikel</label>

                <textarea
                    name="content"
                    rows="8"
                ><?php echo e($article->content); ?></textarea>

                
                <label>Upload Gambar / File Baru (Opsional)</label>

                <input
                    type="file"
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

                        <strong>File saat ini:</strong>

                        <ul style="margin-top:10px; padding-left:18px;">

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
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/kepalasekolah/artikel/edit_artikel.blade.php ENDPATH**/ ?>