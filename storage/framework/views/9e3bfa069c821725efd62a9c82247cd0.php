<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Nilai Siswa
    </title>

    
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/nilai_siswa.css')); ?>"
    >

</head>

<body>

    <div class="card">

        
        <h2>
            Nilai Siswa
        </h2>

        
        <p>
            <b>Judul:</b> <?php echo e($judul); ?>

        </p>

        
        <table>

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Nilai</th>

                </tr>

            </thead>

            <tbody>

                <?php $__currentLoopData = $nilai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>

                        <td>
                            <?php echo e($loop->iteration); ?>

                        </td>

                        <td>
                            <?php echo e($n->nama_siswa); ?>

                        </td>

                        <td>
                            <b><?php echo e($n->score); ?></b>
                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

    </div>

    
    <script src="<?php echo e(asset('js/nilai_siswa.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/guru/nilai.blade.php ENDPATH**/ ?>