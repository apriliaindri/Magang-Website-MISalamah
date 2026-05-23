@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/styleprofil.css') }}">
@endpush

@section('content')

<div class="page-header">
    <h1>Tata Tertib Madrasah</h1>
</div>

<div class="content-section">

    <div class="tatib-container">

        {{-- =========================
            TATA TERTIB GURU
        ========================== --}}
        <div class="tatib-section">

            <h2 class="section-title">
                Tata Tertib Guru MIS Salamah
            </h2>

            <div class="section-content">

                <ol>
                    <li>Berkewajiban datang dan pulang tepat waktu sesuai dengan jadwal yang telah ditentukan.</li>

                    <li>Berbakti membimbing anak didik seutuhnya untuk membentuk manusia yang berakhlak mulia dan berpengetahuan.</li>

                    <li>Memiliki kejujuran profesional dalam menerapkan kurikulum sesuai dengan kebutuhan anak didik masing-masing.</li>

                    <li>Mengadakan komunikasi terutama dalam memperoleh informasi tentang anak didik, tetapi menghindari diri dari segala bentuk penyalahgunaan.</li>

                    <li>Menciptakan suasana kehidupan madrasah dan memelihara hubungan dengan orang tua murid sebaik-baiknya bagi kepentingan anak didik.</li>

                    <li>Memelihara hubungan baik dengan masyarakat disekitar madrasah maupun masyarakat yang lebih luas untuk kepentingan pendidikan.</li>

                    <li>Secara sendiri-sendiri dan atau bersama-sama berusaha mengembangkan dan meningkatkan mutu profesinya.</li>

                    <li>Menciptakan dan memelihara hubungan antara sesama guru.</li>

                    <li>Melaksanakan segala ketentuan yang merupakan kebijakan pemerintah dalam bidang pendidikan.</li>

                    <li>Memberikan teladan dan menjaga nama baik lembaga dan profesi.</li>

                    <li>Mentaati tata tertib dan kode etik guru.</li>

                    <li>Berpakaian yang menutup aurat sesuai ajaran Islam.</li>

                    <li>Tidak merokok selama berada di lingkungan satuan pendidikan.</li>
                </ol>

            </div>

        </div>

{{-- =========================
    TATA TERTIB SISWA
========================= --}}
<div class="tatib-section">

    <h2 class="section-title">
        Tata Tertib Siswa MIS Salamah
    </h2>

    <div class="section-content">

        {{-- TATIB UMUM --}}
        <div class="sub-section">

            <h3>Tata Tertib Umum</h3>

            <ol>
                <li>Wajib menjaga nama baik madrasah.</li>

<li>
    Wajib memelihara / melestarikan 9K lingkungan madrasah 
    (Keamanan, Kebersihan, Ketertiban, Keindahan, Kekeluargaan, 
    Kerindangan, Kesehatan, Keterbukaan dan Keteladanan).
</li>

<li>
    Mampu menerapkan 8S 
    (Salam, Sapa, Senyum, Silaturrahim, Sopan, Santun, 
    Shodaqoh dan Sholat Sunnah).
</li>
            </ol>

        </div>

        {{-- HAK SISWA --}}
        <div class="sub-section">

            <h3>Hak Siswa</h3>

            <ol>
                <li>Mengikuti proses belajar mengajar baik intrakurikuler maupun ekstrakurikuler.</li>

<li>Mendapatkan perlakuan yang sama dalam proses pembelajaran.</li>

<li>Menggunakan sarana / prasarana madrasah dalam kaitannya dengan proses pembelajaran.</li>

<li>Mengikuti kegiatan yang dilaksanakan oleh madrasah.</li>

<li>Menjadi pengurus, anggota atau kepanitiaan dalam kegiatan kesiswaan.</li>

<li>Mendapatkan bimbingan dari para guru dalam mencapai prestasi optimal.</li>

<li>Mendapatkan layanan konseling dari wali kelas maupun perpustakaan.</li>
            </ol>

        </div>

    </div>

</div>
        
{{-- =========================
            KEWAJIBAN SISWA
        ========================== --}}
        <div class="tatib-section">

            <h2 class="section-title">
                Kewajiban Siswa
            </h2>

            <div class="section-content">

                <div class="sub-section">
                    <h3>Kelakuan</h3>

                    <ol>
                        <li>Menghormati dan menghargai kepala madrasah, guru, karyawan, maupun sesama siswa.</li>

