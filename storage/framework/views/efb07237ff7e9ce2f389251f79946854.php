<!-- resources/views/guru/dashboard.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Guru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { margin: 0; font-family: Poppins, sans-serif; }
        .topbar { height: 60px; background: #4CAF50; display: flex; align-items: center; padding: 0 20px; color: white; position: fixed; width: 100%; top: 0; z-index: 1000; }
        .hamburger { font-size: 25px; cursor: pointer; }
        .topbar-title { font-weight: 600; margin-left: 15px; }
        .sidebar { width: 260px; height: calc(100vh - 60px); background: #f4f4f4; position: fixed; left: -260px; top: 60px; transition: 0.3s ease; padding: 20px; box-shadow: 2px 0 8px rgba(0,0,0,0.1); }
        .sidebar.active { left: 0; }
        .sidebar button { width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 8px; font-weight: 500; cursor: pointer; }
        .profile-card { background: #a8d5e2; padding: 15px; border-radius: 15px; display: flex; align-items: center; gap: 20px; margin-bottom: 30px; margin-top: 10px; }
        .profile-card img { width: 50px; height: 50px; border-radius: 50%; }
        .profile-card div { line-height: 2; }
        .profile-card h3 { margin: 0; font-size: 16px; }
        .profile-card p { margin: 0; font-size: 13px; opacity: 0.8; }
        select, input, textarea { width: 100%; padding: 12px; margin-bottom: 15px; border-radius: 8px; border: 1px solid #ddd; font-size: 14px; box-sizing: border-box; }
        select:focus, input:focus, textarea:focus { border-color: #4CAF50; outline: none; box-shadow: 0 0 0 3px rgba(76,175,80,0.15); }
        button { width: 100%; padding: 8px; border: none; background: #4CAF50; color: white; border-radius: 5px; cursor: pointer; }
        .logout-btn { background: none; color: red; }
        .content { padding-top: 120px; display: flex; justify-content: center; align-items: flex-start; min-height: 100vh; }
        .card { background: #ffffff; padding: 30px; border-radius: 16px; box-shadow: 0 10px 25px rgba(0,0,0,0.08); width: 100%; max-width: 600px; animation: fadeIn 0.3s ease; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .card button { padding: 12px; border-radius: 8px; font-weight: 600; background: linear-gradient(135deg, #4CAF50, #45a049); transition: 0.2s; }
        .card button:hover { transform: translateY(-2px); box-shadow: 0 6px 15px rgba(76,175,80,0.3); }
        .notif-popup { display:none; position:fixed; z-index:5000; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.5); justify-content:center; align-items:center; }
        .notif-box { background:white; padding:40px; border-radius:20px; text-align:center; width:320px; animation:popIn 0.3s ease; }
        .icon { font-size:60px; margin-bottom:15px; }
        .success { color:#4CAF50; }
        .error { color:#f44336; }
        @keyframes popIn { from { transform:scale(0.7); opacity:0; } to { transform:scale(1); opacity:1; } }
        hr { margin: 10px 0; border: 0.5px solid #ddd; }
    </style>
</head>
<body>

<!-- TOPBAR -->
<div class="topbar">
    <div class="hamburger" onclick="toggleSidebar()">☰</div>
    <div class="topbar-title">Dashboard Guru</div>
</div>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">

    <!-- PROFILE -->
    <div class="profile-card">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
        <div>
            <h3><?php echo e(auth()->user()->name); ?></h3>
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

    <form action="<?php echo e(route('logout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit" class="logout-btn">Logout</button>
    </form>

</div>

<!-- CONTENT -->
<div class="content">

    <!-- FORM TUGAS & PILIHAN GANDA -->
    <div id="formTugas" style="display:none;">
        <div class="card">
            <h3>Tambah Tugas</h3>
            <form method="POST" action="<?php echo e(route('guru.simpan.tugas')); ?>">
                <?php echo csrf_field(); ?>
                <select name="kelas_id" required>
                    <option value="">Pilih Kelas</option>
                    <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($k->id); ?>"><?php echo e($k->nama_kelas); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <select name="mapel" required>
                    <option value="">Pilih Mata Pelajaran</option>
                    <option value="IPA">IPA</option>
                    <option value="MTK">Matematika</option>
                    <option value="BINDO">Bahasa Indonesia</option>
                    <option value="BING">Bahasa Inggris</option>
                </select>

                <input type="text" name="judul" placeholder="Judul Tugas" required>

                <div id="soalContainer">
                    <div class="soalItem">
                        <input type="text" name="pertanyaan[]" placeholder="Pertanyaan" required>
                        <input type="text" name="pilihan_a[]" placeholder="Pilihan A" required>
                        <input type="text" name="pilihan_b[]" placeholder="Pilihan B" required>
                        <input type="text" name="pilihan_c[]" placeholder="Pilihan C" required>
                        <input type="text" name="pilihan_d[]" placeholder="Pilihan D" required>
                        <select name="jawaban[]" required>
                            <option value="">Jawaban Benar</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        <hr>
                    </div>
                </div>

                <button type="button" onclick="tambahSoal()">Tambah Soal</button>
                <button type="submit">Simpan Tugas</button>
            </form>
        </div>
    </div>

    <!-- NOTIFIKASI -->
    <div id="notifPopup" class="notif-popup">
        <div class="notif-box">
            <div id="notifIcon" class="icon"></div>
            <h3 id="notifMessage"></h3>
            <button onclick="closeNotif()">OK</button>
        </div>
    </div>

</div>

<script>
function toggleSidebar() { document.getElementById("sidebar").classList.toggle("active"); }
function showPengumuman() { document.getElementById("formPengumuman").style.display="block"; document.getElementById("formTugas").style.display="none"; document.getElementById("sidebar").classList.remove("active"); }
function showTugas() { document.getElementById("formTugas").style.display="block"; document.getElementById("formPengumuman").style.display="none"; document.getElementById("sidebar").classList.remove("active"); }
function tambahSoal() {
    const container = document.getElementById("soalContainer");
    const div = document.createElement("div");
    div.classList.add("soalItem");
    div.innerHTML = `
        <input type="text" name="pertanyaan[]" placeholder="Pertanyaan" required>
        <input type="text" name="pilihan_a[]" placeholder="Pilihan A" required>
        <input type="text" name="pilihan_b[]" placeholder="Pilihan B" required>
        <input type="text" name="pilihan_c[]" placeholder="Pilihan C" required>
        <input type="text" name="pilihan_d[]" placeholder="Pilihan D" required>
        <select name="jawaban[]" required>
            <option value="">Jawaban Benar</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <hr>
    `;
    container.appendChild(div);
}
function showNotif(type,message){const popup=document.getElementById("notifPopup");const icon=document.getElementById("notifIcon");const msg=document.getElementById("notifMessage");popup.style.display="flex";if(type==="success"){icon.innerHTML="✔";icon.className="icon success";}else{icon.innerHTML="✖";icon.className="icon error";}msg.innerText=message;}
function closeNotif(){document.getElementById("notifPopup").style.display="none";}
</script>

<?php if(session('success')): ?>
<script>
window.onload = function() { showNotif("success","<?php echo e(session('success')); ?>"); };
</script>
<?php endif; ?>

<?php if($errors->any()): ?>
<script>
window.onload = function() { showNotif("error","Terjadi kesalahan, coba lagi!"); };
</script>
<?php endif; ?>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/guru/dashboard.blade.php ENDPATH**/ ?>