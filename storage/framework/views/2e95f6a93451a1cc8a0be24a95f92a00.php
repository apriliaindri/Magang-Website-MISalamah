<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Daftar Artikel</title>

    
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

    
    <header class="topbar">

        <div class="topbar-left">

            <a
                href="javascript:history.back()"
                class="back-btn"
            >

                <img
                    src="<?php echo e(asset('img/back.png')); ?>"
                    alt="Back"
                >

            </a>

            <h1 class="topbar-title">
                Daftar Artikel
            </h1>

        </div>

    </header>

    
    <main class="page-content">

        <div class="container">

            <div class="card">

                
                <div class="card-header">

                    <h2>
                        Daftar Artikel
                    </h2>

                    <a
                        href="<?php echo e(route('kepalasekolah.artikel.create')); ?>"
                        class="tambah-btn"
                    >

                        + Upload Artikel

                    </a>

                </div>

                
                <?php if(session('success')): ?>

                    <div class="alert-success">

                        <?php echo e(session('success')); ?>


                    </div>

                <?php endif; ?>

                
                <?php if($articles->count() > 0): ?>

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

                                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>

                                        
                                        <td>

                                            <?php echo e($loop->iteration); ?>


                                        </td>

                                        
                                        <td class="judul">

                                            <?php echo e($article->title); ?>


                                        </td>

                                        
                                        <td>

                                            <span class="badge badge-umum">

                                                <?php echo e($article->category); ?>


                                            </span>

                                        </td>

                                        
                                        <td>

                                            <?php echo e($article->created_at->format('d M Y')); ?>


                                        </td>

                                        
                                        <td>

                                            <div class="aksi">

                                                
                                                <a
                                                    href="<?php echo e(route('artikel.detail.artikel', $article->id)); ?>"
                                                    class="btn btn-detail"
                                                >

                                                    Detail

                                                </a>

                                                
                                                <a
                                                    href="<?php echo e(route('kepalasekolah.artikel.edit.artikel', $article->id)); ?>"
                                                    class="btn btn-edit"
                                                >

                                                    Edit

                                                </a>

                                                
<form
    action="<?php echo e(route('kepalasekolah.artikel.destroy', $article->id)); ?>"
    method="POST"
    onsubmit="return confirm('Yakin hapus artikel ini?')"
>

                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>

                                                    <button
                                                        type="submit"
                                                        class="btn btn-hapus"
                                                    >

                                                        Hapus

                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>

                        </table>

                    </div>

                <?php else: ?>

                    
                    <div class="empty">

                        Belum ada artikel.

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </main>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/kepalasekolah/artikel/index_artikel.blade.php ENDPATH**/ ?>