<li>Menerapkan 8S (Salam, Sapa, Senyum, Silaturrahim, Sopan, Santun, Shodaqoh dan Sholat Sunnah).</li>

<li>Mengikuti proses pembelajaran sesuai dengan jam belajar secara tertib.</li>

<li>Menjaga dan memelihara keutuhan alat-alat pembelajaran atau sarana yang lain.</li>

<li>Menjaga dan memelihara 9K lingkungan madrasah (Keamanan, Kebersihan, Ketertiban, Keindahan, Kekeluargaan, Kerindangan, Kesehatan, Keterbukaan dan Keteladanan).</li>

<li>Menjaga nama baik madrasah, kepala madrasah, guru, karyawan dan sesama siswa.</li>

<li>Menjaga kerukunan dan hubungan baik dengan kepala madrasah, guru, karyawan dan sesama teman.</li>

<li>Menjaga ketenangan dan ketertiban dalam proses pembelajaran.</li>
                    </ol>
                </div>

                <div class="sub-section">
                    <h3>Kerajinan</h3>

                    <ol>
                        <li>Selalu hadir di madrasah paling lambat 15 menit sebelum bel tanda masuk dibunyikan.</li>

<li>Senantiasa mengikuti proses pembelajaran setiap mata pelajaran.</li>

<li>Selalu mengerjakan tugas-tugas dari guru dengan tertib dan tepat waktu.</li>

<li>Senantiasa mengikuti ulangan / penilaian yang diberikan guru.</li>

<li>Senantiasa mengikuti remedial untuk mata pelajaran yang tidak tuntas.</li>
                    </ol>
                </div>

                <div class="sub-section">
                    <h3>Kerapihan</h3>

                    <ol>
                        <li>Berpakaian seragam sesuai dengan ketentuan madrasah.</li>

<li>Selalu merapihkan rambut bagi siswa putra dengan potongan pendek maksimal 3 cm.</li>

<li>Rambut tidak boleh dicat baik putra maupun putri.</li>

<li>Kuku pendek, bersih dan tidak diwarnai.</li>

<li>Tidak diperbolehkan memakai softlens baik putra atau putri.</li>

<li>Tidak diperbolehkan memakai behel / kawat gigi kecuali rekomendasi dokter.</li>

<li>Siswa memakai pakaian olahraga madrasah pada saat praktek olahraga.</li>
                    </ol>
                </div>

                <div class="sub-section">
                    <h3>Kebersihan</h3>

                    <ol>
                       <li>Pakaian seragam madrasah selalu bersih, cerah dan tidak lusuh.</li>

<li>Meja, kursi, lantai, papan tulis dalam keadaan bersih dan tertib.</li>

<li>Buku pelajaran dan buku tulis bersampul dan alat tulis yang rapi.</li>

<li>Kuku, rambut dan sepatu hitam yang bersih.</li>

<li>Memakai kaos kaki dan sepatu hitam sesuai dengan tata tertib madrasah.</li>

<li>Membuang sampah pada tempatnya.</li>
                    </ol>
                </div>

                <div class="sub-section">
                    <h3>Keagamaan</h3>

                    <ol>
                       <li>Melaksanakan hafalan surat-surat pendek (Juz Amma) sebelum pembelajaran jam pertama dan sholat Dhuha.</li>

