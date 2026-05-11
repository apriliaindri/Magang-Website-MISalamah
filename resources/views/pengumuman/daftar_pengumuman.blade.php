<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengumuman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/daftar_tugas.css') }}">
</head>

<body>

<!-- TOPBAR -->
<div class="topbar">

    <a href="#" onclick="goBack()" class="back-btn">
        <img src="/img/back.png" alt="Back">
    </a>

    <div class="topbar-title">
        Daftar Pengumuman
    </div>

</div>

<div class="card">

    <h2>Daftar Pengumuman</h2>

    <table>

        <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Kelas</th>
            <th>Pembuat</th>
            <th>Aksi</th>
        </tr>
        </thead>

        <tbody>

        @foreach($pengumuman as $p)
        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $p->judul }}</td>

            <td>{{ Str::limit($p->isi, 50) }}</td>

            <td>{{ $p->kelas->nama_kelas ?? 'Umum' }}</td>

            <td>{{ $p->user->name ?? '-' }}</td>

           <td>

    <!-- DETAIL / PREVIEW -->
    <a href="{{ route('pengumuman.show', $p->id) }}">
        <button class="btn btn-primary">
            Detail
        </button>
    </a>

    <br><br>

    <!-- EDIT -->
    <a href="{{ route('pengumuman.edit', $p->id) }}">
        <button class="btn btn-warning">
            Edit
        </button>
    </a>

    <br><br>

    <!-- DELETE -->
    @if(auth()->id() == $p->user_id)
    <form action="{{ route('pengumuman.destroy', $p->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            Hapus
        </button>
    </form>
    @endif

</td>

        </tr>
        @endforeach

        </tbody>

    </table>

</div>

<!-- SCRIPT BACK -->
<script>
function goBack(){
    if(document.referrer === window.location.href || document.referrer === ""){
        window.location.href = "{{ route('guru.dashboard') }}";
    }else{
        window.history.back();
    }
}
</script>

</body>
</html>
