<?php $__env->startSection('content'); ?>

<div class="container">
    <h2>Rekap Nilai Siswa</h2>

    <?php if($jawabans->count() > 0): ?>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban Siswa</th>
                    <th>Nilai</th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $jawabans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($j->user->name); ?></td>
                        <td><?php echo e($j->soal->pertanyaan); ?></td>
                        <td><?php echo e($j->jawaban); ?></td>
                        <td><?php echo e($j->nilai); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    <?php else: ?>
        <p>Belum ada siswa yang mengerjakan.</p>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\guru\soal\hasil.blade.php ENDPATH**/ ?>