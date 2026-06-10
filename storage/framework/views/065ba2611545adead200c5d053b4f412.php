<?php $__env->startSection('content'); ?>

<div class="card">
    <h3>Tambah Soal - <?php echo e($tugas->judul); ?></h3>

    <form method="POST" action="<?php echo e(route('guru.soal.store', $tugas->id)); ?>">
        <?php echo csrf_field(); ?>

        <textarea name="pertanyaan" placeholder="Pertanyaan" required></textarea>

        <input type="text" name="pilihan_a" placeholder="Pilihan A" required>
        <input type="text" name="pilihan_b" placeholder="Pilihan B" required>
        <input type="text" name="pilihan_c" placeholder="Pilihan C" required>
        <input type="text" name="pilihan_d" placeholder="Pilihan D" required>

        <select name="kunci_jawaban" required>
            <option value="">Pilih Kunci Jawaban</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>

        <input type="number" name="score" placeholder="Score" required>

        <button type="submit">Simpan Soal</button>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\guru\soal\create.blade.php ENDPATH**/ ?>