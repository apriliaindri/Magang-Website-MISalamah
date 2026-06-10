<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
</head>
<body>

    
    <nav class="navbar">

        <a href="<?php echo e(url('/')); ?>" class="back-btn">
            &#10094; Kembali
        </a>

    </nav>

    
    <section class="login-section">

        <div class="login-box">

            <h2>Login</h2>

            <?php if(session('success')): ?>
                <p class="success">
                    <?php echo e(session('success')); ?>

                </p>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

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
                    Login
                </button>

                <p class="register-text">
                    Belum memiliki akun?
                    <a href="<?php echo e(route('register.kode')); ?>">
                        Register
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

    <script src="<?php echo e(asset('js/login.js')); ?>"></script>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\auth\login.blade.php ENDPATH**/ ?>