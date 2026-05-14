@extends('layouts.app')

@section('content')

{{-- HERO (DI LUAR) --}}
<section class="hero">
    <div class="hero-wrapper">
        <div class="hero-text">
            <h1>Selamat Datang di</h1>
            <h2>MI Salamah</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <div class="hero-image">
            <img src="{{ asset('img/LogoMI.png') }}" alt="Foto Sekolah">
        </div>
    </div>
</section>


{{-- SECTION AUTO WARNA --}}
<div class="main-sections">

    <section class="section stats-section">
        <div class="stats-container">
            <div class="stat-box">
                <h2 class="counter" data-target="300">0</h2>
                <p>Jumlah Siswa</p>
            </div>

            <div class="stat-box">
                <h2 class="counter" data-target="50">0</h2>
                <p>Jumlah Guru</p>
            </div>
        </div>
    </section>

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
            $pengumumanChunks = $pengumuman->take(9)->chunk(3);
        @endphp

        @if($pengumumanChunks->count() > 0)

        <div class="pengumuman-slider-wrapper">

            {{-- BUTTON KIRI --}}
            <button class="slide-btn prev-btn" id="prevPengumuman">
                &#10094;
            </button>

            {{-- SLIDER --}}
            <div class="pengumuman-slider" id="pengumumanSlider">

                @foreach($pengumumanChunks as $chunk)

                <div class="pengumuman-slide">

                    @foreach($chunk as $p)

                    <a href="{{ route('pengumuman.detail.pengumuman', $p->id) }}"
   class="pengumuman-card">


@php

$gambar = [];

if(is_array($p->gambar)){

    $gambar = $p->gambar;

}else{

    $gambar = json_decode($p->gambar, true) ?? [];

}

$filePertama = $gambar[0] ?? null;

$ext = $filePertama
    ? strtolower(pathinfo($filePertama, PATHINFO_EXTENSION))
    : null;

@endphp


@if($filePertama)

    @if(in_array($ext, ['jpg','jpeg','png','webp']))

        <img src="{{ asset('storage/'.$filePertama) }}">

    @elseif($ext == 'pdf')

        <div class="pdf-preview">

            <img src="{{ asset('img/pdf-icon.png') }}">

            <span>PDF Document</span>

        </div>

    @else

        <img src="{{ asset('img/default-news.jpg') }}">

    @endif

@else

    <img src="{{ asset('img/default-news.jpg') }}">

@endif


<div class="pengumuman-content">

    <div class="meta-row">

        <span class="kategori-home">

            {{ $p->kelas ? $p->kelas->nama_kelas : 'Umum' }}

        </span>

        <span class="tanggal">
            {{ $p->created_at->format('d M Y') }}
        </span>

    </div>

    <h3>
        {{ \Illuminate\Support\Str::limit($p->judul, 40) }}
    </h3>

</div>

</a>

                    @endforeach

                </div>

                @endforeach

            </div>

            {{-- BUTTON KANAN --}}
            <button class="slide-btn next-btn" id="nextPengumuman">
                &#10095;
            </button>

        </div>

        @else

            <p>Tidak ada pengumuman.</p>

        @endif

    </div>

</section>

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
            $artikelChunks = $articles->take(9)->chunk(3);
        @endphp

        @if($artikelChunks->count() > 0)

        <div class="artikel-slider-wrapper">

          <button class="slide-btn artikel-prev-btn" id="prevArtikel">
    &#10094;
</button>

<button class="slide-btn artikel-next-btn" id="nextArtikel">
    &#10095;
</button>
            {{-- SLIDER --}}
            <div class="artikel-slider" id="artikelSlider">

                @foreach($artikelChunks as $chunk)

                <div class="artikel-slide">

                    @foreach($chunk as $a)

                    <a href="{{ route('artikel.detail.artikel', $a->id) }}" class="artikel-card">

                        @if($a->image)
                            <img src="{{ asset('storage/'.$a->image) }}" alt="">
                        @else
                            <img src="{{ asset('img/default-news.jpg') }}" alt="">
                        @endif

                        <div class="artikel-content">

                            <span class="tanggal">
                                {{ $a->created_at->format('d M Y') }}
                            </span>

                            <h3>
                                {{ \Illuminate\Support\Str::limit($a->title, 55) }}
                            </h3>
                        </div>

                    </a>

                    @endforeach

                </div>

                @endforeach

            </div>

        </div>

        @else

            <p>Tidak ada artikel.</p>

        @endif

    </div>

</section>
<section id="footer" class="section">
    <div class="container footer-wrapper">

        <!-- KIRI: MAP -->
        <div class="footer-map">
            <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.3924063860295!2d110.85806027400474!3d-7.532108692481065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a170badcda4e5%3A0xfbc227bc5df3acc5!2sMI%20Salamah%20Sulurejo!5e0!3m2!1sen!2sus!4v1778482707389!5m2!1sen!2sus"
    style="border:0;"
    loading="lazy">
</iframe>
        </div>

        <!-- KANAN: INFO -->
        <div class="footer-info">
            <h2>Alamat & Kontak</h2>

            <p><strong>Alamat:</strong><br>
                Jl. Contoh No. 123, Kota Anda
            </p>

            <p><strong>Email:</strong><br>
                info@misalamah.sch.id
            </p>

            <p><strong>No. Telepon:</strong><br>
                0812-3456-7890
            </p>
        </div>

    </div>

    <footer class="footer-credit">
    <p>MI Salamah © 2026</p>
</footer>
</section>

</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const increment = target / 100;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 20);
            } else {
                counter.innerText = target + "+";
            }
        };

        updateCount();
    });
});

let currentSlide = 0;

const slider = document.getElementById('pengumumanSlider');
const slides = document.querySelectorAll('.pengumuman-slide');

document.getElementById('nextPengumuman')
.addEventListener('click', () => {

    if(currentSlide < slides.length - 1){

        currentSlide++;

        slider.style.transform =
            `translateX(-${currentSlide * 100}%)`;
    }

});

document.getElementById('prevPengumuman')
.addEventListener('click', () => {

    if(currentSlide > 0){

        currentSlide--;

        slider.style.transform =
            `translateX(-${currentSlide * 100}%)`;
    }

});
</script>


@endsection
