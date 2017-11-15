@include('public.header')

<div class="container">
	<div class="row">
		<div class="col-sm-9">
			<center class="title-slide">
				<h2 class="black">{{ $posting->judul }}</h2>
			</center>
			<div class="info-menu">
				<div class="left-side-title">{{ $posting->judul }}</div>
				<div class="left-side-text">
					<center>
						<img src="{{ $posting->gambar }}">
					</center>
					{!! $posting->isi !!}
				</div>
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

@include('public.footer')