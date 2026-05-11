<h2 style="color:blue;">INI DASHBOARD</h2>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Kepala Sekolah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { margin:0; font-family:Poppins,sans-serif; }

        .topbar {
            height:60px; background:#4CAF50; display:flex;
            align-items:center; padding:0 20px; color:white;
            position:fixed; width:100%; top:0; z-index:1000;
        }

        .hamburger { font-size:25px; cursor:pointer; }
        .topbar-title { font-weight:600; margin-left:15px; }

        .sidebar {
            width:260px; height:calc(100vh - 60px);
            background:#f4f4f4; position:fixed;
            left:-260px; top:60px; transition:0.3s ease;
            padding:20px; box-shadow:2px 0 8px rgba(0,0,0,0.1);
        }

        .sidebar.active { left:0; }

        .sidebar button {
            width:100%; padding:10px;
            margin-bottom:15px; border-radius:8px;
            font-weight:500;
        }

        .profile-card {
            background:#a8d5e2; padding:15px;
            border-radius:15px; display:flex;
            align-items:center; gap:20px;
            margin-bottom:30px; margin-top:10px;
        }

        .profile-card img {
            width:50px; height:50px; border-radius:50%;
        }

        .profile-card h3 { margin:0; font-size:16px; }
        .profile-card p { margin:0; font-size:13px; opacity:0.8; }

        .logout-btn { background:none; color:red; }

        .content {
            padding-top:120px;
            display:flex; justify-content:center;
            align-items:flex-start;
            min-height:100vh;
        }

        .card {
            background:#fff; padding:30px;
            border-radius:16px;
            box-shadow:0 10px 25px rgba(0,0,0,0.08);
            width:100%; max-width:600px;
        }

        input, select, textarea {
            width:100%; padding:12px;
            margin-bottom:15px; border-radius:8px;
            border:1px solid #ddd;
            font-size:14px; box-sizing:border-box;
        }

        button {
            width:100%; padding:12px;
            border-radius:8px; font-weight:600;
            border:none;
            background:linear-gradient(135deg,#4CAF50,#45a049);
            color:white; cursor:pointer;
        }

        table { width:100%; border-collapse:collapse; margin-top:15px; }

        table th, table td {
            padding:10px; border:1px solid #ddd;
            font-size:14px;
        }

        table th { background:#f0f0f0; }

        /* MODAL */
        .modal {
            display:none;
            position:fixed;
            z-index:2000;
            left:0; top:0;
            width:100%; height:100%;
            background:rgba(0,0,0,0.5);
            justify-content:center;
            align-items:center;
        }

        .modal-content {
            background:white;
            padding:30px;
            width:400px;
            border-radius:12px;
            position:relative;
            animation:fadeIn 0.3s ease;
        }

        .close {
            position:absolute;
            right:15px; top:10px;
            font-size:22px; cursor:pointer;
        }

        @keyframes fadeIn {
            from { opacity:0; transform:scale(0.9); }
            to { opacity:1; transform:scale(1); }
        }
    </style>
</head>
<body>

<!-- TOPBAR -->
<div class="topbar">
    <div class="hamburger" onclick="toggleSidebar()">☰</div>
    <div class="topbar-title">Dashboard Kepala Sekolah</div>
</div>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <div class="profile-card">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
        <div>
            <h3>{{auth()->user()->name}}</h3>
            <p>Kepala Sekolah</p>
        </div>
    </div>

<a href="{{ route('pengumuman.create') }}">
    <button>Tambah Pengumuman</button>
</a>
<a href="{{ route('kepalasekolah.artikel.create') }}">
    <button>Upload Artikel</button>
</a>
    <button onclick="showUser()">Manage User</button>

    <br><br>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</div>

<!-- CONTENT -->
<div class="content">

    <!-- PENGUMUMAN -->
    <div id="formPengumuman" style="display:none;">
        <div class="card">
            <h3>Upload Pengumuman</h3>
            <form method="POST" action="{{ route('kepalasekolah.pengumuman.store') }}">
                @csrf
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
            <form method="POST" action="{{ route('kepalasekolah.artikel.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="Judul">
                <input type="text" name="category" placeholder="Kategori">
                <textarea name="content" rows="4" placeholder="Isi Artikel"></textarea>
                <input type="file" name="image">
                <button type="submit">Upload</button>
            </form>
        </div>
    </div>

    <!-- MANAGE USER -->
    <div id="formUser" style="display:none;">
        <div class="card">
            <h3>Manage User</h3>

            <!-- BUTTON POPUP -->
            <button type="button" onclick="openModal()" style="margin-bottom:15px;">
                + Tambah User
            </button>

            <table>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>

                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ route('kepalasekolah.user.reset',$user->id) }}" method="POST">
                            @csrf
                            <button type="submit">Reset</button>
                        </form>
                        <form action="{{ route('kepalasekolah.user.delete',$user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH USER -->
<div id="userModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Tambah User</h3>

        <form method="POST" action="{{ route('kepalasekolah.user.store') }}">
            @csrf
            <input type="text" name="name" placeholder="Nama" required>
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
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("active");
}

function showPengumuman() {
    hideAll();
    document.getElementById("formPengumuman").style.display = "block";
}

function showArtikel() {
    hideAll();
    document.getElementById("formArtikel").style.display = "block";
}

function showUser() {
    hideAll();
    document.getElementById("formUser").style.display = "block";
}

function hideAll() {
    document.getElementById("formPengumuman").style.display = "none";
    document.getElementById("formArtikel").style.display = "none";
    document.getElementById("formUser").style.display = "none";
}

function openModal() {
    document.getElementById("userModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("userModal").style.display = "none";
}

window.onclick = function(event) {
    const modal = document.getElementById("userModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

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
    window.onload = function() {
        showNotif("success", "{{ session('success') }}");
    };
</script>
@endif

@if($errors->any())
<script>
    window.onload = function() {
        showNotif("error", "Terjadi kesalahan, coba lagi!");
    };
</script>
@endif

</body>
</html>
