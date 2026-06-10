<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Pilih Mapel
    </title>

    
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/pilih_mapel.css')); ?>"
    >

</head>

<body>

    
    <h2>
        Mapel - <?php echo e($kelas->nama_kelas); ?>

    </h2>

    
    <?php $__currentLoopData = $mapel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <a
            class="mapel"
            href="/tugas/mapel/<?php echo e($kelas->id); ?>/<?php echo e($m->mapel); ?>"
        >

            <?php echo e($m->mapel); ?>


        </a>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <script src="<?php echo e(asset('js/pilih_mapel.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\guru\mapel.blade.php ENDPATH**/ ?>