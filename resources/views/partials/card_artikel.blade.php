<a href="{{ route('artikel.detail.artikel', $a->id) }}" class="artikel-card">

    @if($a->image)
        <img src="{{ asset('storage/'.$a->image) }}">
    @else
        <img src="{{ asset('img/default-news.jpg') }}">
    @endif

    <div class="artikel-content">

        <div class="meta-row">

            <span class="kategori-home">
                {{ $a->category }}
            </span>

            <span class="tanggal">
                {{ $a->created_at->format('d M Y') }}
            </span>

        </div>

        <h3>
            {{ \Illuminate\Support\Str::limit($a->title, 55) }}
        </h3>

    </div>

</a>
