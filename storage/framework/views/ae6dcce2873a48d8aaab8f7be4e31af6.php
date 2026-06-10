<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kode Akses</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="<?php echo e(asset('css/kode_kelas.css')); ?>">
</head>
<body>

    
    <nav class="navbar">

        <a href="<?php echo e(url('/')); ?>" class="back-btn">
            &#10094; Kembali
        </a>

    </nav>

    
    <section class="kode-section">

        <div class="kode-box">

            <h2>Masukkan Kode Akses</h2>

            <form method="POST" action="<?php echo e(route('register.kode.cek')); ?>">
                <?php echo csrf_field(); ?>

                <input
                    type="text"
                    name="kode"
                    placeholder="Masukkan kode akses"
                    required
                >

                <button type="submit">
                    Masuk
                </button>

                <?php if(session('error')): ?>
                    <p class="error">
                        <?php echo e(session('error')); ?>

                    </p>
                <?php endif; ?>

            </form>

        </div>

    </section>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/auth/kode_global.blade.php ENDPATH**/ ?>