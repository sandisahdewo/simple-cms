@extends('admin.layouts.app')

@section('title', 'Grup')

@section('content_body')
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Grup</h2>
            <div class="clearfix"></div>
        </div>
        <a href="{{ route('grup-create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Grup</a> 
        <div class="x_content">
            @include('admin.grup.table') 
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>
        $('#datatable-kategori').dataTable();
    </script>
@endpush
