@include('public.header')

<div class="container album-page">
    <div class="row">
        <div style="margin-top:40px">
            @include('public.message_validate')
        </div>
        <div class="col-sm-9">
            <center class="title-slide">
                <h2 class="black">Pengaduan</h2>
                {{-- <p><h5 class="grey"><i>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</i></h5></p> --}}
            </center>
            <div class="left-side-complaint">
                <div class="left-side-complaint-box">
                    <div class="row">
                        <div class="col-sm-6 left-side-complaint-right">
                            <h3 class="left-side-complaint-right-title">Silahkan Adukan Keluhan Anda</h3>
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
                        <div class="col-sm-6 left-side-complaint-left">
                            <h3 class="left-side-complaint-right-title">Cari Keluhan Serupa</h3>
                            {!! Form::open(['route' => ['pengaduan', 'cari='], 'method' => 'get']) !!}
                            <div class="complaint-box-right-text">
                                <div class="form-group">
                                    <input type="text" name="cari" value="{{ request()->get('cari') }}" class="form-control flat" placeholder="Masukkan Kata Kunci">
                                    <p class="warning-text">* Sebelum melaporkan aduan, Anda bisa mencari aduan serupa melalui kotak pencarian dibawah ini.</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-complaint pull-right">CARI</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                @forelse($complaint as $comp)
                    <div class="left-side-complaint-comment">
                        <div class="left-side-complaint-date">{{ CarbonHumanDate(null, $comp->tanggal_komentar) }}</div>
                        <div class="left-side-complaint-email">{{ $comp->email }}</div>
                        <div class="left-side-complaint-text">{{ $comp->komentar }}</div>
                        <div class="left-side-complaint-title-answer">JAWABAN :</div>
                        <div class="left-side-complaint-text">{{ isset($comp->jawaban[0]->komentar) ? $comp->jawaban[0]->komentar : '' }}</div>
                    </div>
                @empty
                    <div class="left-side-complaint-comment">
                        <div class="left-side-complaint-text">Tidak ada keluhan untuk ditampilkan</div>
                    </div>
                @endforelse
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