@extends('admin.layouts.app')

@section('title', 'Grup')

@section('content_body')
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Grup</h2>
            <div class="clearfix"></div>
        </div>
        <a href="{{ route('grup') }}" class="btn btn-primary"><i class="fa fa-users"></i> Lihat Data Grup</a> 
        <div class="x_content">
            {!! Form::model($grup, ['route' => ['grup-update', $grup->id], 'class' => 'form-horizontal']) !!}
            @include('admin.grup.form') 
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Perbarui</button>
            <a href="{{ route('grup') }}" class="btn btn-default"><i class="fa fa-reply"></i> Batal</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
