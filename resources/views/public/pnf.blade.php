@include('public.header')

  <div class="container">
    <div class="pnf-page">
      <center><img src="{{ asset('assets/img/404.png') }}" /></center>
      <center>
        <a href="{{ route('home') }}" class="btn btn-warning flat"><i class="fa fa-reply"></i> Kembali Ke Halaman Utama</a>
      </center>
    </div>
  </div>

@include('public.footer')
