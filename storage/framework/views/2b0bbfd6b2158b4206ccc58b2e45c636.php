<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/styleprofil.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header">
    <h1>Tata Tertib Sekolah</h1>
</div>

<div class="content-section">

    <ol class="tatib-list">
        <li>Siswa wajib hadir tepat waktu.</li>
        <li>Siswa mengenakan seragam sesuai ketentuan.</li>
        <li>Menjaga kebersihan lingkungan sekolah.</li>
        <li>Bersikap sopan kepada guru dan sesama siswa.</li>
        <li>Tidak membawa barang terlarang ke sekolah.</li>
        <li>Mematuhi seluruh peraturan sekolah.</li>
    </ol>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/profil/tatib.blade.php ENDPATH**/ ?>