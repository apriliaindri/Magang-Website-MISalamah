<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Daftar Soal
    </title>

    
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/daftar_soal.css')); ?>"
    >

</head>

<body>

    
    <h2>
        Daftar Soal - <?php echo e($mapel); ?>

    </h2>

    
    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Nilai</th>

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
                        <?php echo e($s->jawaban_benar); ?>

                    </td>

                    <td>
                        <?php echo e($s->nilai); ?>

                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>

</body>

</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\guru\tugas.blade.php ENDPATH**/ ?>