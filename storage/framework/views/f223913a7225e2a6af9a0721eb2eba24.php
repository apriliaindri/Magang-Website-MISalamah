<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Pengumuman</title>

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- CSS -->
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/tambah_pengumuman.css')); ?>"
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

            Tambah Pengumuman

        </div>

    </div>

</div>

    
    <div class="page-wrapper">

        <div class="content">

            <div class="card">

                <div class="header-flex">

                    <h3>Tambah Pengumuman</h3>

                    <a
                        href="<?php echo e(url('/pengumuman')); ?>"
                        class="link-btn"
                    >
                        Daftar Pengumuman
                    </a>

                </div>

                <?php if(session('success')): ?>

                    <div class="alert-success">

                        <?php echo e(session('success')); ?>


                    </div>

                <?php endif; ?>

                <form
                    method="POST"
                    action="<?php echo e(route('pengumuman.store')); ?>"
                    enctype="multipart/form-data"
                >

                    <?php echo csrf_field(); ?>

                    <label>Judul</label>

                    <input
                        type="text"
                        name="judul"
                        placeholder="Masukkan judul"
                        required
                    >

                    <label>Isi Pengumuman</label>

                    <textarea
                        name="isi"
                        rows="4"
                        placeholder="Tulis pengumuman..."
                        required
                    ></textarea>

                    <label>Pilih Kelas</label>

                    <select name="kelas_id">

                        <option value="">
                            Semua Kelas
                        </option>

                        <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($k->id); ?>">

                                <?php echo e($k->nama_kelas); ?>


                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                    <label>Upload File / Gambar</label>

                    <input
                        type="file"
                        id="files"
                        name="files[]"
                        multiple
                        accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                    >

                    
                    <div id="file-list"></div>

                    <button
                        type="submit"
                        class="btn"
                    >
                        Upload Pengumuman
                    </button>

                </form>

            </div>

        </div>

    </div>

<script>

    const inputFiles = document.getElementById('files');

    const fileList = document.getElementById('file-list');

    let selectedFiles = [];

    inputFiles.addEventListener('change', function (e) {

        Array.from(e.target.files).forEach(file => {

            selectedFiles.push(file);

        });

        updateInputFiles();

        renderFiles();

    });

    function renderFiles() {

        fileList.innerHTML = '';

        selectedFiles.forEach((file, index) => {

            const ext = file.name.split('.').pop().toLowerCase();

            const div = document.createElement('div');

            div.classList.add('preview-item');

            // ================= IMAGE =================
            if(['jpg','jpeg','png','webp'].includes(ext)){

                const imageUrl = URL.createObjectURL(file);

                div.innerHTML = `
                    <div class="preview-card">

                        <img
                            src="${imageUrl}"
                            class="preview-image"
                            onclick="openModal('${imageUrl}')"
                        >

                        <div class="preview-name">
                            ${file.name}
                        </div>

                        <button
                            type="button"
                            class="remove-file"
                            onclick="removeFile(${index})"
                        >
                            ×
                        </button>

                    </div>
                `;
            }

            // ================= PDF =================
           else if(ext === 'pdf'){

    const pdfUrl = URL.createObjectURL(file);

    div.innerHTML = `
        <div class="preview-card">

            <a
                href="${pdfUrl}"
                target="_blank"
                class="pdf-preview"
            >

                <img
                    src="/img/pdf-icon.png"
                    class="pdf-icon"
                    alt="PDF"
                >

                <span>
                    ${file.name}
                </span>

            </a>

            <button
                type="button"
                class="remove-file"
                onclick="removeFile(${index})"
            >
                ×
            </button>

        </div>
    `;
}

            // ================= OTHER FILE =================
            else{

                div.innerHTML = `
                    <div class="preview-card file-card">

                        <div class="preview-name">
                            📎 ${file.name}
                        </div>

                        <button
                            type="button"
                            class="remove-file"
                            onclick="removeFile(${index})"
                        >
                            ×
                        </button>

                    </div>
                `;
            }

            fileList.appendChild(div);

        });

    }

    function updateInputFiles() {

        const dataTransfer = new DataTransfer();

        selectedFiles.forEach(file => {

            dataTransfer.items.add(file);

        });

        inputFiles.files = dataTransfer.files;

    }

    function removeFile(index) {

        selectedFiles.splice(index, 1);

        updateInputFiles();

        renderFiles();

    }

    // ================= MODAL IMAGE =================

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
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/pengumuman/create.blade.php ENDPATH**/ ?>