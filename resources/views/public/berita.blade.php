<div class="right-side-title">BERITA</div>
@forelse($berita as $ber) 
<div class="right-side-report">
    <div class="right-side-report-title">{{ character_limiter($ber->judul, 20) }}</div>
    <div class="right-side-report-datetime">{{ CarbonTime(null, $ber->created_at) }} | {{ CarbonHumanDate(null, $ber->created_at) }}</div>
    <div class="right-side-report-text">
        {!! content($ber->isi, 150, '<a href="'.route('berita-detail', $ber->slug).'">Selengkapnya <i class="fa fa-angle-double-right"></i></a>') !!}
    </div>
</div>
@empty
    <div class="right-side-report">
        Tidak ada kegiatan untuk ditampilkan.
    </div>
@endforelse