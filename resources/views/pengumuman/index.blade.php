<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Pengumuman</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/pengumuman_index.css') }}"
    >
</head>

<body>

{{-- Topbar --}}
<div class="topbar">
    <div class="topbar-left">

        <a href="{{ url()->previous() }}" class="back-btn">
            <img src="{{ asset('img/back.png') }}" alt="Back">
        </a>

        <div class="topbar-title">
            Daftar Pengumuman
        </div>

    </div>
</div>

{{-- Content --}}
<div class="page-content">
    <div class="container">

        <div class="card">

            {{-- Header --}}
            <div class="card-header">

                <h2>Daftar Pengumuman</h2>

                <a href="{{ route('pengumuman.create') }}" class="tambah-btn">
                    + Tambah Pengumuman
                </a>

            </div>

            {{-- Alert --}}
            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Table --}}
            @forelse($pengumuman as $p)

                @if($loop->first)
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
                @endif

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td class="judul">
                        {{ $p->judul }}
                    </td>

                    <td>
                        @if($p->kelas_id)
                            <span class="badge badge-kelas">
                                Kelas {{ $p->kelas_id }}
                            </span>
                        @else
                            <span class="badge badge-semua-kelas">
                                Semua Kelas
                            </span>
                        @endif
                    </td>

                    <td>
                        {{ $p->created_at->format('d M Y') }}
                    </td>

                    <td>
                        <div class="aksi">

                            <a
                                href="{{ route('pengumuman.detail.pengumuman', $p->id) }}"
                                class="btn btn-detail"
                            >
                                Detail
                            </a>

                            <a
                                href="{{ route('pengumuman.edit', $p->id) }}"
                                class="btn btn-edit"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('pengumuman.destroy', $p->id) }}"
                                method="POST"
                                class="delete-form"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-hapus">
                                    Hapus
                                </button>

                            </form>

                        </div>
                    </td>

                </tr>

                @if($loop->last)
                            </tbody>
                        </table>
                    </div>
                @endif

            @empty

                <div class="empty">
                    Belum ada pengumuman.
                </div>

            @endforelse

        </div>

    </div>
</div>

{{-- JS external (minimal) --}}
<script src="{{ asset('js/pengumuman_index.js') }}"></script>

</body>
</html>
