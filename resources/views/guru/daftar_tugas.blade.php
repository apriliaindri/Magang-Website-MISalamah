<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Daftar Tugas</title>

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/daftar_tugas.css') }}"
    >

</head>

<body>

    {{-- Topbar --}}
    <div class="topbar">

        <a
            href="#"
            onclick="goBack()"
            class="back-btn"
        >

            <img
                src="{{ asset('img/back.png') }}"
                alt="Back"
            >

        </a>

        <div class="topbar-title">
            Daftar Tugas
        </div>

    </div>

    {{-- Content --}}
    <div class="card">

        <h2>
            Daftar Tugas
        </h2>

        <table>

            <thead>

                <tr>

                    <th>No</th>
                    <th>Judul</th>
                    <th>Mapel</th>
                    <th>Kelas</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($tugas as $t)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $t->judul }}
                        </td>

                        <td>
                            {{ $t->mapel }}
                        </td>

                        <td>
                            {{ $t->nama_kelas }}
                        </td>

                        <td>

                            {{-- Lihat CBT --}}
                            <a
                                href="{{ route('guru.tugas.detail', [
                                    'judul' => $t->judul,
                                    'kelas' => $t->kelas_id,
                                    'mapel' => $t->mapel
                                ]) }}"
                            >

                                <button class="btn btn-primary">
                                    Lihat CBT
                                </button>

                            </a>

                            <br><br>

                            {{-- Lihat Nilai --}}
                            <a
                                href="{{ route('guru.nilai', [
                                    'judul' => $t->judul,
                                    'kelas' => $t->kelas_id,
                                    'mapel' => $t->mapel
                                ]) }}"
                            >

                                <button class="btn btn-success">
                                    Lihat Nilai
                                </button>

                            </a>

                            <br><br>

                            {{-- Delete --}}
                            <form
                                action="{{ route('tugas.delete', $t->id) }}"
                                method="POST"
                            >

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <script>
    const guruDashboardUrl = "{{ route('guru.dashboard') }}";
</script>

    {{-- JS --}}
    <script src="{{ asset('js/daftar_tugas.js') }}"></script>

</body>

</html>
