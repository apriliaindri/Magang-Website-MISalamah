<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>CBT Pilihan Ganda</title>

    
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/cbt_pg.css')); ?>"
    >

</head>

<body>

    
    <div class="header">

        <h2>
            <?php echo e($judul); ?>

        </h2>

        <p>
            Kelas : <?php echo e($kelas->nama_kelas); ?>

        </p>

        <p>
            Mapel : <?php echo e($mapel); ?>

        </p>

    </div>

    
    <div class="container">

        
        <div class="soal-area">

            <?php if($soal->count() == 0): ?>

                <p>Tidak ada soal</p>

            <?php else: ?>

                <?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div
                        class="soal-item"
                        id="soal<?php echo e($index); ?>"
                        style="<?php echo e($index == 0 ? '' : 'display:none'); ?>"
                    >

                        <h3>
                            Soal <?php echo e($index + 1); ?>

                        </h3>

                        <p>
                            <?php echo e($s->pertanyaan); ?>

                        </p>

                        <div class="opsi">

                            <?php

                                $kunci = explode(',', $s->jawaban_benar);

                                $isMultiple = count($kunci) > 1;

                            ?>

                            <?php if($isMultiple): ?>

                                
                                <label>
                                    <input
                                        type="checkbox"
                                        name="jawaban[<?php echo e($s->id); ?>][]"
                                        value="A"
                                    >
                                    A. <?php echo e($s->opsi_a); ?>

                                </label>

                                <label>
                                    <input
                                        type="checkbox"
                                        name="jawaban[<?php echo e($s->id); ?>][]"
                                        value="B"
                                    >
                                    B. <?php echo e($s->opsi_b); ?>

                                </label>

                                <label>
                                    <input
                                        type="checkbox"
                                        name="jawaban[<?php echo e($s->id); ?>][]"
                                        value="C"
                                    >
                                    C. <?php echo e($s->opsi_c); ?>

                                </label>

                                <label>
                                    <input
                                        type="checkbox"
                                        name="jawaban[<?php echo e($s->id); ?>][]"
                                        value="D"
                                    >
                                    D. <?php echo e($s->opsi_d); ?>

                                </label>

                            <?php else: ?>

                                
                                <label>
                                    <input
                                        type="radio"
                                        name="jawaban[<?php echo e($s->id); ?>][]"
                                        value="A"
                                    >
                                    A. <?php echo e($s->opsi_a); ?>

                                </label>

                                <label>
                                    <input
                                        type="radio"
                                        name="jawaban[<?php echo e($s->id); ?>][]"
                                        value="B"
                                    >
                                    B. <?php echo e($s->opsi_b); ?>

                                </label>

                                <label>
                                    <input
                                        type="radio"
                                        name="jawaban[<?php echo e($s->id); ?>][]"
                                        value="C"
                                    >
                                    C. <?php echo e($s->opsi_c); ?>

                                </label>

                                <label>
                                    <input
                                        type="radio"
                                        name="jawaban[<?php echo e($s->id); ?>][]"
                                        value="D"
                                    >
                                    D. <?php echo e($s->opsi_d); ?>

                                </label>

                            <?php endif; ?>

                        </div>

                        
                        <div class="footer">

                            <?php if($index > 0): ?>

                                <button
                                    class="btn-prev"
                                    onclick="prevSoal(<?php echo e($index); ?>)"
                                >
                                    Sebelumnya
                                </button>

                            <?php endif; ?>

                            <?php if($index < count($soal) - 1): ?>

                                <button
                                    class="btn-next"
                                    onclick="nextSoal(<?php echo e($index); ?>)"
                                >
                                    Berikutnya
                                </button>

                            <?php endif; ?>

                        </div>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>

        </div>

        
        <div class="nav-area">

            <h4>
                Navigasi Soal
            </h4>

            <div class="nomor-grid">

                <?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div
                        class="nomor <?php echo e($index == 0 ? 'active' : ''); ?>"
                        onclick="lompatSoal(<?php echo e($index); ?>)"
                        id="nav<?php echo e($index); ?>"
                    >

                        <?php echo e($index + 1); ?>


                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <button class="btn-selesai">
                Selesai Ujian
            </button>

        </div>

    </div>

    
    <script src="<?php echo e(asset('js/cbt_pg.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/guru/detail_tugas.blade.php ENDPATH**/ ?>