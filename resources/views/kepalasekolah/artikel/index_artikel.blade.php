<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Daftar Artikel</title>

    {{-- Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/pengumuman_index.css') }}"
    >

</head>

<body>

    {{-- Topbar --}}
    <header class="topbar">

        <div class="topbar-left">

            <a
                href="javascript:history.back()"
                class="back-btn"
            >

                <img
                    src="{{ asset('img/back.png') }}"
                    alt="Back"
                >

            </a>

            <h1 class="topbar-title">
                Daftar Artikel
            </h1>

        </div>

    </header>

    {{-- Main Content --}}
    <main class="page-content">

        <div class="container">

            <div class="card">

                {{-- Card Header --}}
                <div class="card-header">

                    <h2>
                        Daftar Artikel
                    </h2>

                    <a
                        href="{{ route('kepalasekolah.artikel.create') }}"
                        class="tambah-btn"
                    >

                        + Upload Artikel

                    </a>

                </div>

                {{-- Alert Success --}}
                @if(session('success'))

                    <div class="alert-success">

                        {{ session('success') }}

                    </div>

                @endif

                {{-- Table --}}
                @if($articles->count() > 0)

                    <div class="table-wrapper">

                        <table>

                            <thead>

                                <tr>

                                    <th>No</th>

                                    <th>Judul</th>

                                    <th>Kategori</th>

                                    <th>Tanggal</th>

                                    <th>Aksi</th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach($articles as $article)

                                    <tr>

                                        {{-- Nomor --}}
                                        <td>

                                            {{ $loop->iteration }}

                                        </td>

                                        {{-- Judul --}}
                                        <td class="judul">

                                            {{ $article->title }}

                                        </td>

                                        {{-- Kategori --}}
                                        <td>

                                            <span class="badge badge-umum">

                                                {{ $article->category }}

                                            </span>

                                        </td>

                                        {{-- Tanggal --}}
                                        <td>

                                            {{ $article->created_at->format('d M Y') }}

                                        </td>

                                        {{-- Aksi --}}
                                        <td>

                                            <div class="aksi">

                                                {{-- Detail --}}
                                                <a
                                                    href="{{ route('artikel.detail.artikel', $article->id) }}"
                                                    class="btn btn-detail"
                                                >

                                                    Detail

                                                </a>

                                                {{-- Edit --}}
                                                <a
                                                    href="{{ route('kepalasekolah.artikel.edit.artikel', $article->id) }}"
                                                    class="btn btn-edit"
                                                >

                                                    Edit

                                                </a>

                                                {{-- Hapus --}}
                                                <form
                                                    action="#"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin hapus artikel ini?')"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="btn btn-hapus"
                                                    >

                                                        Hapus

                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    {{-- Empty State --}}
                    <div class="empty">

                        Belum ada artikel.

                    </div>

                @endif

            </div>

        </div>

    </main>

</body>
</html>
