<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Dashboard Kelas
    </title>

    
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/dashboard-kelas.css')); ?>"
    >

</head>

<body>

    
    <div class="topbar">

        <div
            class="hamburger"
            onclick="toggleSidebar()"
        >
            ☰
        </div>

        <div class="topbar-title">

            Selamat Datang,
            <?php echo e(auth()->user()->name); ?>


        </div>

    </div>

    
    <div
        class="sidebar"
        id="sidebar"
    >

        
        <div class="profile-card">

            <img
                src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                alt="Profile"
            >

            <div>

                <h3>
                    <?php echo e(auth()->user()->name); ?>

                </h3>

                <p>
                    <?php echo e(auth()->user()->role); ?>

                </p>

                <p>
                    <?php echo e($kelas->nama_kelas); ?>

                </p>

            </div>

        </div>

        
        <button onclick="showTugas()">
            Daftar Tugas
        </button>

        <button onclick="showPengumuman()">
            Daftar Pengumuman
        </button>

        
        <form
            action="<?php echo e(route('logout')); ?>"
            method="POST"
        >

            <?php echo csrf_field(); ?>

            <button class="logout-btn">
                Logout
            </button>

        </form>

    </div>

    
    <div class="content">

        
        <div id="blank-state">

            <p class="blank-text">
                Silakan pilih menu di sidebar untuk melihat konten
            </p>

        </div>

        
        <div
            id="tugas"
            class="hidden"
        >

            <?php if($kelas->tugas->count()): ?>

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
                                <th>Nilai</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $__currentLoopData = $kelas->tugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tugas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php

                                    $hasil = \App\Models\HasilTugas::where('user_id', auth()->id())
                                        ->where('kelas_id', $kelas->id)
                                        ->where('judul_tugas', $tugas->judul)
                                        ->first();

                                ?>

                                <tr>

                                    <td>
                                        <?php echo e($loop->iteration); ?>

                                    </td>

                                    <td>
                                        <?php echo e($tugas->judul); ?>

                                    </td>

                                    <td>
                                        <?php echo e($tugas->mapel); ?>

                                    </td>

                                    <td>
                                        <?php echo e($kelas->nama_kelas); ?>

                                    </td>

                                    <td>

                                        <?php if(!$hasil): ?>

                                            <a href="<?php echo e(route('siswa.soal', $tugas->id)); ?>">

                                                <button class="btn btn-primary">
                                                    Kerjakan
                                                </button>

                                            </a>

                                        <?php else: ?>

                                            <button disabled>
                                                Selesai
                                            </button>

                                        <?php endif; ?>

                                    </td>

                                    <td>

                                        <?php if($hasil): ?>

                                            <b class="nilai-success">
                                                <?php echo e($hasil->score); ?>

                                            </b>

                                        <?php else: ?>

                                            -

                                        <?php endif; ?>

                                    </td>

                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>

                    </table>

                </div>

            <?php else: ?>

                <p>
                    Tidak ada tugas
                </p>

            <?php endif; ?>

        </div>

        
        <div
            id="pengumuman"
            class="hidden"
        >

            <?php if($pengumuman->count()): ?>

                <div class="pengumuman-grid">

                    <?php $__currentLoopData = $pengumuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php

                            $gambar = is_array($p->gambar)
                                ? $p->gambar
                                : json_decode($p->gambar, true) ?? [];

                            $filePertama = $gambar[0] ?? null;

                            $ext = $filePertama
                                ? strtolower(pathinfo($filePertama, PATHINFO_EXTENSION))
                                : null;

                        ?>

                        <a
                            href="<?php echo e(route('pengumuman.detail.pengumuman', $p->id)); ?>"
                            class="pengumuman-card"
                        >

                            
                            <div class="card-image">

                                <?php if($filePertama): ?>

                                    <?php if(in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])): ?>

                                        <img
                                            src="<?php echo e(asset('storage/' . $filePertama)); ?>"
                                            alt="Thumbnail"
                                        >

                                    <?php elseif($ext == 'pdf'): ?>

                                        <div class="pdf-preview">

                                            <img
                                                src="<?php echo e(asset('img/pdf-icon.png')); ?>"
                                                alt="PDF"
                                            >

                                            <span>
                                                PDF Document
                                            </span>

                                        </div>

                                    <?php else: ?>

                                        <img
                                            src="<?php echo e(asset('img/default-news.jpg')); ?>"
                                            alt="Default"
                                        >

                                    <?php endif; ?>

                                <?php else: ?>

                                    <img
                                        src="<?php echo e(asset('img/default-news.jpg')); ?>"
                                        alt="Default"
                                    >

                                <?php endif; ?>

                            </div>

                            
                            <div class="pengumuman-content">

                                <div class="info-row">

                                    <span class="kategori-home">

                                        <?php echo e($p->kelas ? $p->kelas->nama_kelas : 'Semua Kelas'); ?>


                                    </span>

                                    <span class="tanggal">

                                        <?php echo e($p->created_at->format('d M Y')); ?>


                                    </span>

                                </div>

                                <h3>

                                    <?php echo e(\Illuminate\Support\Str::limit($p->judul, 60)); ?>


                                </h3>

                                <p>

                                    <?php echo e(\Illuminate\Support\Str::limit(strip_tags($p->isi), 100)); ?>


                                </p>

                            </div>

                        </a>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            <?php else: ?>

                <p>
                    Tidak ada pengumuman
                </p>

            <?php endif; ?>

        </div>

    </div>

    
    <script src="<?php echo e(asset('js/dashboard_kelas.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/kelas/dashboard.blade.php ENDPATH**/ ?>