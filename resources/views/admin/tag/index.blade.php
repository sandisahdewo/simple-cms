@extends('admin.layouts.app')

@section('title', 'Tag')

@section('content_body')
<div class="col-md-4">
    <div class="x_panel">
        <div class="x_title">
            <h2>Tambah Tag</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! Form::open(['route' => 'tag-store', 'class' => 'form-horizontal form-label-left']) !!}
            @include('admin.tag.form')
            <div class="form-group">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"> </i> Simpan</button>
            </div>
 {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Tag</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @include('admin.tag.table') 
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>
        $('#datatable-tag').dataTable();
    </script>
@endpush
