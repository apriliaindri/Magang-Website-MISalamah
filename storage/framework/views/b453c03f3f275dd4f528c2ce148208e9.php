<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <title>Upload Artikel</title>

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/tambah_pengumuman.css')); ?>"
    >

</head>

<body>

    
    <div class="topbar">

        <a
            href="#"
            onclick="goBack()"
            class="back-btn"
        >
            <img
                src="/img/back.png"
                alt="Back"
            >
        </a>

        <div class="topbar-title">
            Upload Artikel
        </div>

    </div>

    
    <div class="content">

        <div class="card">

            <div class="header-flex">

                <h3>Upload Artikel</h3>

                <a
                    href="<?php echo e(route('kepalasekolah.artikel.index')); ?>"
                    class="link-btn"
                >
                    Daftar Artikel
                </a>

            </div>

            <?php if(session('success')): ?>

                <div class="alert-success">

                    <?php echo e(session('success')); ?>


                </div>

            <?php endif; ?>

            <form
                method="POST"
                action="<?php echo e(route('kepalasekolah.artikel.store')); ?>"
                enctype="multipart/form-data"
            >

                <?php echo csrf_field(); ?>

                
                <label>Judul</label>

                <input
                    type="text"
                    name="title"
                    placeholder="Masukkan judul artikel"
                    required
                >

                
                <label>Kategori</label>

                <select
                    name="category"
                    required
                >

                    <option value="">
                        -- Pilih Kategori --
                    </option>

                    <option value="Berita">
                        Berita
                    </option>

                    <option value="Kegiatan">
                        Kegiatan
                    </option>

                    <option value="Pengumuman">
                        Pengumuman
                    </option>

                    <option value="Prestasi">
                        Prestasi
                    </option>

                    <option value="Agenda">
                        Agenda Sekolah
                    </option>

                </select>

                
                <label>Sub Kategori</label>

                <input
                    type="text"
                    name="sub_category"
                    placeholder="Contoh: Upacara, Lomba, Study Tour"
                >

                
                <label>Isi Artikel</label>

                <textarea
                    name="content"
                    rows="5"
                    placeholder="Tulis isi artikel..."
                    required
                ></textarea>

                
                <label>Upload Foto / File</label>

                <input
                    type="file"
                    id="files"
                    name="images[]"
                    multiple
                    accept=".jpg,.jpeg,.png,.webp,.pdf,.doc,.docx"
                >

                
                <div id="file-list"></div>

                <button
                    type="submit"
                    class="btn"
                >
                    Upload Artikel
                </button>

            </form>

        </div>

    </div>

    <script>

        function goBack() {

            if (
                document.referrer === window.location.href ||
                document.referrer === ""
            ) {

                window.location.href =
                "<?php echo e(route('kepalasekolah.dashboard')); ?>";

            } else {

                window.history.back();

            }

        }

        const inputFiles =
        document.getElementById('files');

        const fileList =
        document.getElementById('file-list');

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

                const div =
                document.createElement('div');

                div.classList.add('file-item');

                div.innerHTML = `
                    <div class="file-left">

                        <span>📎</span>

                        <span>${file.name}</span>

                    </div>

                    <button
                        type="button"
                        class="remove-file"
                        onclick="removeFile(${index})"
                    >
                        ×
                    </button>
                `;

                fileList.appendChild(div);

            });

        }

        function updateInputFiles() {

            const dataTransfer =
            new DataTransfer();

            selectedFiles.forEach(file => {

                dataTransfer.items.add(file);

            });

            inputFiles.files =
            dataTransfer.files;

        }

        function removeFile(index) {

            selectedFiles.splice(index, 1);

            updateInputFiles();

            renderFiles();

        }

    </script>

</body>
</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/kepalasekolah/artikel/create.blade.php ENDPATH**/ ?>