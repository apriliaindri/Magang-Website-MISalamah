<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tugas</title>
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
        Daftar Tugas
    </div>

</div>

<div class="card">

<h2>Daftar Tugas</h2>

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

<td>{{ $loop->iteration }}</td>
<td>{{ $t->judul }}</td>
<td>{{ $t->mapel }}</td>
<td>{{ $t->nama_kelas }}</td>

<td>

<a href="{{ route('guru.tugas.detail',[
'judul'=>$t->judul,
'kelas'=>$t->kelas_id,
'mapel'=>$t->mapel
]) }}">
<button class="btn btn-primary">
Lihat CBT
</button>
</a>

<br><br>

<a href="{{ route('guru.nilai',[
'judul'=>$t->judul,
'kelas'=>$t->kelas_id,
'mapel'=>$t->mapel
]) }}">
<button class="btn btn-success">
Lihat Nilai
</button>
</a>

<br><br>

<form action="{{ route('tugas.delete',$t->id) }}" method="POST">
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
