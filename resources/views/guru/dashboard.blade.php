<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard Guru</title>

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/dashboard_guru.css') }}"
    >

</head>

<body>

    {{-- Topbar --}}
    <div class="topbar">

        <div
            class="hamburger"
            onclick="toggleSidebar()"
        >
            ☰
        </div>

        <div class="topbar-title">
            Dashboard Guru
        </div>

    </div>

    {{-- Sidebar --}}
    <div
        class="sidebar"
        id="sidebar"
    >

        {{-- Profile --}}
        <div class="profile-card">

            <img
                src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                alt="Profile"
            >

            <div>

                <h3>
                    {{ auth()->user()->name }}
                </h3>

                <p>Guru</p>

            </div>

        </div>

        {{-- Menu --}}
        <a href="{{ route('pengumuman.create') }}">
            <button>Tambah Pengumuman</button>
        </a>

        <a href="/guru/tambah-pg">
            <button>Tambah Tugas</button>
        </a>

        <a href="/guru/daftar-tugas">
            <button>Daftar Tugas</button>
        </a>

        <br><br>

        {{-- Logout --}}
        <form
            action="{{ route('logout') }}"
            method="POST"
        >

            @csrf

            <button
                type="submit"
                class="logout-btn"
            >
                Logout
            </button>

        </form>

    </div>

    {{-- Content --}}
    <div class="content">

        {{-- Form Tugas --}}
        <div
            id="formTugas"
            style="display:none;"
        >

            <div class="card">

                <h3>Tambah Tugas</h3>

                <form
                    method="POST"
                    action="{{ route('guru.simpan.tugas') }}"
                >

                    @csrf

                    {{-- Kelas --}}
                    <select
                        name="kelas_id"
                        required
                    >

                        <option value="">
                            Pilih Kelas
                        </option>

                        @foreach($kelas as $k)

                            <option value="{{ $k->id }}">
                                {{ $k->nama_kelas }}
                            </option>

                        @endforeach

                    </select>

                    {{-- Mapel --}}
                    <select
                        name="mapel"
                        required
                    >

                        <option value="">
                            Pilih Mata Pelajaran
                        </option>

                        <option value="IPA">IPA</option>
                        <option value="MTK">Matematika</option>
                        <option value="BINDO">Bahasa Indonesia</option>
                        <option value="BING">Bahasa Inggris</option>

                    </select>

                    {{-- Judul --}}
                    <input
                        type="text"
                        name="judul"
                        placeholder="Judul Tugas"
                        required
                    >

                    {{-- Soal Container --}}
                    <div id="soalContainer">

                        <div class="soalItem">

                            <input
                                type="text"
                                name="pertanyaan[]"
                                placeholder="Pertanyaan"
                                required
                            >

                            <input
                                type="text"
                                name="pilihan_a[]"
                                placeholder="Pilihan A"
                                required
                            >

                            <input
                                type="text"
                                name="pilihan_b[]"
                                placeholder="Pilihan B"
                                required
                            >

                            <input
                                type="text"
                                name="pilihan_c[]"
                                placeholder="Pilihan C"
                                required
                            >

                            <input
                                type="text"
                                name="pilihan_d[]"
                                placeholder="Pilihan D"
                                required
                            >

                            <select
                                name="jawaban[]"
                                required
                            >

                                <option value="">
                                    Jawaban Benar
                                </option>

                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>

                            </select>

                            <hr>

                        </div>

                    </div>

                    {{-- Action --}}
                    <button
                        type="button"
                        onclick="tambahSoal()"
                    >
                        Tambah Soal
                    </button>

                    <button type="submit">
                        Simpan Tugas
                    </button>

                </form>

            </div>

        </div>

        {{-- Notification --}}
        <div
            id="notifPopup"
            class="notif-popup"
        >

            <div class="notif-box">

                <div
                    id="notifIcon"
                    class="icon"
                ></div>

                <h3 id="notifMessage"></h3>

                <button onclick="closeNotif()">
                    OK
                </button>

            </div>

        </div>

    </div>

    {{-- Session --}}
    <script>

        const successMessage = @json(session('success'));
        const hasError = @json($errors->any());

    </script>

    {{-- JS --}}
    <script src="{{ asset('js/dashboard_guru.js') }}"></script>

</body>

</html>
