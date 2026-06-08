@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/home.css') }}">

{{-- HERO --}}
<section class="hero">
    <div class="hero-wrapper">

        <div class="hero-text">
            <h1>Selamat Datang di</h1>
            <h2>MI Salamah</h2>
            <p>Cerdas & Berakhlak Qur'ani</p>
        </div>

        <div class="hero-image">
            <img src="{{ asset('img/LogoMI.png') }}" alt="Foto Sekolah">
        </div>

    </div>
</section>

<div class="main-sections">

    {{-- STATS --}}
    <section class="section stats-section">
        <div class="stats-container">

            <div class="stat-box">
                <h2 class="counter" data-target="250">0</h2>
                <p>Jumlah Siswa</p>
            </div>

            <div class="stat-box">
                <h2 class="counter" data-target="30">0</h2>
                <p>Jumlah Guru</p>
            </div>

        </div>
    </section>

    {{-- PENGUMUMAN --}}
    <section id="pengumuman" class="section pengumuman-section">

        <div class="container">

            <div class="pengumuman-header">
                <h2>Pengumuman</h2>

                <div class="header-line"></div>

                <a href="{{ route('pengumuman.daftar.pengumuman') }}" class="lihat-semua">
                    Lihat semua
                </a>
            </div>

            @php
                $pengumumanItems = $pengumuman->take(9);
            @endphp

            @if($pengumumanItems->count())

            <div class="pengumuman-slider-wrapper">

                <button class="slide-btn prev-btn" id="prevPengumuman">
                    &#10094;
                </button>

                <div class="pengumuman-slider" id="pengumumanSlider">

                    @foreach($pengumumanItems->chunk(3) as $chunk)

                        <div class="pengumuman-slide">

                            @foreach($chunk as $p)

                                @include('partials.card_pengumuman', ['p' => $p])

                            @endforeach

                        </div>

                    @endforeach

                </div>

                <button class="slide-btn next-btn" id="nextPengumuman">
                    &#10095;
                </button>

            </div>

            @endif

        </div>

    </section>

    {{-- ARTIKEL --}}
    <section id="artikel" class="section artikel-section">

        <div class="container">

            <div class="artikel-header">
                <h2>Artikel</h2>

                <div class="header-line"></div>

                <a href="{{ route('artikel.daftar.artikel') }}" class="lihat-semua">
                    Lihat semua
                </a>
            </div>

            @php
                $artikelItems = $articles->take(9);
            @endphp

            @if($artikelItems->count())

            <div class="artikel-slider-wrapper">

                <button class="slide-btn artikel-prev-btn" id="prevArtikel">
                    &#10094;
                </button>

                <button class="slide-btn artikel-next-btn" id="nextArtikel">
                    &#10095;
                </button>

                <div class="artikel-slider" id="artikelSlider">

                    @foreach($artikelItems->chunk(3) as $chunk)

                        <div class="artikel-slide">

                            @foreach($chunk as $a)

                                @include('partials.card_artikel', ['a' => $a])

                            @endforeach

                        </div>

                    @endforeach

                </div>

            </div>

            @endif

        </div>

    </section>

    {{-- FOOTER --}}
    <section id="footer" class="section">

        <div class="container footer-wrapper">

            <div class="footer-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.3924063860295!2d110.85806027400474!3d-7.532108692481065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a170badcda4e5%3A0xfbc227bc5df3acc5!2sMI%20Salamah%20Sulurejo!5e0!3m2!1sen!2sus!4v1778482707389!5m2!1sen!2sus"
                    style="border:0;"
                    loading="lazy">
                </iframe>
            </div>

<div class="footer-info">

    <h2>Alamat & Kontak</h2>

    <p>
        <strong>Alamat:</strong><br>
        <a href="https://maps.app.goo.gl/yMtzwr31doxBUxKT9" target="_blank">
            Bulurejo, Plesungan, Kec. Gondangrejo, Kabupaten Karanganyar, Jawa Tengah 57181, Indonesia
        </a>
    </p>

    <p>
        <strong>Email:</strong><br>
        <a href="mailto:misalamah1987@gmail.com">
            misalamah1987@gmail.com
        </a>
    </p>

    <p>
        <strong>No. Telepon:</strong><br>
        <a href="https://wa.me/6281234567890" target="_blank">
            0812-3456-7890
        </a>
    </p>

    <p>
        <strong>Youtube:</strong><br>
        <a href="https://www.youtube.com/@SalamahSulurejo/shorts" target="_blank">
            Salamah Sulurejo
        </a>
    </p>

    <p>
        <strong>Facebook:</strong><br>
        <a href="https://www.facebook.com/share/14anWLtCRbW/" target="_blank">
            Arif Salamah
        </a>
    </p>

</div>
        </div>

        <footer class="footer-credit">
            <p>MI Salamah © 2026</p>
        </footer>

    </section>

</div>

<script src="{{ asset('js/home.js') }}"></script>

@endsection
