@php
    $gambar = is_array($p->gambar)
        ? $p->gambar
        : json_decode($p->gambar, true) ?? [];

    $filePertama = $gambar[0] ?? null;

    $ext = $filePertama
        ? strtolower(pathinfo($filePertama, PATHINFO_EXTENSION))
        : null;
@endphp

<a href="{{ route('pengumuman.detail.pengumuman', $p->id) }}" class="pengumuman-card">

    @if($filePertama)

        @if(in_array($ext, ['jpg','jpeg','png','webp']))
            <img src="{{ asset('storage/'.$filePertama) }}">
        @elseif($ext == 'pdf')
            <div class="pdf-preview">
                <img src="{{ asset('img/pdf-icon.png') }}">
                <span>PDF Document</span>
            </div>
        @else
            <img src="{{ asset('img/default-news.jpg') }}">
        @endif

    @else
        <img src="{{ asset('img/default-news.jpg') }}">
    @endif

    <div class="pengumuman-content">

        <div class="meta-row">
            <span class="kategori-home">
                {{ $p->kelas ? $p->kelas->nama_kelas : 'Semua Kelas' }}
            </span>

            <span class="tanggal">
                {{ $p->created_at->format('d M Y') }}
            </span>
        </div>

        <h3>
            {{ \Illuminate\Support\Str::limit($p->judul, 40) }}
        </h3>

    </div>

</a>
