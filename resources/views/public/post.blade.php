@include('public.header')

<div class="container album-page">
    <div class="row">
        <div class="col-sm-9">
            <div class="left-side-post">
                @if($posting->format == 'standart')
                    @include('public.post.standart')
                @elseif($posting->format == 'page')
                    @include('public.post.page')
                @elseif($posting->format == 'image')
                    @include('public.post.image')
                @endif
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
</div>
@include('public.footer')