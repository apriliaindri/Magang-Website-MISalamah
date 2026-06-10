<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Daftar Tugas</title>

    
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/daftar_tugas.css')); ?>"
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
                src="<?php echo e(asset('img/back.png')); ?>"
                alt="Back"
            >

        </a>

        <div class="topbar-title">
            Daftar Tugas
        </div>

    </div>

    
    <div class="card">

        <h2>
            Daftar Tugas
        </h2>

        <table>

            <thead>

                <tr>

                    <th>No</th>
                    <th>Judul</th>
                    <th>Mapel</th>
                    <th>Kelas</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                <?php $__currentLoopData = $tugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>

                        <td>
                            <?php echo e($loop->iteration); ?>

                        </td>

                        <td>
                            <?php echo e($t->judul); ?>

                        </td>

                        <td>
                            <?php echo e($t->mapel); ?>

                        </td>

                        <td>
                            <?php echo e($t->nama_kelas); ?>

                        </td>

                        <td>

                            
                            <a
                                href="<?php echo e(route('guru.tugas.detail', [
                                    'judul' => $t->judul,
                                    'kelas' => $t->kelas_id,
                                    'mapel' => $t->mapel
                                ])); ?>"
                            >

                                <button class="btn btn-primary">
                                    Lihat CBT
                                </button>

                            </a>

                            <br><br>

                            
                            <a
                                href="<?php echo e(route('guru.nilai', [
                                    'judul' => $t->judul,
                                    'kelas' => $t->kelas_id,
                                    'mapel' => $t->mapel
                                ])); ?>"
                            >

                                <button class="btn btn-success">
                                    Lihat Nilai
                                </button>

                            </a>

                            <br><br>

                            
                            <form
                                action="<?php echo e(route('tugas.delete', $t->id)); ?>"
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

    <script>
    const guruDashboardUrl = "<?php echo e(route('guru.dashboard')); ?>";
</script>

    
    <script src="<?php echo e(asset('js/daftar_tugas.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\guru\daftar_tugas.blade.php ENDPATH**/ ?>