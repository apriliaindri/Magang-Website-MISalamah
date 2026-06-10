<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Pengumuman</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/pengumuman_index.css')); ?>"
    >
</head>

<body>


<div class="topbar">
    <div class="topbar-left">

        <a href="<?php echo e(url()->previous()); ?>" class="back-btn">
            <img src="<?php echo e(asset('img/back.png')); ?>" alt="Back">
        </a>

        <div class="topbar-title">
            Daftar Pengumuman
        </div>

    </div>
</div>


<div class="page-content">
    <div class="container">

        <div class="card">

            
            <div class="card-header">

                <h2>Daftar Pengumuman</h2>

                <a href="<?php echo e(route('pengumuman.create')); ?>" class="tambah-btn">
                    + Tambah Pengumuman
                </a>

            </div>

            
            <?php if(session('success')): ?>
                <div class="alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            
            <?php $__empty_1 = true; $__currentLoopData = $pengumuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <?php if($loop->first): ?>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                <?php endif; ?>

                <tr>

                    <td><?php echo e($loop->iteration); ?></td>

                    <td class="judul">
                        <?php echo e($p->judul); ?>

                    </td>

                    <td>
                        <?php if($p->kelas_id): ?>
                            <span class="badge badge-kelas">
                                Kelas <?php echo e($p->kelas_id); ?>

                            </span>
                        <?php else: ?>
                            <span class="badge badge-semua-kelas">
                                Semua Kelas
                            </span>
                        <?php endif; ?>
                    </td>

                    <td>
                        <?php echo e($p->created_at->format('d M Y')); ?>

                    </td>

                    <td>
                        <div class="aksi">

                            <a
                                href="<?php echo e(route('pengumuman.detail.pengumuman', $p->id)); ?>"
                                class="btn btn-detail"
                            >
                                Detail
                            </a>

                            <a
                                href="<?php echo e(route('pengumuman.edit', $p->id)); ?>"
                                class="btn btn-edit"
                            >
                                Edit
                            </a>

                            <form
                                action="<?php echo e(route('pengumuman.destroy', $p->id)); ?>"
                                method="POST"
                                class="delete-form"
                            >
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button type="submit" class="btn btn-hapus">
                                    Hapus
                                </button>

                            </form>

                        </div>
                    </td>

                </tr>

                <?php if($loop->last): ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="empty">
                    Belum ada pengumuman.
                </div>

            <?php endif; ?>

        </div>

    </div>
</div>


<script src="<?php echo e(asset('js/pengumuman_index.js')); ?>"></script>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\pengumuman\index.blade.php ENDPATH**/ ?>