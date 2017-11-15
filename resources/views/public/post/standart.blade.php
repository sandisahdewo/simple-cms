<div class="left-side-post-title">{{ $posting->judul }}</div>
<div class="left-side-post-datetime">{{ CarbonTime(null, $posting->created_at) }} | {{ CarbonHumanDate(null, $posting->created_at) }} | {{ $posting->dibuat_oleh }}</div>
<div class="left-side-post-text">
    <center><img src="{{ $posting->gambar }}"></center>
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