<div class="right-side-title">KEGIATAN</div>
@forelse($kegiatan as $keg)
<div class="right-side-report">
    <div class="right-side-report-title">{{ $keg->judul }}</div>
    <div class="right-side-report-datetime">{{ CarbonTime(null, $keg->created_at) }} | {{ CarbonHumanDate(null, $keg->created_at) }}</div>
    <div class="right-side-report-text">
        <div class="row">
            <div class="col-sm-5"><img src="{{ $keg->gambar }}"></div>
            <div class="col-sm-7">
                {!! content($keg->isi, 150, '<a href="'.route('kegiatan-detail', $keg->slug).'">Selengkapnya <i class="fa fa-angle-double-right"></i></a>') !!}
            </div>
        </div>
    </div>
</div>
@empty
    <div class="right-side-report">
        Tidak ada kegiatan untuk ditampilkan.
    </div>
@endforelse