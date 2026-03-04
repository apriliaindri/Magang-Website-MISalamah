<a href="/kelas/1" style="font-size:30px; color:red;">
    TEST MASUK KELAS 1
</a>

@extends('layouts.app')

@section('content')

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

<section class="stats-section">
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
</script>

@endsection
