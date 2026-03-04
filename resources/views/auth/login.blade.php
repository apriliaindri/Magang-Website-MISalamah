@extends('layouts.auth')

@section('content')
<section class="login-section">
    <div class="login-box">

        <h2>Login</h2>
@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input type="email" name="email" placeholder="Email" required>

            <div class="password-wrapper">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword()">👁</span>
            </div>

            <button type="submit">Login</button>

            <p style="margin-top:15px;">
                Belum memiliki akun?
                <a href="{{ route('siswa.register', 1) }}">Register</a>
            </p>

            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror

        </form>

    </div>
</section>

<script>
function togglePassword() {
    const password = document.getElementById("password");
    password.type = password.type === "password" ? "text" : "password";
}
</script>
@endsection
