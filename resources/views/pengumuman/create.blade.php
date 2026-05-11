<!DOCTYPE html>
<html>
<head>
<title>Tambah Pengumuman</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

body{
margin:0;
font-family:Poppins,sans-serif;
background:#f5f7fa;
}

/* TOPBAR */
.topbar{
height:60px;
background:#4CAF50;
display:flex;
align-items:center;
padding:0 20px;
color:white;
position:fixed;
width:100%;
top:0;
}

.topbar-title{
    font-weight:600;
    margin-left:15px;
}

.back-btn img{
    width:20px;
    margin-left:10px;
    filter: invert(1);
    cursor:pointer;
}

/* ================= CONTENT ================= */
.content{
    display:flex;
    justify-content:center;
    margin-top: 55px;
    padding:40px 20px;
}

/* CARD */
.card{
background:white;
padding:30px;
border-radius:16px;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
width:100%;
max-width:700px;
}

/* HEADER FLEX */
.header-flex{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
}

/* LINK BUTTON */
.link-btn{
background:#2196F3;
color:white;
padding:8px 14px;
border-radius:8px;
text-decoration:none;
font-size:14px;
}

.link-btn:hover{
opacity:0.9;
}

/* INPUT */
select,input,textarea{
width:100%;
padding:12px;
margin-bottom:15px;
border-radius:8px;
border:1px solid #ddd;
font-size:14px;
box-sizing:border-box;
}

select:focus,input:focus,textarea:focus{
border-color:#4CAF50;
outline:none;
box-shadow:0 0 0 3px rgba(76,175,80,0.15);
}

/* BUTTON */
.btn{
width:100%;
padding:12px;
border:none;
border-radius:8px;
font-weight:600;
background:#4CAF50;
color:white;
cursor:pointer;
}

.btn:hover{
opacity:0.9;
}

/* ALERT */
.alert-success{
background:#e8f5e9;
color:#2e7d32;
padding:10px;
border-radius:8px;
margin-bottom:15px;
}

</style>
</head>

<body>

<!-- TOPBAR -->
<div class="topbar">

    <a href="#" onclick="goBack()" class="back-btn">
        <img src="/img/back.png">
    </a>

    <div class="topbar-title">
        Tambah Pengumuman
    </div>

</div>

<div class="page-wrapper">

    <div class="content">

        <div class="card">

            <!-- HEADER + BUTTON -->
            <div class="header-flex">
                <h3 style="margin:0;">Tambah Pengumuman</h3>

<a href="{{ route('pengumuman.index') }}" class="link-btn">
                    Daftar Pengumuman
                </a>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('pengumuman.store') }}" enctype="multipart/form-data">
                @csrf

                <label>Judul</label>
                <input type="text" name="judul" placeholder="Masukkan judul" required>

                <label>Isi Pengumuman</label>
                <textarea name="isi" rows="4" placeholder="Tulis pengumuman..." required></textarea>

                <label>Pilih Kelas</label>
                <select name="kelas_id">
                    <option value="">Umum (Semua Kelas)</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                    @endforeach
                </select>

                <label>Upload File (Opsional)</label>
                <input type="file" name="file" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">

                <button type="submit" class="btn">
                    Upload Pengumuman
                </button>
            </form>

        </div>

    </div>

</div>

<script>
function goBack(){
    if(document.referrer === window.location.href || document.referrer === ""){
        window.location.href = "{{ route('kepalasekolah.dashboard') }}";
    }else{
        window.history.back();
    }
}
</script>

</body>
</html>
