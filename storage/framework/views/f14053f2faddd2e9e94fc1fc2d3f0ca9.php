<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CBT Pilihan Ganda</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/soal.css')); ?>">
</head>

<body>


<div class="header">
    <h2><?php echo e($tugas->judul); ?></h2>

    <p>
        Kelas : <?php echo e($kelas->nama_kelas); ?> <br>
        Mapel : <?php echo e($tugas->mapel); ?>

    </p>

    <?php if($tugas->instruksi): ?>
        <p class="instruksi">
            * <?php echo e($tugas->instruksi); ?>

        </p>
    <?php endif; ?>
</div>

<form method="POST" action="<?php echo e(route('siswa.soal.submit')); ?>">
    <?php echo csrf_field(); ?>

    <input type="hidden" name="kelas_id" value="<?php echo e($kelas->id); ?>">
    <input type="hidden" name="mapel" value="<?php echo e($tugas->mapel); ?>">
    <input type="hidden" name="tugas_id" value="<?php echo e($tugas->id); ?>">

    <div class="container">

        
        <div class="soal-area">

            <?php $__empty_1 = true; $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <?php
                    $kunci = json_decode($s->jawaban_benar, true);
                    $kunci = is_array($kunci) ? $kunci : [$s->jawaban_benar];

                    $isMultiple = count($kunci) > 1;
                ?>

                <div
                    class="soal-item"
                    id="soal<?php echo e($index); ?>"
                    style="<?php echo e($index === 0 ? '' : 'display:none'); ?>"
                >

                    <h3>Soal <?php echo e($index + 1); ?></h3>
                    <p><?php echo e($s->pertanyaan); ?></p>

                    <div class="opsi">

                        <?php $__currentLoopData = ['A','B','C','D']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opsi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <label>

                                <?php if($isMultiple): ?>

                                    <input
                                        type="checkbox"
                                        name="jawaban[<?php echo e($s->id); ?>][]"
                                        value="<?php echo e($opsi); ?>"
                                        data-soal="<?php echo e($s->id); ?>"
                                    >

                                <?php else: ?>

                                    <input
                                        type="radio"
                                        name="jawaban[<?php echo e($s->id); ?>]"
                                        value="<?php echo e($opsi); ?>"
                                        data-soal="<?php echo e($s->id); ?>"
                                    >

                                <?php endif; ?>

                                <?php echo e($opsi); ?>. <?php echo e($s->{'opsi_' . strtolower($opsi)}); ?>


                            </label>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <div class="footer">

                        <?php if($index > 0): ?>
                            <button type="button" class="btn-prev" data-index="<?php echo e($index); ?>">
                                Sebelumnya
                            </button>
                        <?php endif; ?>

                        <?php if($index < count($soal) - 1): ?>
                            <button type="button" class="btn-next" data-index="<?php echo e($index); ?>">
                                Berikutnya
                            </button>
                        <?php endif; ?>

                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p>Tidak ada soal</p>
            <?php endif; ?>

        </div>

        
        <div class="nav-area">

            <h4>Navigasi Soal</h4>

            <div class="nomor-grid">

                <?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div
                        class="nomor <?php echo e($index === 0 ? 'active' : ''); ?>"
                        id="nav<?php echo e($index); ?>"
                        data-index="<?php echo e($index); ?>"
                    >
                        <?php echo e($index + 1); ?>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <?php if(!$sudah): ?>
                <button type="button" class="btn-selesai">
                    Selesai Ujian
                </button>
            <?php else: ?>
                <button type="button" class="btn-selesai" disabled>
                    Sudah Dikerjakan
                </button>
            <?php endif; ?>

        </div>

    </div>
</form>


<script src="<?php echo e(asset('js/soal.js')); ?>"></script>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/siswa/soal.blade.php ENDPATH**/ ?>