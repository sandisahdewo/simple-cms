@include('public.header')
<header id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @php $countsLi = 0 @endphp
        @foreach($sliders as $liSlider) 
        <li data-target="#myCarousel" data-slide-to="{{ $countsLi }}" class="@if($countsLi == 0) active @endif"></li>
        @php $countsLi++ @endphp
        @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
        @php $counts = 0 @endphp
        @foreach($sliders as $slider)
        <div class="item @if($counts == 0) active @endif">
            <img class="first-slide" src="{{ $slider->url_gambar }}" alt="Pertama">
            <div class="container">
                <div class="carousel-caption">
                    <h1>{{ $slider->keterangan }}</h1>
                    <p class="roboto-font">{{ $slider->deskripsi }}</p>
                </div>
            </div>
        </div>
        @php $counts++ @endphp
        @endforeach
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</header>

<section class="tab-content">
    <div class="box-title">
        <h2 class="general-title text-center">KEGIATAN</h2>
    </div>
    <div class="container">
        <div class="row">
            @foreach($kegiatan as $keg)
            <div class="col-sm-3 activity-box">
                <img src="{{ $keg->gambar }}">
                <div class="activity-text">
                    <div class="activity-title">{{ $keg->judul }}</div>
                    {!! content($keg->isi, 75, '<a href="'.route('kegiatan-detail', $keg->slug).'">Selengkapnya <i class="fa fa-angle-double-right"></i></a>') !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="tab-content tab-report">
    <div class="box-title">
        <h2 class="general-title text-center">BERITA</h2>
    </div>
    <div class="container">
        <div id="myReport" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @php $countsLiBerita = 0 @endphp
                @forelse($sliderBerita as $berita)
                <li data-target="#myReport" data-slide-to="{{ $countsLiBerita }}" class="report-slide @if($countsLiBerita == 0) active @endif"></li>
                @php $countsLiBerita++ @endphp
                @empty
                @endforelse
            </ol>
            <div class="carousel-inner" role="listbox">
                @php $countsBerita = 0; @endphp
                @foreach($sliderBerita as $berita)
                    <div class="item item-report @if($countsBerita == 0) active @endif">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 item-report-img">
                                    <img class="third-slide" src="{{ $berita->gambar }}" alt="Empat">
                                </div>
                                <div class="col-sm-6">
                                    <div class="item-report-text">
                                        <h3>{{ $berita->judul }}</h3>
                                        <p class="justify-style">{{ content($berita->isi, false) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php $countsBerita++; @endphp
                @endforeach
                <a class="arrow left carousel-control" href="#myReport" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="arrow right carousel-control" href="#myReport" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <section class="tab-content">
        <div class="box-title">
            <h2 class="general-title text-center">GALERY</h2>
        </div>
        <div class="container">
            <div class="gallery-box">
                <div class="row">
                    <div class="col-sm-5 gallery-box-img">
                        <img src="{{ isset($galeri->first()->gambar) ? $galeri->first()->gambar : '' }}">
                    </div>
                    <div class="col-sm-7">
                        <div class="gallery-box-text">
                            <h4 class="gallery-box-title">{{ isset($galeri->first()->judul) ? $galeri->first()->judul : '' }}</h4>
                            <span class="white">{{ CarbonHumanDate(null, isset($galeri->first()->tanggal_posting) ? $galeri->first()->tanggal_posting : '') }} - {{ isset($galeri->first()->dibuat_oleh) ? $galeri->first()->dibuat_oleh : '' }}</span>
                            <p class="justify-style">{{ content(isset($galeri->first()->isi) ? $galeri->first()->isi : '', false) }}</p>
                        </div>
                        <div class="gallery-box-album">
                            @forelse($galeri->splice(1) as $galeriImg)
                            <img src="{{ $galeriImg->gambar }}">
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tab-content">
        <div class="box-title">
            <h2 class="general-title text-center">PENGADUAN</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 complaint-box-left">
                    @forelse($komentar as $koment)
                    <div class="col-sm-4">
                        <span>{{ $koment->email }}</span>
                        <p class="complaint-box-text">{{ $koment->komentar }}</p>
                        <span class="complaint-answer">JAWABAN :</span>
                        <p><i>{{ isset($koment->jawaban[0]->komentar) ? $koment->jawaban[0]->komentar : '' }}</i></p>
                    </div>
                    @empty
                    <span>Tidak ada Pengaduan untuk di tampilkan.</span>
                    @endforelse
                </div>
                <div class="col-sm-4 complaint-box-right">
                    <h3 class="complaint-box-right-title">Silahkan Adukan Keluhan Anda</h3>
                    {!! Form::open(['route' => 'tanggapan-store']) !!}
                    <div class="complaint-box-right-text">
                        <div class="form-group">
                            {!! Form::text('email', null, ['class' => 'form-control flat', 'placeholder' => 'Masukkan Alamat E-mail']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::textarea('komentar', null, ['class' => 'form-control flat', 'placeholder' => 'Masukkan Keluhan', 'rows' => '2']) !!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-complaint pull-right">KIRIM</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>

    @include('public.footer')