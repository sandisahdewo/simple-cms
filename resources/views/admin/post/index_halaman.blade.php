@extends('admin.layouts.app')

@section('title', 'Halaman')

@section('content_body')
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Halaman</h2>
            <div class="clearfix"></div>
        </div>
        <a href="{{ route('post-create', 'format=page') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Halaman</a> 
        <div class="x_content">
            <div class="well" style="overflow: auto;">
                <form class="form-group">
                    <div class="col-md-2">
                        {{ Form::select('arsip', ['' => 'Semua Arsip']+$optArsip, request()->get('jenis'), ['class' => 'form-control input-sm']) }}
                    </div>
                    <div class="col-md-2">
                        {{ Form::select('jenis', ['' => 'Semua Jenis', '1' => 'Berita', '2' => 'Pengumuman', '3' => 'Page', '4' => 'Galeri'], request()->get('jenis'), ['class' => 'form-control input-sm']) }}
                    </div>
                    <div class="col-md-2">
                        {{ Form::select('kategori', ['' => 'Semua Kategori']+selectTree(tree($optKategori), 'id', 'kategori'), request()->get('kategori'), ['class' => 'form-control input-sm']) }}
                    </div>
                    <div class="col-md-2">
                        {{ Form::select('tag', ['' => 'Semua Tag']+$optTag, request()->get('tag'), ['class' => 'form-control input-sm']) }}
                    </div>
                    <button class="btn btn-sm btn-default">Filter</button>
                    <div class="btn-group btn-sm" style="margin-top: -5px">
                        <a href="{{ route('halaman') }}" class="btn btn-sm btn-default">Semua</a>
                        <a href="{{ route('halaman', 'status=draft'.'&format='.request()->get('format').'&jenis='.request()->get('jenis').'&kategori='.request()->get('kategori').'&tag='.request()->get('tag')) }}" class="btn btn-sm btn-default">Draft ({{ $countDraft }})</a>
                        <a href="{{ route('halaman', 'status=publish'.'&format='.request()->get('format').'&jenis='.request()->get('jenis').'&kategori='.request()->get('kategori').'&tag='.request()->get('tag')) }}" class="btn btn-sm btn-default">Publish ({{ $countPublish }})</a>
                    </div>
            </div>
            @include('admin.post.table') 
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>
        $('#datatable-post').dataTable();
    </script>
@endpush
