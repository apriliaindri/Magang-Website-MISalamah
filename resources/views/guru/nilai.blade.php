<!DOCTYPE html>
<html>
<head>
<title>Nilai Siswa</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

body{
font-family:Poppins,sans-serif;
background:#f4f6f9;
margin:0;
}

.card{
background:white;
padding:30px;
margin:40px auto;
width:90%;
max-width:700px;
border-radius:12px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

table{
width:100%;
border-collapse:collapse;
}

th,td{
padding:10px;
border:1px solid #ddd;
text-align:center;
}

th{
background:#f1f1f1;
}

</style>

</head>

<body>

<div class="card">

<h2>Nilai Siswa</h2>
<p><b>Judul:</b> {{ $judul }}</p>

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
<td>{{ $loop->iteration }}</td>
<td>{{ $n->nama_siswa }}</td>
<td><b>{{ $n->score }}</b></td>
</tr>
@endforeach

</tbody>

</table>

</div>

</body>
</html>
