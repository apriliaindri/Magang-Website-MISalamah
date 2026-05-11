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

                        @if($p->gambar)
                            <img src="{{ asset('storage/'.$p->gambar) }}" alt="">
                        @else
                            <img src="{{ asset('img/default-news.jpg') }}" alt="">
                        @endif

                        <div class="pengumuman-content">

                            <span class="tanggal">
                                {{ $p->created_at->format('d M Y') }}
                            </span>

                           <h3>
    {{ \Illuminate\Support\Str::limit($p->judul, 55) }}
</h3>

<p>
    {{ \Illuminate\Support\Str::limit(strip_tags($p->isi), 90) }}
</p>
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

                            <p>
                                {{ \Illuminate\Support\Str::limit(strip_tags($a->content), 90) }}
                            </p>

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
                src="https://www.google.com/maps?q=-7.250445,112.768845&z=15&output=embed">
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
