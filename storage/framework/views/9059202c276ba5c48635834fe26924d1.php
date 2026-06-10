<?php $__env->startSection('content'); ?>

<div class="container">
    <h2>Daftar Soal</h2>

    <?php if($soals->count() > 0): ?>

        <?php $__currentLoopData = $soals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="margin-bottom: 20px; padding:10px; border:1px solid #ccc;">
                <strong><?php echo e($loop->iteration); ?>. <?php echo e($soal->pertanyaan); ?></strong>

                <p>A. <?php echo e($soal->pilihan_a); ?></p>
                <p>B. <?php echo e($soal->pilihan_b); ?></p>
                <p>C. <?php echo e($soal->pilihan_c); ?></p>
                <p>D. <?php echo e($soal->pilihan_d); ?></p>

                <p><strong>Kunci:</strong> <?php echo e($soal->kunci_jawaban); ?></p>
                <p><strong>Score:</strong> <?php echo e($soal->score); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php else: ?>
        <p>Belum ada soal.</p>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\guru\soal\index.blade.php ENDPATH**/ ?>