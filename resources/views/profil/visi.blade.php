@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/styleprofil.css') }}">
@endpush

@section('content')

<div class="page-header">
    <h1>Visi dan Misi</h1>
</div>

<div class="content-section">
    <div class="visi-misi-container">

        <div class="row-item">
            <div class="left-title">
                <h2>Visi</h2>
            </div>
            <div class="right-content">
                <p>
                    “Terbentuknya generasi muslim yang berakidah kuat, beramal sholeh, berakhlaqul karimah, terampil membaca al-Qur'an, cerdas, kreatif, mandiri, berkarakter moderat, berwawasan masa depan dan bertanggung jawab dalam beragama, berbangsa dan bernegara.”
                </p>
            </div>
        </div>

        <div class="row-item">
            <div class="left-title">
                <h2>Misi</h2>
            </div>
            <div class="right-content">
                <ol>
                    <li>Menyelenggarakan pendidikan yang berkualitas dalam pencapaian prestasi akademik dan non akademik.</li>
                    <li>Menyelenggarakan pembelajaran dan pembiasaan dalam mempelajari Al-Qur’an, sholat wajib dan sunnah, serta  menjalankan ajaran agama Islam lainnya.</li>
                    <li>Meningkatkan pembentukan karakter Islami yang bercirikan moderatisme dan berjiwa rahmatan lil ‘alamin yang mampu mengaktualisasikan diri dalam masyarakat.</li>
                    <li>Meningkatkan pengetahuan dan profesionalisme pendidik sesuai dengan perkembangan dunia Pendidikan.</li>
                    <li>Meningkatkan kemampuan pendidik dalam literasi digital dan peningkatan kemampaun teknis dalam digitalisasi pembelajaran.</li>
                    <li>Menyelenggarakan tata kelola madrasah yang efektif, efisien, transparan dan akuntabel.</li>
                </ol>
            </div>
        </div>

    </div>
</div>

@endsection
