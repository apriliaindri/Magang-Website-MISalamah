@extends('layouts.auth')

@section('content')
<section class="login-section">
    <div class="login-box">

        <h2>Masukkan Kode Kelas</h2>

        <form method="POST" action="{{ route('siswa.kode.cek', $kelas->id) }}">
            @csrf

            <input type="text" name="kode_kelas"
                   placeholder="Masukkan kode kelas" required>

            <button type="submit">Masuk</button>

            @if(session('error'))
                <p class="error">{{ session('error') }}</p>
            @endif
        </form>

    </div>
</section>
@endsection
