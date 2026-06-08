<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Kepala Madrasah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard_kepalasekolah.css')); ?>">
</head>

<body>

<!-- TOPBAR -->
<div class="topbar">
    <div class="hamburger" onclick="toggleSidebar()">☰</div>
    <div class="topbar-title">Dashboard Kepala Madrasah</div>
</div>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <div class="profile-card">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
        <div>
            <h3><?php echo e(auth()->user()->name); ?></h3>
            <p>Kepala Madrasah</p>
        </div>
    </div>

    <a href="<?php echo e(route('pengumuman.create')); ?>">
        <button>Tambah Pengumuman</button>
    </a>

    <a href="<?php echo e(route('kepalasekolah.artikel.create')); ?>">
        <button>Upload Artikel</button>
    </a>

<a href="<?php echo e(route('kepalasekolah.manageuser')); ?>">
    <button>Manage User</button>
</a>

    <form action="<?php echo e(route('logout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</div>

<!-- CONTENT -->
<div class="content">

    <!-- PENGUMUMAN -->
    <div id="formPengumuman" style="display:none;">
        <div class="card">
            <h3>Upload Pengumuman</h3>

            <form method="POST" action="<?php echo e(route('kepalasekolah.pengumuman.store')); ?>">
                <?php echo csrf_field(); ?>
                <input type="text" name="judul" placeholder="Judul">
                <textarea name="isi" rows="4" placeholder="Isi"></textarea>
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>

    <!-- ARTIKEL -->
    <div id="formArtikel" style="display:none;">
        <div class="card">
            <h3>Upload Artikel</h3>

            <form method="POST" action="<?php echo e(route('kepalasekolah.artikel.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="text" name="title" placeholder="Judul">
                <input type="text" name="category" placeholder="Kategori">
                <textarea name="content" rows="4" placeholder="Isi Artikel"></textarea>
                <input type="file" name="image">
                <button type="submit">Upload</button>
            </form>
        </div>
    </div>

<!-- MODAL TAMBAH USER -->
<div id="userModal" class="modal">
    <div style="position:relative;">

    <input
        type="password"
        id="password"
        name="password"
        placeholder="Password"
        required
        style="padding-right:45px;"
    >

    <span
        class="toggle-password"
        onclick="togglePassword('password')"
        style="
            position:absolute;
            right:15px;
            top:50%;
            transform:translateY(-50%);
            cursor:pointer;
        "
    >
        👁
    </span>

</div>
</div>

<!-- MODAL RESET PASSWORD -->
<div id="resetModal" class="modal">

    <div class="modal-content">

        <span
            class="close"
            onclick="closeResetModal()"
        >
            &times;
        </span>

        <h3>
            Reset Password
        </h3>

        <form
            id="resetForm"
            method="POST"
        >

            <?php echo csrf_field(); ?>

            <div style="position:relative;">

                <input
                    type="password"
                    id="new_password"
                    name="new_password"
                    placeholder="Password Baru"
                    required
                    style="padding-right:45px;"
                >

                <span
                    class="toggle-password"
                    onclick="togglePassword('new_password')"
                    style="
                        position:absolute;
                        right:15px;
                        top:50%;
                        transform:translateY(-50%);
                        cursor:pointer;
                    "
                >
                    👁
                </span>

            </div>

            <button type="submit">
                Simpan Password
            </button>

        </form>

    </div>

</div>

<!-- NOTIF -->
<div id="notifPopup" class="notif-popup">
    <div class="notif-box">
        <div id="notifIcon" class="icon"></div>
        <h3 id="notifMessage"></h3>
        <button onclick="closeNotif()">OK</button>
    </div>
</div>


<script src="<?php echo e(asset('js/dashboard_kepalasekolah.js')); ?>"></script>

<?php if(session('success')): ?>
<script>
    window.onload = function () {
        showNotif("success", "<?php echo e(session('success')); ?>");
    };
</script>
<?php endif; ?>

<?php if($errors->any()): ?>
<script>
    window.onload = function () {
        showNotif("error", "Terjadi kesalahan, coba lagi!");
    };
</script>
<?php endif; ?>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/kepalasekolah/dashboard.blade.php ENDPATH**/ ?>