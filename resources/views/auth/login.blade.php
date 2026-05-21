<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar">

        <a href="{{ url('/') }}" class="back-btn">
            &#10094; Kembali
        </a>

    </nav>

    {{-- LOGIN --}}
    <section class="login-section">

        <div class="login-box">

            <h2>Login</h2>

            @if(session('success'))
                <p class="success">
                    {{ session('success') }}
                </p>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

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
                        id="togglePassword"
                    >
                        👁
                    </span>

                </div>

                <button type="submit">
                    Login
                </button>

                <p class="register-text">
                    Belum memiliki akun?
                    <a href="{{ route('register.kode') }}">
                        Register
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

    <script src="{{ asset('js/login.js') }}"></script>

</body>
</html>
