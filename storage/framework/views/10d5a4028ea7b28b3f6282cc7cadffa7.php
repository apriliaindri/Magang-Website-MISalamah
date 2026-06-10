<?php $__env->startSection('content'); ?>

    
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/pengumuman_kelas.css')); ?>"
    >

    
    <div class="custom-navbar">

        <h2>
            Pengumuman - <?php echo e($kelas->nama_kelas); ?>

        </h2>

        <a
            href="<?php echo e(route('kelas.dashboard', $kelas->id)); ?>"
            class="back-link"
        >
            ← Back
        </a>

    </div>

    
    <div class="content-wrapper">

        <h1>
            Daftar Pengumuman
        </h1>

        <p>
            Isi pengumuman akan tampil di sini.
        </p>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\kelas\pengumuman.blade.php ENDPATH**/ ?>