<li>Mengikuti kegiatan TPQ (Taman Pendidikan Al-Qur'an) dan membawa Al-Qur'an.</li>
                    </ol>
                </div>

            </div>

        </div>

        {{-- =========================
            LARANGAN SISWA
        ========================== --}}
        <div class="tatib-section">

            <h2 class="section-title">
                Larangan Siswa
            </h2>

            <div class="section-content">

                               <div class="sub-section">
                    <h3>Kelakuan</h3>

                    <ol>
                       <li>Memakai pakaian seragam madrasah atau atribut madrasah pada tempat atau kegiatan yang tidak ada kaitannya dengan madrasah.</li>

<li>Terlibat dalam tindak kriminal atau tindak pidana (mencuri atau merampas barang milik orang lain).</li>

<li>Membawa dan menggunakan senjata tajam.</li>

<li>Membawa dan menggunakan jenis narkoba / minuman keras.</li>

<li>Membawa, melihat atau mengedarkan barang porno dalam bentuk apapun.</li>

<li>Berkelahi / terlibat / pemicu perkelahian (tawuran).</li>

<li>Berbuat asusila.</li>

<li>Menganiaya / mengintimidasi kepala madrasah, guru, karyawan, sesama siswa, dll.</li>

<li>Merokok / membawa rokok di lingkungan madrasah dan kedapatan merokok di luar lingkungan madrasah dengan memakai seragam atau merokok saat karya wisata / outing class.</li>

<li>Merusak / mencoret-coret sarana prasarana madrasah.</li>

<li>Memalsukan tanda tangan (orang tua, kepala madrasah, guru, karyawan).</li>

<li>Memalsukan stempel madrasah.</li>

<li>Membuat pernyataan bohong, dusta atau palsu.</li>

<li>Menerobos / melompat / keluar dari lingkungan madrasah tanpa izin.</li>

<li>Mengganggu proses belajar mengajar atau meninggalkan proses belajar mengajar tanpa izin.</li>

<li>Melindungi teman yang bersalah.</li>

<li>Mencemarkan nama baik madrasah, kepala madrasah, karyawan, guru, siswa, dll.</li>

<li>Melakukan tindakan provokasi.</li>

<li>Berada di kantin saat pelajaran tanpa izin guru mata pelajaran atau guru piket.</li>

<li>Tidak menyampaikan surat undangan / surat edaran madrasah kepada orang tua.</li>

<li>Tidak melaksanakan kegiatan TPQ dan sholat Dhuha.</li>

<li>Berbicara dan bertingkah laku tidak sopan kepada kepala madrasah, guru, karyawan, siswa, dll.</li>

<li>Membuang sampah dan meludah di sembarang tempat.</li>

<li>Tidak mematuhi nasihat dan peringatan guru atau karyawan.</li>

<li>Membawa barang-barang yang tidak mendukung (seperti komik, radio, dll).</li>

<li>Membawa kendaraan motor.</li>
                    </ol>
                </div>

                <div class="sub-section">
                    <h3>Kerajinan</h3>

                    <ol>
                        <li>Absen karena sakit tanpa memberi / menunjukkan surat dokter.</li>

<li>Absen karena izin untuk keperluan yang tidak penting.</li>

<li>Absen tanpa keterangan / alpa / bolos.</li>

<li>Terlambat hadir di madrasah pada jam pertama.</li>

<li>Terlambat mengikuti upacara bendera.</li>

<li>Sengaja tidak mengikuti pelajaran pada jam-jam tertentu.</li>

<li>Sengaja tidak mengikuti bimbingan belajar, club bidang studi atau kegiatan ekstrakurikuler.</li>
                    </ol>
                </div>

                <div class="sub-section">
                    <h3>Kerapihan</h3>

                    <ol>
                        <li>Memakai seragam tidak sesuai ketentuan.</li>

<li>Rambut tidak rapi, gondrong atau dicat.</li>

<li>Siswa putra memakai perhiasan (gelang, kalung, dll).</li>

<li>Siswa putri memakai perhiasan / make up berlebihan.</li>

<li>Siswa putra tidak memasukkan baju ke dalam celana.</li>

<li>Siswi putri memakai baju pendek atau rok pendek.</li>

<li>Memakai jaket / sweater di lingkungan madrasah.</li>

<li>Tidak memakai atribut madrasah seperti yang telah ditentukan (badge, ikat pinggang).</li>

<li>Siswi putri tidak memakai dalaman kerudung.</li>

<li>Siswa putra memakai celana panjang ketat atau celana panjang menggantung.</li>

<li>Kuku panjang, kotor dan diberi warna.</li>

<li>Memakai softlens baik putra atau putri.</li>

<li>Memakai behel / kawat gigi kecuali rekomendasi dokter.</li>
                    </ol>
                </div>

                <div class="sub-section">
                    <h3>Kebersihan</h3>

                    <ol>
                       <li>Pakaian seragam madrasah kotor, lusuh, atau sobek.</li>

<li>Meja, kursi, lantai, papan tulis dalam keadaan kotor.</li>

<li>Buku dan alat tulis terlihat kotor.</li>

<li>Kuku panjang, rambut dan sepatu kotor.</li>

<li>Memakai kaos kaki, sepatu dan atribut seragam tidak sesuai dengan ketentuan madrasah.</li>

<li>Membuang sampah sembarangan.</li>

<li>Pemakaian Tip-Ex sebagai penghapus tulisan.</li>
                    </ol>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection