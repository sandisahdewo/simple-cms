<div class="left-side-post-title">{{ $posting->judul }}</div>
<div class="left-side-post-datetime">{{ CarbonTime(null, $posting->created_at) }} | {{ CarbonHumanDate(null, $posting->created_at) }} | {{ $posting->dibuat_oleh }}</div>
<div class="left-side-post-text">
    <center><img src="{{ $posting->gambar }}"></center>
    <p>
    	{!! $posting->isi !!}
    </p>
</div>