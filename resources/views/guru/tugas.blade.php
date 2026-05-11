<!DOCTYPE html>
<html>
<head>

<title>Daftar Soal</title>

<style>

body{
font-family:Poppins;
background:#f5f7fa;
padding:30px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
}

th,td{
border:1px solid #ddd;
padding:10px;
text-align:center;
}

th{
background:#f1f1f1;
}

</style>

</head>

<body>

<h2>Daftar Soal - {{ $mapel }}</h2>

<table>

<tr>
<th>No</th>
<th>Pertanyaan</th>
<th>Jawaban</th>
<th>Nilai</th>
</tr>

@foreach($soal as $s)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $s->pertanyaan }}</td>

<td>{{ $s->jawaban_benar }}</td>

<td>{{ $s->nilai }}</td>

</tr>

@endforeach

</table>

</body>
</html>
