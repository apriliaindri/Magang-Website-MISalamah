<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Kepala Sekolah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/dashboard_kepalasekolah.css') }}">
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
            <h3>{{ auth()->user()->name }}</h3>
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
                        <button type="button" class="btn-reset"
                                onclick="openResetModal({{ $user->id }})">
                            Reset
                        </button>

                        <form action="{{ route('kepalasekolah.user.delete',$user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-delete">
                                Hapus
                            </button>
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

<!-- MODAL RESET PASSWORD -->
<div id="resetModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeResetModal()">&times;</span>

        <h3>Reset Password</h3>

        <form id="resetForm" method="POST">
            @csrf

            <div style="position:relative;">
                <input type="password" name="new_password" id="newPassword"
                       placeholder="Password Baru" required
                       style="padding-right:45px;">

                <span onclick="togglePassword()"
                      style="position:absolute;right:15px;top:30%;transform:translateY(-50%);cursor:pointer;">
                    👁
                </span>
            </div>

            <button type="submit">Simpan Password</button>
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

{{-- JS --}}
<script src="{{ asset('js/dashboard_kepalasekolah.js') }}"></script>

@if(session('success'))
<script>
    window.onload = function () {
        showNotif("success", "{{ session('success') }}");
    };
</script>
@endif

@if($errors->any())
<script>
    window.onload = function () {
        showNotif("error", "Terjadi kesalahan, coba lagi!");
    };
</script>
@endif

</body>
</html>
