<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Buat Soal Pilihan Ganda
    </title>

    
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/tambah_pg.css')); ?>"
    >

</head>

<body>

    
    <div class="topbar">

        <a
            href="#"
            onclick="goBack()"
            class="back-btn"
        >

            <img
                src="/img/back.png"
                alt="Back"
            >

        </a>

        <div class="topbar-title">
            Manajemen Soal
        </div>

    </div>

    
    <div class="content">

        <div class="card">

            
            <?php if(!request('kelas_id') || !request('mapel') || !request('judul')): ?>

                <h3>
                    Pilih Kelas dan Mata Pelajaran
                </h3>

                <form method="GET">

                    
                    <label>
                        Pilih Kelas
                    </label>

                    <select
                        name="kelas_id"
                        required
                    >

                        <option value="">
                            Pilih kelas
                        </option>

                        <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($k->id); ?>">
                                <?php echo e($k->nama_kelas); ?>

                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                    <?php
$mapel = [
    'Bahasa Indonesia',
    'Fikih',
    "Al-Qur'an Hadits",
    'BTA',
    'Matematika',
    'PJOK',
    'Pendidikan Pancasila',
    'Bahasa Inggris',
    'Bahasa Arab',
    'Akidah Akhlak',
    'SKI',
    'Bahasa Jawa',
    'IPAS',
    'Aswaja',
    'SBK',
    'Kokurikuler',
    'Praktik Fikih',
    'Pengayaan Literasi dan Numerasi'
];
?>

<label>
    Pilih Mata Pelajaran
</label>

<select
    name="mapel"
    required
>

    <option value="">
        Pilih Mata Pelajaran
    </option>

    <?php $__currentLoopData = $mapel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <option value="<?php echo e($m); ?>">
            <?php echo e($m); ?>

        </option>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</select>
                    
                    <label>
                        Judul Tugas
                    </label>

                    <input
                        type="text"
                        name="judul"
                        required
                    >

                    
                    <label>
                        Instruksi Soal
                    </label>

                    <textarea
                        name="instruksi"
                        rows="2"
                        placeholder="Contoh: Pilih jawaban yang paling benar"
                    ><?php echo e(request('instruksi')); ?></textarea>

                    <button class="btn btn-primary">
                        Mulai Buat Soal
                    </button>

                </form>

            <?php else: ?>

                
                <h3>
                    Buat Soal
                </h3>

                <div class="info-box">

                    <b>Judul:</b> <?php echo e(request('judul')); ?>

                    <br>

                    <b>Mapel:</b> <?php echo e(request('mapel')); ?>

                    <br>

                    <b>Instruksi:</b> <?php echo e(request('instruksi')); ?>


                </div>

                <?php if(session('success_soal')): ?>

                    <div class="success-message">
                        <?php echo e(session('success_soal')); ?>

                    </div>

                <?php endif; ?>

                <form
                    action="<?php echo e(route('guru.simpan.pg')); ?>"
                    method="POST"
                >

                    <?php echo csrf_field(); ?>

                    
                    <input type="hidden" name="instruksi" value="<?php echo e(request('instruksi')); ?>">
                    <input type="hidden" name="kelas_id" value="<?php echo e(request('kelas_id')); ?>">
                    <input type="hidden" name="mapel" value="<?php echo e(request('mapel')); ?>">
                    <input type="hidden" name="judul" value="<?php echo e(request('judul')); ?>">
                    <input type="hidden" name="tugas_id" value="<?php echo e(request('tugas_id')); ?>">

                    
                    <label>
                        Pertanyaan
                    </label>

                    <textarea
                        name="pertanyaan"
                        rows="3"
                        required
                    ></textarea>

                    
                    <label>Opsi A</label>
                    <input type="text" name="opsi_a" required>

                    <label>Opsi B</label>
                    <input type="text" name="opsi_b" required>

                    <label>Opsi C</label>
                    <input type="text" name="opsi_c" required>

                    <label>Opsi D</label>
                    <input type="text" name="opsi_d" required>

                    
                    <label>
                        Jawaban Benar
                    </label>

                    <div class="jawaban-group">

                        <?php $__currentLoopData = ['A', 'B', 'C', 'D']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opsi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <label class="jawaban-item">

                                <input
                                    type="checkbox"
                                    name="jawaban_benar[]"
                                    value="<?php echo e($opsi); ?>"
                                >

                                <?php echo e($opsi); ?>


                            </label>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    
                    <label>
                        Nilai Soal
                    </label>

                    <input
                        type="number"
                        name="nilai"
                        required
                    >

                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        Tambah Soal
                    </button>

                </form>

                <hr>

                
                <h3>
    Daftar Soal
</h3>

<div class="table-wrapper">

    <table>

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Opsi Jawaban</th>
                            <th>Kunci</th>
                            <th>Nilai</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>

                                <td><?php echo e($loop->iteration); ?></td>

                                <td><?php echo e($s->pertanyaan); ?></td>

                                <td class="opsi-column">

                                    A. <?php echo e($s->opsi_a); ?> <br>
                                    B. <?php echo e($s->opsi_b); ?> <br>
                                    C. <?php echo e($s->opsi_c); ?> <br>
                                    D. <?php echo e($s->opsi_d); ?>


                                </td>

                                <td>
                                    <strong><?php echo e($s->jawaban_benar); ?></strong>
                                </td>

                                <td>
                                    <?php echo e($s->nilai); ?>

                                </td>

                                <td>

                                    <a
                                        href="<?php echo e(route('guru.edit.pg', $s->id)); ?>?kelas_id=<?php echo e(request('kelas_id')); ?>&mapel=<?php echo e(request('mapel')); ?>&judul=<?php echo e(request('judul')); ?>"
                                        class="btn btn-primary"
                                    >
                                        Edit
                                    </a>

                                    <br><br>

                                    <form
                                        action="<?php echo e(route('guru.hapus.pg', $s->id)); ?>"
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

                <br>

                
                <form
                    action="<?php echo e(route('guru.simpan.tugas')); ?>"
                    method="POST"
                >

                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="instruksi" value="<?php echo e(request('instruksi')); ?>">
                    <input type="hidden" name="kelas_id" value="<?php echo e(request('kelas_id')); ?>">
                    <input type="hidden" name="mapel" value="<?php echo e(request('mapel')); ?>">
                    <input type="hidden" name="judul" value="<?php echo e(request('judul')); ?>">

                    <button class="btn btn-success btn-full">
                        Simpan Tugas
                    </button>

                </form>

            <?php endif; ?>

        </div>

    </div>
</div>

    
    <div id="modalSuccess" class="modal-success">

        <div class="modal-box">

            <h3>
                CBT berhasil dibuat
            </h3>

            <button
                onclick="closeModal()"
                class="btn btn-success"
            >
                OK
            </button>

        </div>

    </div>

    
    <script>
        window.successTugas = <?php echo json_encode(session('success_tugas'), 15, 512) ?>;
        window.dashboardUrl = <?php echo json_encode(route('guru.dashboard'), 15, 512) ?>;
    </script>

    <script src="<?php echo e(asset('js/tambah_pg.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/guru/tambah_pg.blade.php ENDPATH**/ ?>