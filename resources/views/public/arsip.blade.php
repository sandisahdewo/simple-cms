@include('public.header')

	<div class="container album-page">
    <div class="row">
      <div class="col-sm-9">
        <center class="title-slide">
          <h2 class="black">{{ ucfirst(request()->segment(1)) }}</h2>
          <!-- <p><h5 class="grey"><i>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</i></h5></p> -->
        </center>
				<form class="form-group">
						<div class="col-md-2">
								{{ Form::select('year', $optArsip, request()->segment(2), ['onchange' => 'changeTahunBulan()', 'class' => 'form-control input-sm', 'id' => 'tahun']) }}
						</div>
						<div class="col-md-2">
								{{ Form::select('month', [
                    '01' => 'Januari',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember'
                ], request()->segment(3), ['onchange' => 'changeTahunBulan()', 'class' => 'form-control input-sm', 'id' => 'bulan']) }}
						</div>
            <a class="btn btn-default btn-filter">Filter</a>
				</form>
				@forelse($reports as $report)
        <div class="left-side-activity">
          <div class="left-side-activity-title">{{ $report->judul }}</div>
          <div class="left-side-activity-datetime">{{ substr($report->created_at, 11) }} | {{ carbonHumanDate(null, $report->tanggal_posting) }} | {{ $report->dibuat_oleh }}</div>
          <div class="left-side-activity-text">
            <div class="row">
              <div class="col-sm-4"><img src="{{ $report->gambar }}"></div>
              <div class="col-sm-8">
								{!! content($report->isi, 350, '<a href="'.route(request()->segment(1).'-detail', $report->slug).'">Selengkapnya <i class="fa fa-angle-double-right"></i></a>') !!}
              </div>
            </div>
          </div>
        </div>
        @empty
          <p>Tidak ada berita untuk ditampilkan pada bulan ini!</p>
				@endforelse
      </div>
      <div class="col-sm-3">
        <div class="right-side-top">
          <div class="right-side-title">BERITA</div>
          <div class="right-side-report">
            @if($berita)
              @forelse($berita as $ber)
                <div class="right-side-report-title">{{ character_limiter($ber->judul, 20) }}</div>
                <div class="right-side-report-datetime">{{ CarbonTime(null, $ber->created_at) }} | {{ CarbonHumanDate(null, $ber->created_at) }}</div>
                <div class="right-side-report-text">
                  {!! content($ber->isi, 150, '<a href="'.route('berita-detail', $ber->slug).'">Selengkapnya <i class="fa fa-angle-double-right"></i></a>') !!}
                </div>
              @empty

              @endforelse
            @endif
          </div>
        </div>
        <div class="right-side">
          <div class="right-side-title">KEGIATAN</div>
          <div class="right-side-report">
            @if($kegiatan)
              @forelse($kegiatan as $keg)
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
              @empty

              @endforelse
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@include('public.footer')
@push('public-script')
  <script>
    function changeTahunBulan() {
      var tahun = $('#tahun option:selected').val();
      var bulan = $('#bulan option:selected').val();

      $('.btn-filter').attr('href', '{{ asset(request()->segment(1)) }}/'+tahun+'/'+bulan);
    }
    changeTahunBulan();
  </script>
@endpush
