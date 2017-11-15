@include('public.header')

<div class="container album-page">
	<div class="row">
		<div class="col-sm-9">
			<center class="title-slide">
				<h2 class="black">{{ ucfirst(request()->segment(1)) }}</h2>
				<p>
					<h5 class="grey">
						<i>{{ ucfirst(request()->segment(1)) }} yang anda cari adalah :
							<label class="label @if(request()->segment(1) == 'tag') label-primary @else label-warning @endif">
								<span class="white">{{ request()->segment(2) }}</span>
							</label>
						</i>
					</h5>
				</p>
			</center>
			@forelse($reports as $report)
			<div class="left-side-activity">
				<div class="left-side-activity-title">{{ $report->judul }}</div>
				<div class="left-side-activity-datetime">{{ substr($report->created_at, 11) }} | {{ carbonHumanDate(null, $report->tanggal_posting) }} | {{ $report->dibuat_oleh
					}}</div>
				<div class="left-side-activity-text">
					<div class="row">
						<div class="col-sm-4">
							<img src="{{ $report->gambar }}">
						</div>
						<div class="col-sm-8">
							{!! $report->isi !!}
						</div>
					</div>
				</div>
			</div>
			@empty
			<p>Tidak ada informasi untuk ditampilkan pada bulan ini!</p>
			@endforelse
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
@include('public.footer')