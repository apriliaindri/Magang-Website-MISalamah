<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Daftar Soal
    </title>

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/daftar_soal.css') }}"
    >

</head>

<body>

    {{-- Title --}}
    <h2>
        Daftar Soal - {{ $mapel }}
    </h2>

    {{-- Table --}}
    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Nilai</th>

            </tr>

        </thead>

        <tbody>

            @foreach($soal as $s)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $s->pertanyaan }}
                    </td>

                    <td>
                        {{ $s->jawaban_benar }}
                    </td>

                    <td>
                        {{ $s->nilai }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>
