@include('public.header')

<div class="container album-page">
    <div class="row">
        <div class="col-sm-9">
            <center class="title-slide">
                <h2 class="black">Album</h2>
                {{-- <p><h5 class="grey"><i>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</i></h5></p> --}}
            </center>
            <div class="info-menu">
                <div class="row album-box-center">
                    <div class="col-md-4 col-sm-12 col-xs-12 album-center center-menu-album" id="boxscroll">
                        <ul>
                            @php $countGaleri = 0 @endphp
                            @forelse($galeri as $g)
                            <li>
                                <a href="{{ route('album-detail', $g->slug) }}" class="row">
                                    <div class="col-sm-3 album-center-img">
                                        <img src="{{ $g->gambar }}" />
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="album-center-title">{{ character_limiter($g->judul, 18) }}</span>
                                        <div class="album-center-info-page">
                                            {{ content($g->isi, 25) }}
                                            <div class="album-center-datetime-info">
                                                <i class="fa fa-clock-o"></i> {{ CarbonHumanDate(null, $g->tanggal_posting) }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @php $countGaleri++ @endphp
                            @empty
                            @endforelse
<!-- <li>
<a href="gallery.php" class="row">
<div class="col-sm-3 album-center-img">
<img src="assets/img/gallery/1.jpg" />
</div>
<div class="col-sm-9">
<span class="album-center-title">Judul Album</span>
<div class="album-center-info-page">
Lorem Ipsum is simply dummy text of the printing and typesetting industry.
<div class="album-center-datetime-info">
<i class="fa fa-clock-o"></i> 11:20:00 | 07 Des 2016
</div>
</div>
</div>
</a>
</li>
<li>
<a href="gallery.php" class="row">
<div class="col-sm-3 album-center-img">
<img src="assets/img/gallery/2.jpg" />
</div>
<div class="col-sm-9">
<span class="album-center-title">Judul Album</span>
<div class="album-center-info-page">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
<div class="album-center-datetime-info">
<i class="fa fa-clock-o"></i> 11:20:00 | 07 Des 2016
</div>
</div>
</div>
</a>
</li> -->
</ul>
</div>
<div class="col-md-8 col-sm-12 col-xs-12 album-center" id="boxscroll1">
    <div  class="right-box-album">
        <ul class="pgwSlideshow">
            @if(isset($album) ? $album : '')
                @forelse($album as $al)
                <li><img src="{{ $al->url_gambar }}" alt="{{ $al->keterangan }}" data-description="{{ $al->deskripsi }}"></li>
                @empty
                @endforelse
            @endif
        </ul>
    </div>                   
</div>
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