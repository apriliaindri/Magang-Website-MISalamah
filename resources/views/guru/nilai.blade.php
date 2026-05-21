<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Nilai Siswa
    </title>

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/nilai_siswa.css') }}"
    >

</head>

<body>

    <div class="card">

        {{-- Title --}}
        <h2>
            Nilai Siswa
        </h2>

        {{-- Info --}}
        <p>
            <b>Judul:</b> {{ $judul }}
        </p>

        {{-- Table --}}
        <table>

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Nilai</th>

                </tr>

            </thead>

            <tbody>

                @foreach($nilai as $n)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $n->nama_siswa }}
                        </td>

                        <td>
                            <b>{{ $n->score }}</b>
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    {{-- JS --}}
    <script src="{{ asset('js/nilai_siswa.js') }}"></script>

</body>

</html>
