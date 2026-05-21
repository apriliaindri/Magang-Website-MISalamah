@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/styleprofil.css') }}">
@endpush

@section('content')

<div class="page-header">
    <h1>Tata Tertib Sekolah</h1>
</div>

<div class="content-section">

    <ol class="tatib-list">
        <li>Siswa wajib hadir tepat waktu.</li>
        <li>Siswa mengenakan seragam sesuai ketentuan.</li>
        <li>Menjaga kebersihan lingkungan sekolah.</li>
        <li>Bersikap sopan kepada guru dan sesama siswa.</li>
        <li>Tidak membawa barang terlarang ke sekolah.</li>
        <li>Mematuhi seluruh peraturan sekolah.</li>
    </ol>

</div>

@endsection
