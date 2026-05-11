@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Rekap Nilai Siswa</h2>

    @if($jawabans->count() > 0)

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban Siswa</th>
                    <th>Nilai</th>
                </tr>
            </thead>

            <tbody>
                @foreach($jawabans as $j)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $j->user->name }}</td>
                        <td>{{ $j->soal->pertanyaan }}</td>
                        <td>{{ $j->jawaban }}</td>
                        <td>{{ $j->nilai }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <p>Belum ada siswa yang mengerjakan.</p>
    @endif
</div>

@endsection
