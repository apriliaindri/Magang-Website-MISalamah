<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="<?php echo e(asset('css/register.css')); ?>">
</head>
<body>

    
    <nav class="navbar">

        <a href="<?php echo e(url()->previous()); ?>" class="back-btn">
            &#10094; Kembali
        </a>

    </nav>

    
    <section class="register-section">

        <div class="register-box">

            <h2>Register</h2>

            <form method="POST" action="<?php echo e(route('siswa.register.store', $kelas->id)); ?>">
                <?php echo csrf_field(); ?>

                <input
                    type="text"
                    name="name"
                    placeholder="Nama Lengkap"
                    required
                >

                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    required
                >

                <div class="password-wrapper">

                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Password"
                        required
                    >

                    <span
                        class="toggle-password"
                        onclick="togglePassword()"
                    >
                        👁
                    </span>

                </div>

                <button type="submit">
                    Register
                </button>

                <p class="login-text">
                    Sudah memiliki akun?
                    <a href="<?php echo e(route('login')); ?>">
                        Login
                    </a>
                </p>

                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error">
                        <?php echo e($message); ?>

                    </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </form>

        </div>

    </section>

    <script src="<?php echo e(asset('js/register.js')); ?>"></script>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\auth\register.blade.php ENDPATH**/ ?>