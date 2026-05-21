<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Website Sekolah' }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    {{-- CSS utama --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- CSS tambahan --}}
    @stack('styles')

</head>
<body>

    @include('partials.navbar')

    <main class="main-content">
        @yield('content')
    </main>

</body>
</html>
