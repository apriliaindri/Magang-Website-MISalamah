<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Pilih Mapel
    </title>

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/pilih_mapel.css') }}"
    >

</head>

<body>

    {{-- Title --}}
    <h2>
        Mapel - {{ $kelas->nama_kelas }}
    </h2>

    {{-- List Mapel --}}
    @foreach($mapel as $m)

        <a
            class="mapel"
            href="/tugas/mapel/{{ $kelas->id }}/{{ $m->mapel }}"
        >

            {{ $m->mapel }}

        </a>

    @endforeach

    {{-- JS --}}
    <script src="{{ asset('js/pilih_mapel.js') }}"></script>

</body>

</html>
