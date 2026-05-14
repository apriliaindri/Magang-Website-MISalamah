<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Daftar Pengumuman</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

/* RESET */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins',sans-serif;
    background:#f5f7fb;
}

/* ================= TOPBAR ================= */

.topbar-left{
    display:flex;
    align-items:center;
    gap:14px;
}

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

.page-content{
    padding:110px 20px 40px;
}

.container{
    max-width:1100px;
    margin:auto;
}

/* ================= CARD ================= */

.card{
    background:white;

    border-radius:20px;

    padding:30px;

    box-shadow:
        0 10px 30px rgba(0,0,0,0.08);
}

/* HEADER */

.card-header{
    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:25px;
}

.card-header h2{
    font-size:28px;
    color:#1e293b;
}

/* BUTTON TAMBAH */

.tambah-btn{
    background:#4CAF50;
    color:white;

    padding:10px 18px;

    border-radius:10px;

    text-decoration:none;

    font-size:14px;
    font-weight:600;

    transition:0.3s;
}

.tambah-btn:hover{
    opacity:0.9;
}

/* ================= TABLE ================= */

.table-wrapper{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#f1f5f9;
}

th{
    padding:16px;
    text-align:left;

    font-size:15px;
    color:#334155;
}

td{
    padding:18px 16px;
    border-bottom:1px solid #e5e7eb;

    font-size:15px;
    color:#444;
}

/* JUDUL */

.judul{
    font-weight:600;
    color:#111827;
}

/* BADGE */

.badge{
    display:inline-block;

    padding:6px 12px;

    border-radius:999px;

    font-size:13px;
    font-weight:600;
}

.badge-umum{
    background:#e0f2fe;
    color:#0284c7;
}

.badge-kelas{
    background:#dcfce7;
    color:#16a34a;
}

/* AKSI */

.aksi{
    display:flex;
    gap:10px;
}

/* BUTTON */

.btn{
    padding:8px 14px;

    border-radius:8px;

    text-decoration:none;

    font-size:13px;
    font-weight:600;

    border:none;

    cursor:pointer;

    transition:0.3s;
}

.btn-detail{
    background:#2196F3;
    color:white;
}

.btn-edit{
    background:#f59e0b;
    color:white;
}

.btn-hapus{
    background:#ef4444;
    color:white;
}

.btn:hover{
    opacity:0.85;
}

/* EMPTY */

.empty{
    text-align:center;
    padding:40px;
    color:#777;
}

/* RESPONSIVE */

@media(max-width:768px){

    .topbar{
        padding:0 18px;
    }

    .topbar-title{
        font-size:18px;
    }

    .card{
        padding:20px;
    }

    .card-header{
        flex-direction:column;
        align-items:flex-start;
        gap:15px;
    }

    table{
        min-width:700px;
    }

}

</style>
</head>

<body>

<!-- TOPBAR -->
<div class="topbar">

    <div class="topbar-left">

        <a href="javascript:history.back()" class="back-btn">
            <img src="/img/back.png">
        </a>

        <div class="topbar-title">
            Daftar Pengumuman
        </div>

    </div>

</div>

<!-- CONTENT -->
<div class="page-content">

    <div class="container">

        <div class="card">

            <!-- HEADER -->
            <div class="card-header">

                <h2>Semua Pengumuman</h2>

                <a href="<?php echo e(route('pengumuman.create')); ?>"
                   class="tambah-btn">

                    + Tambah Pengumuman

                </a>

            </div>

            <?php if(session('success')): ?>

                <div style="
                    background:#e8f5e9;
                    color:#2e7d32;
                    padding:12px;
                    border-radius:10px;
                    margin-bottom:20px;
                ">
                    <?php echo e(session('success')); ?>

                </div>

            <?php endif; ?>

            <?php if($pengumuman->count() > 0): ?>

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $__currentLoopData = $pengumuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>

                            <td>
                                <?php echo e($loop->iteration); ?>

                            </td>

                            <td class="judul">
                                <?php echo e($p->judul); ?>

                            </td>

                            <td>

                                <?php if($p->kelas_id): ?>

                                    <span class="badge badge-kelas">
                                        Kelas <?php echo e($p->kelas_id); ?>

                                    </span>

                                <?php else: ?>

                                    <span class="badge badge-umum">
                                        Umum
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>
                                <?php echo e($p->created_at->format('d M Y')); ?>

                            </td>

                            <td>

                                <div class="aksi">

                                    <!-- DETAIL -->
                                    <a href="<?php echo e(route('pengumuman.detail.pengumuman', $p->id)); ?>"
                                       class="btn btn-detail">

                                        Detail

                                    </a>

                                    <!-- EDIT -->
                                    <a href="<?php echo e(route('pengumuman.edit', $p->id)); ?>"
                                       class="btn btn-edit">

                                        Edit

                                    </a>

                                    <!-- HAPUS -->
                                    <form action="<?php echo e(route('pengumuman.destroy', $p->id)); ?>"
                                          method="POST"
                                          onsubmit="return confirm('Yakin hapus pengumuman ini?')">

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit"
                                                class="btn btn-hapus">

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>

            </div>

            <?php else: ?>

                <div class="empty">
                    Belum ada pengumuman.
                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/pengumuman/index.blade.php ENDPATH**/ ?>