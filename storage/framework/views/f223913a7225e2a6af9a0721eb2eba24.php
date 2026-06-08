<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Pengumuman</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/tambah_pengumuman.css')); ?>">

    <?php echo $__env->yieldPushContent('styles'); ?>

</head>

<body>

    
    <div class="topbar">

        <div class="topbar-left">

         <a
    href="<?php echo e(auth()->user()->role == 'guru'
        ? route('guru.dashboard')
        : route('kepalasekolah.dashboard')); ?>"
    class="back-btn"
>
    <img
        src="/img/back.png"
        alt="Back"
    >
</a>

            <div class="topbar-title">
                Tambah Pengumuman
            </div>

        </div>

    </div>

    
    <div class="page-wrapper">

        <div class="content">

            <div class="card">

                <div class="header-flex">

                    <h3>Tambah Pengumuman</h3>

                    <a href="<?php echo e(url('/pengumuman')); ?>" class="link-btn">
                        Daftar Pengumuman
                    </a>

                </div>

                <?php if(session('success')): ?>
                    <div class="alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <form method="POST"
                      action="<?php echo e(route('pengumuman.store')); ?>"
                      enctype="multipart/form-data"
                      id="uploadForm">

                    <?php echo csrf_field(); ?>

                    <label>Judul</label>
                    <input type="text" name="judul" required>

                    <label>Isi Pengumuman</label>
                    <textarea name="isi" rows="4" required></textarea>

                    <label>Pilih Kelas</label>
                    <select name="kelas_id">
                        <option value="">Semua Kelas</option>
                        <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($k->id); ?>">
                                <?php echo e($k->nama_kelas); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <label>Upload File / Gambar</label>

                    <input type="file"
                           id="files"
                           name="files[]"
                           multiple
                           accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">

                    <div id="file-list"></div>

                    <button type="submit" class="btn">
                        Upload Pengumuman
                    </button>

                </form>

            </div>

        </div>

    </div>

    
    <div id="imageModal" class="image-modal">
        <span class="close-modal" onclick="closeModal()">&times;</span>
        <img id="modalImage" class="modal-content">
    </div>

    
    <script src="<?php echo e(asset('js/pengumuman_upload.js')); ?>"></script>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/pengumuman/create.blade.php ENDPATH**/ ?>