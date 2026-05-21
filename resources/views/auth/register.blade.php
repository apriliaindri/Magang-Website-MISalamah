<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar">

        <a href="{{ url()->previous() }}" class="back-btn">
            &#10094; Kembali
        </a>

    </nav>

    {{-- REGISTER --}}
    <section class="register-section">

        <div class="register-box">

            <h2>Register</h2>

            <form method="POST" action="{{ route('siswa.register.store', $kelas->id) }}">
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
                        onclick="togglePassword()"
                    >
                        👁
                    </span>

                </div>

                <button type="submit">
                    Register
                </button>

                <p class="login-text">
                    Sudah memiliki akun?
                    <a href="{{ route('login') }}">
                        Login
                    </a>
                </p>

                @error('email')
                    <p class="error">
                        {{ $message }}
                    </p>
                @enderror

            </form>

        </div>

    </section>

    <script src="{{ asset('js/register.js') }}"></script>

</body>
</html>
