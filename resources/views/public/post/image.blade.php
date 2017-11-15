<div class="left-side-post-title">{{ $posting->judul }}</div>
<div class="left-side-post-datetime">{{ CarbonTime(null, $posting->created_at) }} | {{ CarbonHumanDate(null, $posting->created_at) }} | {{ $posting->dibuat_oleh }}</div>
<div class="left-side-post-text">
    <div id="myReport" class="carousel carousel-post slide" data-ride="carousel">
        @php $countLiImg = 0; @endphp
        <ol class="carousel-indicators">
            @foreach($posting->images as $img)
                <li data-target="#myReport" data-slide-to="{{ $countLiImg }}" class="report-slide @if($countLiImg == 0) active @endif"></li>
            @php $countLiImg++; @endphp
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @php $countImage = 0; @endphp
            @foreach($posting->images as $img)
                <div class="item item-report @if($countImage == 0) active @endif">
                    <center><img class="third-slide" src="{{ $img->url_gambar }}"></center>
                </div>
            @php $countImage++; @endphp
            @endforeach
        </div>
        <a class="arrow left carousel-control" href="#myReport" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="arrow right carousel-control" href="#myReport" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <p>
        {!! $posting->isi !!}
    </p>
    @include('public.partials.tag_kategori')
</div>
<div class="left-side-post-comment-input">
    <h3>Komentar</h3>
    {!! Form::open(['route' => 'tanggapan-store']) !!}
    <div class="form-group">
        {!! Form::text('email', null, ['class' => 'form-control flat', 'placeholder' => 'Masukkan Alamat E-mail']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('komentar', null, ['class' => 'form-control flat', 'placeholder' => 'Masukkan Keluhan', 'rows' => '2']) !!}
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg pull-right">KIRIM</button>
    </div>
    {!! Form::close() !!}
</div>
