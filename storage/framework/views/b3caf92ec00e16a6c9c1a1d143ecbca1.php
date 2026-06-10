<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Soal</title>

    
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/edit_soal.css')); ?>"
    >

</head>

<body>

    <div class="content">

        <div class="card">

            <h3>
                Edit Soal
            </h3>

            <form
                action="<?php echo e(route('guru.update.pg', $soal->id)); ?>"
                method="POST"
            >

                <?php echo csrf_field(); ?>

                
                <input
                    type="hidden"
                    name="kelas_id"
                    value="<?php echo e(request('kelas_id')); ?>"
                >

                <input
                    type="hidden"
                    name="mapel"
                    value="<?php echo e(request('mapel')); ?>"
                >

                <input
                    type="hidden"
                    name="judul"
                    value="<?php echo e(request('judul')); ?>"
                >

                
                <label>
                    Judul
                </label>

                <input
                    type="text"
                    name="judul"
                    value="<?php echo e($soal->judul); ?>"
                    required
                >

                
                <label>
                    Pertanyaan
                </label>

                <textarea
                    name="pertanyaan"
                    rows="3"
                ><?php echo e($soal->pertanyaan); ?></textarea>

                
                <label>
                    Opsi A
                </label>

                <input
                    type="text"
                    name="opsi_a"
                    value="<?php echo e($soal->opsi_a); ?>"
                >

                
                <label>
                    Opsi B
                </label>

                <input
                    type="text"
                    name="opsi_b"
                    value="<?php echo e($soal->opsi_b); ?>"
                >

                
                <label>
                    Opsi C
                </label>

                <input
                    type="text"
                    name="opsi_c"
                    value="<?php echo e($soal->opsi_c); ?>"
                >

                
                <label>
                    Opsi D
                </label>

                <input
                    type="text"
                    name="opsi_d"
                    value="<?php echo e($soal->opsi_d); ?>"
                >

                
                <label>
                    Jawaban Benar
                </label>

                <div class="jawaban-group">

                    <label class="jawaban-item">

                        <input
                            type="checkbox"
                            name="jawaban_benar[]"
                            value="A"
                        >

                        A

                    </label>

                    <label class="jawaban-item">

                        <input
                            type="checkbox"
                            name="jawaban_benar[]"
                            value="B"
                        >

                        B

                    </label>

                    <label class="jawaban-item">

                        <input
                            type="checkbox"
                            name="jawaban_benar[]"
                            value="C"
                        >

                        C

                    </label>

                    <label class="jawaban-item">

                        <input
                            type="checkbox"
                            name="jawaban_benar[]"
                            value="D"
                        >

                        D

                    </label>

                </div>

                
                <label>
                    Nilai
                </label>

                <input
                    type="number"
                    name="nilai"
                    value="<?php echo e($soal->nilai); ?>"
                >

                
                <button class="btn btn-success">
                    Update Soal
                </button>

            </form>

        </div>

    </div>

    
    <script src="<?php echo e(asset('js/edit_soal.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\guru\edit_pg.blade.php ENDPATH**/ ?>