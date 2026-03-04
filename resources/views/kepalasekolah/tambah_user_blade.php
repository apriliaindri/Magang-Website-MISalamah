<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
    <style>
        body {
            font-family: Poppins, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 30px;
            width: 400px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #4CAF50;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="card">
    <h3>Tambah User</h3>



    <form method="POST" action="{{ route('kepalasekolah.user.store') }}">
        @csrf

        <input type="text" name="name" placeholder="Nama Lengkap" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <select name="role" required>
            <option value="">-- Pilih Role --</option>
            <option value="guru">Guru</option>
            <option value="kepala_sekolah">Kepala Sekolah</option>
        </select>

        <button type="submit">Simpan</button>
    </form>
</div>

<!-- NOTIFICATION POPUP -->
<div id="notifPopup" class="notif-popup">
    <div class="notif-box">
        <div id="notifIcon" class="icon"></div>
        <h3 id="notifMessage"></h3>
        <button onclick="closeNotif()">OK</button>
    </div>
</div>

<style>
.notif-popup {
    display:none;
    position:fixed;
    z-index:5000;
    left:0; top:0;
    width:100%; height:100%;
    background:rgba(0,0,0,0.5);
    justify-content:center;
    align-items:center;
}

.notif-box {
    background:white;
    padding:40px;
    border-radius:20px;
    text-align:center;
    width:320px;
    animation:popIn 0.3s ease;
}

.icon {
    font-size:60px;
    margin-bottom:15px;
}

.success { color:#4CAF50; }
.error { color:#f44336; }

@keyframes popIn {
    from { transform:scale(0.7); opacity:0; }
    to { transform:scale(1); opacity:1; }
}
</style>

<script>
function showNotif(type, message) {
    const popup = document.getElementById("notifPopup");
    const icon = document.getElementById("notifIcon");
    const msg = document.getElementById("notifMessage");

    popup.style.display = "flex";

    if (type === "success") {
        icon.innerHTML = "✔";
        icon.className = "icon success";
    } else {
        icon.innerHTML = "✖";
        icon.className = "icon error";
    }

    msg.innerText = message;
}

function closeNotif() {
    document.getElementById("notifPopup").style.display = "none";
}
</script>

@if(session('success'))
<script>
document.addEventListener("DOMContentLoaded", function() {
    showNotif("success", "{{ session('success') }}");
});
</script>
@endif

@if($errors->any())
<script>
document.addEventListener("DOMContentLoaded", function() {
    showNotif("error", "Gagal menambahkan user, coba lagi!");
});
</script>
@endif

</body>
</html>
