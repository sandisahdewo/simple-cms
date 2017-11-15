@extends('admin.layouts.app')

@section('title', 'Komentar')

@section('content_body')
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Komentar</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="well" style="overflow: auto;">
                <form class="form-group">
                    <div class="col-md-3">
                        {{ Form::select('tipe', ['all' => 'Semua Jenis', 'umum' => 'Umum', 'pengaduan' => 'Pengaduan'], $tipe, ['class' => 'form-control input-sm']) }}
                    </div>
                    <button class="btn btn-sm btn-default">Filter</button>
                    <div class="btn-group btn-sm" style="margin-top: -5px">
                        <a href="{{ route('komentar') }}" class="btn btn-sm btn-default">Semua</a>
                        <a href="{{ route('komentar', 'appr'.'?tipe='.$tipe) }}" class="btn btn-sm btn-default">Disetujui ({{$appr}})</a>
                        <a href="{{ route('komentar', 'wappr'.'?tipe='.$tipe) }}" class="btn btn-sm btn-default">Menunggu ({{$wappr}})</a>
                    </div>
                </form>
            </div>
            @include('admin.komentar.table') 
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>
        $('#datatable-komentar').dataTable();
    </script>
    <script>
    function reply(id) {
        $('#reply-' + id).show();
    }
    function cancel_reply(id) {
        $('#reply-' +id).hide();
    }
</script>
@endpush
