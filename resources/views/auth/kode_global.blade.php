@extends('layouts.auth')

@section('content')
<section class="login-section">
    <div class="login-box">

        <h2>Masukkan Kode Akses</h2>
<form method="POST" action="{{ route('register.kode.cek') }}">
            @csrf
<input type="text" name="kode"
       placeholder="Masukkan kode akses" required>

            <button type="submit">Masuk</button>

            @if(session('error'))
                <p class="error">{{ session('error') }}</p>
            @endif
        </form>

    </div>
</section>
@endsection
