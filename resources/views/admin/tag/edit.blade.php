@extends('admin.layouts.app')

@section('title', 'tag')

@section('content_body')
<div class="col-md-4">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Tag</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! Form::model($tag, ['route' => ['tag-update', $tag->id], 'class' => 'form-horizontal form-label-left']) !!}
            @include('admin.tag.form')
             <div class="form-group">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"> </i> Update</button>
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
