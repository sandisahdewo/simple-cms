@extends('admin.layouts.app')

@section('title', 'Pengaturan')

@section('content_body')
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data User</h2>
            <div class="clearfix"></div>
        </div>
        <a href="{{ route('user-create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data User</a> 
        <div class="x_content">
            @include('admin.user.table') 
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>
        $('#datatable-user').dataTable();
    </script>
@endpush
