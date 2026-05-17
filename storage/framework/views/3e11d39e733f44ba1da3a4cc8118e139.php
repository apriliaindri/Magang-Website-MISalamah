<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Pengumuman</title>

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- CSS -->
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/edit_pengumuman.css')); ?>"
    >

</head>

<body>

<div class="topbar">

    <div class="topbar-left">

        <a
            href="<?php echo e(route('pengumuman.index')); ?>"
            class="back-btn"
        >

            <img
                src="/img/back.png"
                alt="Back"
            >

        </a>

        <div class="topbar-title">

            Edit Pengumuman

        </div>

    </div>

</div>

<div class="content with-navbar">

        <div class="card">

            <h3>Edit Pengumuman</h3>

            <?php if(session('success')): ?>

                <div class="alert-success">

                    <?php echo e(session('success')); ?>


                </div>

            <?php endif; ?>

            <form
                action="<?php echo e(route('pengumuman.update', $pengumuman->id)); ?>"
                method="POST"
                enctype="multipart/form-data"
            >

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <label>Judul</label>

                <input
                    type="text"
                    name="judul"
                    value="<?php echo e($pengumuman->judul); ?>"
                    required
                >

                <label>Isi Pengumuman</label>

                <textarea
                    name="isi"
                    rows="4"
                ><?php echo e($pengumuman->isi); ?></textarea>

                <label>Pilih Kelas</label>

                <select name="kelas_id">

                    <option value="">
                        Semua Kelas
                    </option>

                    <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option
                            value="<?php echo e($k->id); ?>"
                            <?php echo e($pengumuman->kelas_id == $k->id ? 'selected' : ''); ?>

                        >

                            <?php echo e($k->nama_kelas); ?>


                        </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

<?php

    $files = json_decode($pengumuman->gambar, true) ?? [];

?>

<label>File Saat Ini</label>

<?php if(count($files) > 0): ?>

    <div class="file-list">

    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php

            $ext = strtolower(
                pathinfo($file, PATHINFO_EXTENSION)
            );

        ?>

<div
    class="file-item"
    id="file-<?php echo e($index); ?>"
>

            <div class="preview-card">

                
                <?php if(in_array($ext, ['jpg','jpeg','png','webp'])): ?>

                    <img
                        src="<?php echo e(asset('storage/' . $file)); ?>"
                        class="preview-image"
                        onclick="openModal(this.src)"
                    >

                    <div class="preview-name">

                        <?php echo e(basename($file)); ?>


                    </div>

                
                <?php elseif($ext == 'pdf'): ?>

                    <a
                        href="<?php echo e(asset('storage/' . $file)); ?>"
                        target="_blank"
                        class="pdf-preview"
                    >

                        <img
                            src="<?php echo e(asset('img/pdf-icon.png')); ?>"
                            class="pdf-icon"
                        >

                        <span>

                            <?php echo e(basename($file)); ?>


                        </span>

                    </a>

                
                <?php else: ?>

                    <div class="file-card">

                        <div class="preview-name">

                            📎 <?php echo e(basename($file)); ?>


                        </div>

                    </div>

                <?php endif; ?>

                
                <button
                    type="button"
                    class="remove-file"
                    onclick="removeExistingFile(
                        '<?php echo e($index); ?>',
                        '<?php echo e($file); ?>'
                    )"
                >
                    ×
                </button>

            </div>

        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>


<div id="deleted-files"></div>


<?php endif; ?>

<label>Tambah File Baru</label>

<input
    type="file"
    name="gambar[]"
    multiple
>

                <button
                    type="submit"
                    class="btn btn-success"
                >

                    Update Pengumuman

                </button>

            </form>

        </div>

    </div>

    <script>

    function removeExistingFile(index, file){

        // hapus preview dari tampilan
        document
            .getElementById(`file-${index}`)
            .remove();

        // buat input hidden
        const input = document.createElement('input');

        input.type = 'hidden';

        input.name = 'hapus_file[]';

        input.value = file;

        document
            .getElementById('deleted-files')
            .appendChild(input);

    }

    function openModal(src){

        document.getElementById('imageModal').style.display = 'flex';

        document.getElementById('modalImage').src = src;

    }

    function closeModal(){

        document.getElementById('imageModal').style.display = 'none';

    }

</script>

<div id="imageModal" class="image-modal">

    <span
        class="close-modal"
        onclick="closeModal()"
    >
        &times;
    </span>

    <img
        id="modalImage"
        class="modal-content"
    >

</div>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/pengumuman/edit_pengumuman.blade.php ENDPATH**/ ?>