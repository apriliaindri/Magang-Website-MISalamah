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

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/manage_user.css') }}"
    >

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
/>



</head>

<body>

    {{-- TOPBAR --}}
    <div class="topbar">

        <a
            href="{{ route('kepalasekolah.dashboard') }}"
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

    {{-- CONTENT --}}
    <div class="content">

        <div class="card">

            {{-- HEADER --}}
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

            {{-- TABLE --}}
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

                        @foreach($users as $user)

                        <tr>

                            <td>{{ $user->name }}</td>

                            <td>{{ $user->email }}</td>

                            <td>{{ $user->role }}</td>

                            <td>

                                <div class="action-buttons">

                                    <button
                                        type="button"
                                        class="btn-reset"
                                        onclick="openResetModal({{ $user->id }})"
                                    >
                                        Reset
                                    </button>

                                    <form
                                        action="{{ route('kepalasekolah.user.delete',$user->id) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('DELETE')

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

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    {{-- MODAL TAMBAH USER --}}
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
                action="{{ route('kepalasekolah.user.store') }}"
            >

                @csrf

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

                {{-- PASSWORD --}}
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
    onclick="togglePassword('password', this)"
>
    <i class="fa-solid fa-eye-slash"></i>
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

    {{-- MODAL RESET PASSWORD --}}
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

                @csrf

                {{-- PASSWORD RESET --}}
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
    onclick="togglePassword('new_password', this)"
>
    <i class="fa-solid fa-eye-slash"></i>
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

    {{-- JS --}}
    <script src="{{ asset('js/dashboard_kepalasekolah.js') }}"></script>

</body>

</html>
