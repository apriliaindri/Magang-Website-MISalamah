<!-- NAVBAR -->
<div class="navbar">

    <div class="logo-area">
        <img src="{{ asset('img/LogoMI.png') }}" alt="Logo">
        <div class="school-name">MI Salamah</div>
    </div>

    <div class="nav-menu">

        <a href="{{ route('home') }}">Beranda</a>

        <!-- Profil -->
        <div class="dropdown">
            <a href="#" class="has-dropdown">Profil</a>

            <div class="dropdown-content">
                <a href="{{ route('visi') }}">Visi & Misi</a>
                <a href="{{ route('tatib') }}">Tata Tertib</a>
            </div>
        </div>

        <!-- Kelas -->
        <div class="dropdown">
            <a href="#" class="has-dropdown">Kelas</a>

            <div class="dropdown-content">
                @for ($i = 1; $i <= 6; $i++)
                    <a href="{{ route('pilih.kelas', $i) }}">
                        Kelas {{ $i }}
                    </a>
                @endfor
            </div>
        </div>

        <a href="#pengumuman">Pengumuman</a>
        <a href="#artikel">Artikel</a>
        <a href="#footer">Kontak</a>

        @guest
            <a href="{{ route('login') }}">Login</a>
        @endguest

        @auth

            @php
                $role = auth()->user()->role;
            @endphp

            <a href="{{ match($role) {
                'guru' => url('/guru'),
                'admin' => url('/admin'),
                'kepala_sekolah' => url('/kepalasekolah'),
                'siswa' => url('/siswa'),
                default => '#'
            } }}">
                Dashboard
            </a>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf

                <button
                    type="submit"
                    style="background:none;border:none;cursor:pointer;font-family:Poppins;"
                >
                    Logout
                </button>
            </form>

        @endauth

    </div>

</div>
