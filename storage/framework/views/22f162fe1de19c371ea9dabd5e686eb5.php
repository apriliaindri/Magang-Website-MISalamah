<?php $__env->startSection('content'); ?>
<section class="login-section">
    <div class="login-box">

        <h2>Masukkan Kode Kelas</h2>

        <form method="POST" action="<?php echo e(route('siswa.kode.cek', $kelas->id)); ?>">
            <?php echo csrf_field(); ?>

            <input type="text" name="kode_kelas"
                   placeholder="Masukkan kode kelas" required>

            <button type="submit">Masuk</button>

            <?php if(session('error')): ?>
                <p class="error"><?php echo e(session('error')); ?></p>
            <?php endif; ?>
        </form>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/auth/kode_kelas.blade.php ENDPATH**/ ?>