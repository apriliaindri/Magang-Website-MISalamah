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
                <?php for($i = 1; $i <= 6; $i++): ?>
                    <a href="<?php echo e(route('pilih.kelas', $i)); ?>">
                        Kelas <?php echo e($i); ?>

                    </a>
                <?php endfor; ?>
            </div>
        </div>

        <a href="#pengumuman">Pengumuman</a>
        <a href="#artikel">Artikel</a>
        <a href="#footer">Kontak</a>

        <?php if(auth()->guard()->guest()): ?>
            <a href="<?php echo e(route('login')); ?>">Login</a>
        <?php endif; ?>

        <?php if(auth()->guard()->check()): ?>

            <?php
                $role = auth()->user()->role;
            ?>

            <a href="<?php echo e(match($role) {
                'guru' => url('/guru'),
                'admin' => url('/admin'),
                'kepala_sekolah' => url('/kepalasekolah'),
                'siswa' => url('/siswa'),
                default => '#'
            }); ?>">
                Dashboard
            </a>

            <form action="<?php echo e(route('logout')); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>

                <button
                    type="submit"
                    style="background:none;border:none;cursor:pointer;font-family:Poppins;"
                >
                    Logout
                </button>
            </form>

        <?php endif; ?>

    </div>

</div>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\partials\navbar.blade.php ENDPATH**/ ?>