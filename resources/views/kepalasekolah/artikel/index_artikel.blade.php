<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Daftar Artikel</title>

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('css/pengumuman_index.css') }}"
    >

</head>

<body>

    {{-- Topbar --}}
    <div class="topbar">

        <div class="topbar-left">

            <a
                href="javascript:history.back()"
                class="back-btn"
            >

                <img
                    src="/img/back.png"
                    alt="Back"
                >

            </a>

            <div class="topbar-title">

                Daftar Artikel

            </div>

        </div>

    </div>

    {{-- Content --}}
    <div class="page-content">

        <div class="container">

            <div class="card">

                {{-- Header --}}
                <div class="card-header">

                    <h2>Semua Artikel</h2>

                    <a
                        href="{{ route('kepalasekolah.artikel.create') }}"
                        class="tambah-btn"
                    >

                        + Upload Artikel

                    </a>

                </div>

                {{-- Alert --}}
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

                                        <td>

                                            {{ $loop->iteration }}

                                        </td>

                                        <td class="judul">

                                            {{ $article->title }}

                                        </td>

                                        <td>

                                            <span class="badge badge-umum">

                                                {{ $article->category }}

                                            </span>

                                        </td>

                                        <td>

                                            {{ $article->created_at->format('d M Y') }}

                                        </td>

                                        <td>

                                            <div class="aksi">
<a
    href="{{ route('artikel.detail.artikel', $article->id) }}"
    class="btn btn-detail"
>

    Detail

</a>

<a
    href="{{ route('kepalasekolah.artikel.edit.artikel', $article->id) }}"
    class="btn btn-edit"
>
    Edit
</a>

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

                    <div class="empty">

                        Belum ada artikel.

                    </div>

                @endif

            </div>

        </div>

    </div>

</body>
</html>
