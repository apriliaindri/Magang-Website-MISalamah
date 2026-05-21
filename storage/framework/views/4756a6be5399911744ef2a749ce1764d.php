<?php $__env->startSection('content'); ?>


<section class="hero">
    <div class="hero-wrapper">

        <div class="hero-text">
            <h1>Selamat Datang di</h1>
            <h2>MI Salamah</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <div class="hero-image">
            <img src="<?php echo e(asset('img/LogoMI.png')); ?>" alt="Foto Sekolah">
        </div>

    </div>
</section>

<div class="main-sections">

    
    <section class="section stats-section">
        <div class="stats-container">

            <div class="stat-box">
                <h2 class="counter" data-target="300">0</h2>
                <p>Jumlah Siswa</p>
            </div>

            <div class="stat-box">
                <h2 class="counter" data-target="50">0</h2>
                <p>Jumlah Guru</p>
            </div>

        </div>
    </section>


<section id="pengumuman" class="section pengumuman-section">

    <div class="container">

        <div class="pengumuman-header">
            <h2>Pengumuman</h2>
            <div class="header-line"></div>

            <a href="<?php echo e(route('pengumuman.daftar.pengumuman')); ?>" class="lihat-semua">
                Lihat semua
            </a>
        </div>

        <?php
            $pengumumanItems = $pengumuman->take(9);
        ?>

        <?php if($pengumumanItems->count()): ?>

        <div class="pengumuman-slider-wrapper">

            <button class="slide-btn prev-btn" id="prevPengumuman">
                &#10094;
            </button>

            <div class="pengumuman-slider" id="pengumumanSlider">

                <?php $__currentLoopData = $pengumumanItems->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="pengumuman-slide">

                        <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php echo $__env->make('partials.card_pengumuman', ['p' => $p], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <button class="slide-btn next-btn" id="nextPengumuman">
                &#10095;
            </button>

        </div>

        <?php endif; ?>

    </div>

</section>

    
    <section id="artikel" class="section artikel-section">

        <div class="container">

            <div class="artikel-header">
                <h2>Artikel</h2>
                <div class="header-line"></div>

                <a href="<?php echo e(route('artikel.daftar.artikel')); ?>" class="lihat-semua">
                    Lihat semua
                </a>
            </div>

          <?php
    $artikelItems = $articles->take(9);
?>

<?php if($artikelItems->count()): ?>

<div class="artikel-slider-wrapper">

    <button class="slide-btn artikel-prev-btn" id="prevArtikel">
        &#10094;
    </button>

    <button class="slide-btn artikel-next-btn" id="nextArtikel">
        &#10095;
    </button>

    <div class="artikel-slider" id="artikelSlider">

        <?php $__currentLoopData = $artikelItems->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="artikel-slide">

                <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php echo $__env->make('partials.card_artikel', ['a' => $a], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

</div>

<?php endif; ?>

    </section>

    
    <section id="footer" class="section">

        <div class="container footer-wrapper">

            <div class="footer-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.3924063860295!2d110.85806027400474!3d-7.532108692481065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a170badcda4e5%3A0xfbc227bc5df3acc5!2sMI%20Salamah%20Sulurejo!5e0!3m2!1sen!2sus!4v1778482707389!5m2!1sen!2sus"
                    style="border:0;"
                    loading="lazy">
                </iframe>
            </div>

            <div class="footer-info">
                <h2>Alamat & Kontak</h2>

                <p><strong>Alamat:</strong><br> Jl. Contoh No. 123, Kota Anda</p>
                <p><strong>Email:</strong><br> info@misalamah.sch.id</p>
                <p><strong>No. Telepon:</strong><br> 0812-3456-7890</p>
            </div>

        </div>

        <footer class="footer-credit">
            <p>MI Salamah © 2026</p>
        </footer>

    </section>

</div>


<script src="<?php echo e(asset('js/home.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/home.blade.php ENDPATH**/ ?>