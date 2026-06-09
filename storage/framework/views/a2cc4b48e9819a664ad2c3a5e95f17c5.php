<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Manage User
    </title>

    
    <link
        rel="stylesheet"
        href="<?php echo e(asset('css/manage_user.css')); ?>"
    >

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
/>



</head>

<body>

    
    <div class="topbar">

        <a
            href="<?php echo e(route('kepalasekolah.dashboard')); ?>"
            class="back-btn"
        >

            <img
                src="/img/back.png"
                alt="Back"
            >

        </a>

        <div class="topbar-title">
            Manage User
        </div>

    </div>

    
    <div class="content">

        <div class="card">

            
            <div class="header-flex">

                <h3>
                    Data User
                </h3>

                <button
                    type="button"
                    class="add-user-btn"
                    onclick="openModal()"
                >
                    + Tambah User
                </button>

            </div>

            
            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>

                            <td><?php echo e($user->name); ?></td>

                            <td><?php echo e($user->email); ?></td>

                            <td><?php echo e($user->role); ?></td>

                            <td>

                                <div class="action-buttons">

    <button
        type="button"
        class="btn-role"
        onclick="openRoleModal(<?php echo e($user->id); ?>, '<?php echo e($user->role); ?>')"
    >
        Role
    </button>

    <button
        type="button"
        class="btn-reset"
        onclick="openResetModal(<?php echo e($user->id); ?>)"
    >
        Reset
    </button>

    <form
        action="<?php echo e(route('kepalasekolah.user.delete',$user->id)); ?>"
        method="POST"
    >
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>

        <button
            type="submit"
            class="btn-delete"
        >
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

        </div>

    </div>

    
    <div id="userModal" class="modal">

        <div class="modal-content">

            <span
                class="close"
                onclick="closeModal()"
            >
                &times;
            </span>

            <h3>
                Tambah User
            </h3>

            <form
                method="POST"
                action="<?php echo e(route('kepalasekolah.user.store')); ?>"
            >

                <?php echo csrf_field(); ?>

                <input
                    type="text"
                    name="name"
                    placeholder="Nama"
                    required
                >

                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    required
                >

                
                <div class="password-wrapper">

                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Password"
                        required
                    >
<span
    class="toggle-password"
    onclick="togglePassword('password')"
>
    👁
</span>


                </div>

                <select
                    name="role"
                    required
                >

                    <option value="">
                        -- Pilih Role --
                    </option>

                    <option value="guru">
                        Guru
                    </option>

                    <option value="kepala_sekolah">
                        Kepala Sekolah
                    </option>

                </select>

                <button
                    type="submit"
                    class="btn-submit"
                >
                    Simpan
                </button>

            </form>

        </div>

    </div>

    
    <div id="resetModal" class="modal">

        <div class="modal-content">

            <span
                class="close"
                onclick="closeResetModal()"
            >
                &times;
            </span>

            <h3>
                Reset Password
            </h3>

            <form
                id="resetForm"
                method="POST"
            >

                <?php echo csrf_field(); ?>

                
                <div class="password-wrapper">

                    <input
                        type="password"
                        name="new_password"
                        id="new_password"
                        placeholder="Password Baru"
                        required
                    >
<span
    class="toggle-password"
    onclick="togglePassword('new_password')"
>
    👁
</span>
                </div>

                <button
                    type="submit"
                    class="btn-submit"
                >
                    Simpan Password
                </button>

            </form>

        </div>

    </div>

<div id="roleModal" class="modal">

    <div class="modal-content">

        <span
            class="close"
            onclick="closeRoleModal()"
        >
            &times;
        </span>

        <h3>Ubah Role</h3>

        <form
            id="roleForm"
            method="POST"
        >
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

           <select
    name="role"
    id="roleSelect"
    required
>
    <option value="guru">Guru</option>
    <option value="siswa">Siswa</option>
    <option value="kepala_madrasah">Kepala Madrasah</option>
</select>

            <button
                type="submit"
                class="btn-submit"
            >
                Simpan Role
            </button>

        </form>

    </div>

</div>
    
    <script src="<?php echo e(asset('js/dashboard_kepalasekolah.js')); ?>"></script>

</body>

</html>
<?php /**PATH D:\XAMPP2\htdocs\Web-MISalamah\resources\views/kepalasekolah/manage_user.blade.php ENDPATH**/ ?>