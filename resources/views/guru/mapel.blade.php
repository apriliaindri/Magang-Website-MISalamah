<!DOCTYPE html>
<html>
<head>

<title>Pilih Mapel</title>

<style>

body{
font-family:Poppins;
background:#f5f7fa;
padding:30px;
}

.mapel{
display:block;
background:#4CAF50;
color:white;
padding:15px;
margin-bottom:10px;
text-decoration:none;
border-radius:8px;
}

</style>

</head>

<body>

<h2>Mapel - {{ $kelas->nama_kelas }}</h2>

@foreach($mapel as $m)

<a class="mapel"
href="/tugas/mapel/{{ $kelas->id }}/{{ $m->mapel }}">
{{ $m->mapel }}
</a>

@endforeach

</body>
</html>
