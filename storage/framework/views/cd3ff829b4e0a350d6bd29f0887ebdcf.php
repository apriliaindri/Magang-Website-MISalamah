<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CBT Pilihan Ganda</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/cbt.css')); ?>">
</head>

<body>

<?php if(!$tugas): ?>
    <p style="padding:20px;">Tugas tidak ditemukan</p>
<?php else: ?>


<div class="header">
    <h2><?php echo e($tugas->judul); ?></h2>

    <p>
        Kelas : <?php echo e($kelas->nama_kelas); ?> <br>
        Mapel : <?php echo e($tugas->mapel); ?>

    </p>

    <p style="color:gray;font-size:13px;">
        * Beberapa soal dapat memiliki lebih dari satu jawaban benar
    </p>
</div>

<form method="POST" action="<?php echo e(route('siswa.soal.submit')); ?>">
    <?php echo csrf_field(); ?>

    <input type="hidden" name="tugas_id" value="<?php echo e($tugas->id); ?>">
    <input type="hidden" name="kelas_id" value="<?php echo e($kelas->id); ?>">
    <input type="hidden" name="mapel" value="<?php echo e($tugas->mapel); ?>">

    <div class="container">

        
        <div class="soal-area">

            <?php $__empty_1 = true; $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <?php
                    $kunci = json_decode($s->jawaban_benar, true);
                    $kunci = is_array($kunci) ? $kunci : [$s->jawaban_benar];

                    $isMultiple = count($kunci) > 1;

                    $jawabanDraft = isset($draft[$s->id])
                        ? json_decode($draft[$s->id], true)
                        : null;
                ?>

                <div class="soal-item <?php echo e($loop->first ? 'active' : ''); ?>" id="soal<?php echo e($index); ?>">

                    <h3>Soal <?php echo e($index + 1); ?></h3>

                    <p><?php echo e($s->pertanyaan); ?></p>

                    <div class="opsi">

                        <?php $__currentLoopData = ['A','B','C','D']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <label>

                                <?php if($isMultiple): ?>

                                    <input
                                        type="checkbox"
                                        name="jawaban[<?php echo e($s->id); ?>][]"
                                        value="<?php echo e($opt); ?>"
                                        <?php echo e(is_array($jawabanDraft) && in_array($opt, $jawabanDraft) ? 'checked' : ''); ?>

                                    >

                                <?php else: ?>

                                    <input
                                        type="radio"
                                        name="jawaban[<?php echo e($s->id); ?>]"
                                        value="<?php echo e($opt); ?>"
                                        <?php echo e($jawabanDraft == $opt ? 'checked' : ''); ?>

                                    >

                                <?php endif; ?>

                                <?php echo e($opt); ?>. <?php echo e($s->{'opsi_' . strtolower($opt)}); ?>


                            </label>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <div class="footer">

                        <?php if(!$loop->first): ?>
                            <button type="button" class="btn-prev" data-index="<?php echo e($index); ?>">
                                Sebelumnya
                            </button>
                        <?php endif; ?>

                        <?php if(!$loop->last): ?>
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
                        class="nomor <?php echo e($loop->first ? 'active' : ''); ?>"
                        id="nav<?php echo e($index); ?>"
                        data-index="<?php echo e($index); ?>"
                    >
                        <?php echo e($index + 1); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <button type="button" class="btn-selesai">
                Selesai Ujian
            </button>

        </div>

    </div>
</form>

<?php endif; ?>


<script src="<?php echo e(asset('js/cbt.js')); ?>"></script>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\siswa\soal\tugas.blade.php ENDPATH**/ ?>