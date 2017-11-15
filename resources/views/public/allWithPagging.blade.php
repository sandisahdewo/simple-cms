@include('public.header')

	<div class="container album-page">
    <div class="row">
      <div class="col-sm-9">
        <center class="title-slide">
          <h2 class="black">{{ ucfirst(request()->segment(1)) }}</h2>
          <!-- <p><h5 class="grey"><i>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</i></h5></p> -->
        </center>
	    @forelse($reports as $report)
        <div class="left-side-activity">
          <div class="left-side-activity-title"><a class="link" href="{{ route('berita-detail', $report->slug) }}">{{ $report->judul }}</a></div>
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
        <div class="pull-right">
            {{ $reports->links() }}
        </div>
      </div>
      <div class="col-sm-3">
        <div class="right-side-top">
            @include('public.berita')
        </div>
        <div class="right-side">
            @include('public.kegiatan')
        </div>
    </div>
    </div>
  </div>
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
@include('public.footer')
