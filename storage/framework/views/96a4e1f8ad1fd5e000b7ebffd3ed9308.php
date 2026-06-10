<?php
    $gambar = is_array($p->gambar)
        ? $p->gambar
        : json_decode($p->gambar, true) ?? [];

    $filePertama = $gambar[0] ?? null;

    $ext = $filePertama
        ? strtolower(pathinfo($filePertama, PATHINFO_EXTENSION))
        : null;
?>

<a href="<?php echo e(route('pengumuman.detail.pengumuman', $p->id)); ?>" class="pengumuman-card">

    <?php if($filePertama): ?>

        <?php if(in_array($ext, ['jpg','jpeg','png','webp'])): ?>
            <img src="<?php echo e(asset('storage/'.$filePertama)); ?>">
        <?php elseif($ext == 'pdf'): ?>
            <div class="pdf-preview">
                <img src="<?php echo e(asset('img/pdf-icon.png')); ?>">
                <span>PDF Document</span>
            </div>
        <?php else: ?>
            <img src="<?php echo e(asset('img/LogoMI.png')); ?>">
        <?php endif; ?>

    <?php else: ?>
        <img src="<?php echo e(asset('img/LogoMI.png')); ?>">
    <?php endif; ?>

    <div class="pengumuman-content">

        <div class="meta-row">
            <span class="kategori-home">
                <?php echo e($p->kelas ? $p->kelas->nama_kelas : 'Semua Kelas'); ?>

            </span>

            <span class="tanggal">
                <?php echo e($p->created_at->format('d M Y')); ?>

            </span>
        </div>

        <h3>
            <?php echo e(\Illuminate\Support\Str::limit($p->judul, 40)); ?>

        </h3>

    </div>

</a>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\partials\card_pengumuman.blade.php ENDPATH**/ ?>