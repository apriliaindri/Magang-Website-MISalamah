<?php $__env->startSection('content'); ?>

    <div class="container-pg">

        
        <h2 class="page-title">
            Buat Soal Pilihan Ganda
        </h2>

        
        <?php if(session('success')): ?>

            <div class="alert-success">
                <?php echo e(session('success')); ?>

            </div>

        <?php endif; ?>

        
        <form
            action="<?php echo e(route('simpan.pg')); ?>"
            method="POST"
        >

            <?php echo csrf_field(); ?>

            <input
                type="hidden"
                name="tugas_id"
                value="<?php echo e(request('tugas_id')); ?>"
            >

            <div class="form-card">

                
                <label>
                    Pertanyaan
                </label>

                <textarea
                    name="pertanyaan"
                    class="form-control"
                ></textarea>

                <br>

                
                <label>
                    Score Soal
                </label>

                <input
                    type="number"
                    name="score"
                    value="10"
                    class="form-control"
                >

                <br>

                
                <label>
                    Opsi A
                </label>

                <input
                    type="text"
                    name="opsi_a"
                    class="form-control"
                >

                <label>
                    Opsi B
                </label>

                <input
                    type="text"
                    name="opsi_b"
                    class="form-control"
                >

                <label>
                    Opsi C
                </label>

                <input
                    type="text"
                    name="opsi_c"
                    class="form-control"
                >

                <label>
                    Opsi D
                </label>

                <input
                    type="text"
                    name="opsi_d"
                    class="form-control"
                >

                <br>

                
                <label>
                    Jawaban Benar
                </label>

                <select
                    name="jawaban_benar"
                    class="form-control"
                >

                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>

                </select>

                <br>

                
                <button class="btn btn-success">
                    Simpan Soal
                </button>

            </div>

        </form>

        
        <form
            action="<?php echo e(route('publish.pg')); ?>"
            method="POST"
            class="publish-form"
        >

            <?php echo csrf_field(); ?>

            <input
                type="hidden"
                name="tugas_id"
                value="<?php echo e(request('tugas_id')); ?>"
            >

            <button class="btn btn-primary">
                Publish ke Siswa
            </button>

        </form>

        
        <h3 class="section-title">
            Daftar Soal
        </h3>

        <table class="table-soal">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Pertanyaan</th>
                    <th>Score</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                <?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>

                        <td>
                            <?php echo e($loop->iteration); ?>

                        </td>

                        <td>
                            <?php echo e($s->pertanyaan); ?>

                        </td>

                        <td>
                            <?php echo e($s->score); ?>

                        </td>

                        <td>

                            <form
                                action="<?php echo e(route('hapus.pg', $s->id)); ?>"
                                method="POST"
                            >

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button class="btn btn-danger">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

    </div>

    
    <script src="<?php echo e(asset('js/buat_pg.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\guru\soalpg.blade.php ENDPATH**/ ?>