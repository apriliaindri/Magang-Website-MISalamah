<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Upload Artikel
    </title>

    
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

                <h3>
                    Upload Artikel
                </h3>

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

                
                <label for="title">
                    Judul
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    placeholder="Masukkan judul artikel"
                    required
                >

                
                <label for="category">
                    Kategori
                </label>

                <select
                    id="category"
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

                
                <label for="sub_category">
                    Sub Kategori
                </label>

                <input
                    type="text"
                    id="sub_category"
                    name="sub_category"
                    placeholder="Contoh: Upacara, Lomba, Study Tour"
                >

                
                <label for="content">
                    Isi Artikel
                </label>

                <textarea
                    id="content"
                    name="content"
                    rows="5"
                    placeholder="Tulis isi artikel..."
                    required
                ></textarea>

                
                <label for="files">
                    Upload Foto / File
                </label>

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

    
    <script src="<?php echo e(asset('js/upload_artikel.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views\kepalasekolah\artikel\create.blade.php ENDPATH**/ ?>