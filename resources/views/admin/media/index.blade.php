@extends('admin.layouts.app')

@section('title', 'Media')

@section('content_body')
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Media</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <iframe src="{{ asset('vendors/responsive_filemanager/filemanager/dialog.php') }}" style="border: 0px;" width="100%" height="550"></iframe>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>
        $('#datatable-tag').dataTable();
    </script>
@endpush
