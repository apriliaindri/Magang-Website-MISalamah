@extends('layouts.auth')

@section('content')
<section class="login-section">
    <div class="login-box">

        <h2>Register</h2>

        <form method="POST" action="{{ route('register.global') }}">
            @csrf

            <input type="text" name="name" placeholder="Nama Lengkap" required>

            <input type="email" name="email" placeholder="Email" required>

            <div class="password-wrapper">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword()">👁</span>
            </div>

            <button type="submit">Register</button>

            @if(session('error'))
                <p class="error">{{ session('error') }}</p>
            @endif

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
