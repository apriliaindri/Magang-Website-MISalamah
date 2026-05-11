<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title ?? 'Website Sekolah'); ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo-area">
        <img src="<?php echo e(asset('img/LogoMI.png')); ?>" alt="Logo">
        <div class="school-name">MI Salamah</div>
    </div>

    <div class="nav-menu">

        <a href="<?php echo e(route('home')); ?>">Beranda</a>

        <!-- Profil -->
        <div class="dropdown">
            <a href="#" class="has-dropdown">Profil</a>
            <div class="dropdown-content">
                <a href="<?php echo e(route('visi')); ?>">Visi & Misi</a>
                <a href="<?php echo e(route('tatib')); ?>">Tata Tertib</a>
            </div>
        </div>

        <!-- Kelas -->
        <div class="dropdown">
            <a href="#" class="has-dropdown">Kelas</a>
            <div class="dropdown-content">
                <a href="<?php echo e(route('pilih.kelas', 1)); ?>">Kelas 1</a>
<a href="<?php echo e(route('pilih.kelas', 2)); ?>">Kelas 2</a>
<a href="<?php echo e(route('pilih.kelas', 3)); ?>">Kelas 3</a>
<a href="<?php echo e(route('pilih.kelas', 4)); ?>">Kelas 4</a>
<a href="<?php echo e(route('pilih.kelas', 5)); ?>">Kelas 5</a>
<a href="<?php echo e(route('pilih.kelas', 6)); ?>">Kelas 6</a>
            </div>
        </div>

<a href="#pengumuman">Pengumuman</a>
<a href="#artikel">Artikel</a>
 <a href="#footer">Kontak
    
 </a>
        <!-- AUTH -->
        <?php if(auth()->guard()->guest()): ?>
            <a href="<?php echo e(route('login')); ?>">Login</a>
        <?php endif; ?>

        <?php if(auth()->guard()->check()): ?>

            <?php if(auth()->user()->role == 'guru'): ?>
                <a href="<?php echo e(url('/guru')); ?>">Dashboard</a>
            <?php elseif(auth()->user()->role == 'admin'): ?>
                <a href="<?php echo e(url('/admin')); ?>">Dashboard</a>
            <?php elseif(auth()->user()->role == 'kepala_sekolah'): ?>
                <a href="<?php echo e(url('/kepsek')); ?>">Dashboard</a>
            <?php elseif(auth()->user()->role == 'siswa'): ?>
                <a href="<?php echo e(url('/siswa')); ?>">Dashboard</a>
            <?php endif; ?>

            <form action="<?php echo e(route('logout')); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <button type="submit" style="background:none;border:none;cursor:pointer;font-family:Poppins;">
                    Logout
                </button>
            </form>

        <?php endif; ?>

    </div>
</div>

<!-- CONTENT -->
<div class="main-content">
    <?php echo $__env->yieldContent('content'); ?>
</div>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/layouts/app.blade.php ENDPATH**/ ?>