<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/styleprofil.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header">
    <h1>Visi dan Misi</h1>
</div>

<div class="content-section">
    <div class="visi-misi-container">

        <div class="row-item">
            <div class="left-title">
                <h2>Visi</h2>
            </div>
            <div class="right-content">
                <p>
                    “Terwujudnya peserta didik yang beriman, berakhlak mulia,
                    berilmu, berwawasan lingkungan, dan berdaya saing global.”
                </p>
            </div>
        </div>

        <div class="row-item">
            <div class="left-title">
                <h2>Misi</h2>
            </div>
            <div class="right-content">
                <ol>
                    <li>Meningkatkan keimanan dan ketakwaan kepada Tuhan Yang Maha Esa.</li>
                    <li>Membentuk karakter siswa yang berakhlak mulia.</li>
                    <li>Meningkatkan kualitas pembelajaran yang inovatif dan kreatif.</li>
                    <li>Menanamkan kepedulian terhadap lingkungan.</li>
                    <li>Mempersiapkan siswa agar mampu bersaing secara global.</li>
                </ol>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/profil/visi.blade.php ENDPATH**/ ?>