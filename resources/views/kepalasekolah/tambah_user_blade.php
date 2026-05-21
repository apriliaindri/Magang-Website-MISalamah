<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah User</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/tambah_user.css') }}"
    >

</head>

<body>

    <div class="card">

        <h3>Tambah User</h3>

        <form
            method="POST"
            action="{{ route('kepalasekolah.user.store') }}"
        >

            @csrf

            <input
                type="text"
                name="name"
                placeholder="Nama Lengkap"
                required
            >

            <input
                type="email"
                name="email"
                placeholder="Email"
                required
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                required
            >

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

            <button type="submit">
                Simpan
            </button>

        </form>

    </div>

    {{-- NOTIFICATION POPUP --}}
    <div id="notifPopup" class="notif-popup">

        <div class="notif-box">

            <div
                id="notifIcon"
                class="icon"
            ></div>

            <h3 id="notifMessage"></h3>

            <button
                type="button"
                onclick="closeNotif()"
            >
                OK
            </button>

        </div>

    </div>

    @if(session('success'))

        <script>

            window.notifSuccess =
                @json(session('success'));

        </script>

    @endif

    @if($errors->any())

        <script>

            window.notifError =
                "Gagal menambahkan user, coba lagi!";

        </script>

    @endif

    <script src="{{ asset('js/tambah_user.js') }}"></script>

</body>
</html>
