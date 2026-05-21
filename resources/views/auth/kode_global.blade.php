<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kode Akses</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="{{ asset('css/kode_kelas.css') }}">
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar">

        <a href="{{ url('/') }}" class="back-btn">
            &#10094; Kembali
        </a>

    </nav>

    {{-- KODE AKSES --}}
    <section class="kode-section">

        <div class="kode-box">

            <h2>Masukkan Kode Akses</h2>

            <form method="POST" action="{{ route('register.kode.cek') }}">
                @csrf

                <input
                    type="text"
                    name="kode"
                    placeholder="Masukkan kode akses"
                    required
                >

                <button type="submit">
                    Masuk
                </button>

                @if(session('error'))
                    <p class="error">
                        {{ session('error') }}
                    </p>
                @endif

            </form>

        </div>

    </section>

</body>
</html>
