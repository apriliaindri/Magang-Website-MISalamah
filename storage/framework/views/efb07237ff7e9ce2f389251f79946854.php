<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard Guru</title>

    
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/dashboard_guru.css')); ?>"
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
            Dashboard Guru
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

                <p>Guru</p>

            </div>

        </div>

        
        <a href="<?php echo e(route('pengumuman.create')); ?>">
            <button>Tambah Pengumuman</button>
        </a>

        <a href="/guru/tambah-pg">
            <button>Tambah Tugas</button>
        </a>

        <a href="/guru/daftar-tugas">
            <button>Daftar Tugas</button>
        </a>

        <br><br>

        
        <form
            action="<?php echo e(route('logout')); ?>"
            method="POST"
        >

            <?php echo csrf_field(); ?>

            <button
                type="submit"
                class="logout-btn"
            >
                Logout
            </button>

        </form>

    </div>

    
    <div class="content">

        
        <div
            id="formTugas"
            style="display:none;"
        >

            <div class="card">

                <h3>Tambah Tugas</h3>

                <form
                    method="POST"
                    action="<?php echo e(route('guru.simpan.tugas')); ?>"
                >

                    <?php echo csrf_field(); ?>

                    
                    <select
                        name="kelas_id"
                        required
                    >

                        <option value="">
                            Pilih Kelas
                        </option>

                        <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($k->id); ?>">
                                <?php echo e($k->nama_kelas); ?>

                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                    
                    <select
                        name="mapel"
                        required
                    >

                        <option value="">
                            Pilih Mata Pelajaran
                        </option>

                        <option value="IPA">IPA</option>
                        <option value="MTK">Matematika</option>
                        <option value="BINDO">Bahasa Indonesia</option>
                        <option value="BING">Bahasa Inggris</option>

                    </select>

                    
                    <input
                        type="text"
                        name="judul"
                        placeholder="Judul Tugas"
                        required
                    >

                    
                    <div id="soalContainer">

                        <div class="soalItem">

                            <input
                                type="text"
                                name="pertanyaan[]"
                                placeholder="Pertanyaan"
                                required
                            >

                            <input
                                type="text"
                                name="pilihan_a[]"
                                placeholder="Pilihan A"
                                required
                            >

                            <input
                                type="text"
                                name="pilihan_b[]"
                                placeholder="Pilihan B"
                                required
                            >

                            <input
                                type="text"
                                name="pilihan_c[]"
                                placeholder="Pilihan C"
                                required
                            >

                            <input
                                type="text"
                                name="pilihan_d[]"
                                placeholder="Pilihan D"
                                required
                            >

                            <select
                                name="jawaban[]"
                                required
                            >

                                <option value="">
                                    Jawaban Benar
                                </option>

                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>

                            </select>

                            <hr>

                        </div>

                    </div>

                    
                    <button
                        type="button"
                        onclick="tambahSoal()"
                    >
                        Tambah Soal
                    </button>

                    <button type="submit">
                        Simpan Tugas
                    </button>

                </form>

            </div>

        </div>

        
        <div
            id="notifPopup"
            class="notif-popup"
        >

            <div class="notif-box">

                <div
                    id="notifIcon"
                    class="icon"
                ></div>

                <h3 id="notifMessage"></h3>

                <button onclick="closeNotif()">
                    OK
                </button>

            </div>

        </div>

    </div>

    
    <script>

        const successMessage = <?php echo json_encode(session('success'), 15, 512) ?>;
        const hasError = <?php echo json_encode($errors->any(), 15, 512) ?>;

    </script>

    
    <script src="<?php echo e(asset('js/dashboard_guru.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/guru/dashboard.blade.php ENDPATH**/ ?>