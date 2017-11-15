@extends('admin.layouts.app')

@section('title', 'Kategori')

@section('content_body')
<div class="col-md-4">
    <div class="x_panel">
        <div class="x_title">
            <h2>Tambah Kategori</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! Form::open(['route' => 'kategori-store', 'class' => 'form-horizontal form-label-left']) !!}
            @include('admin.kategori.form')
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
            <h2>Data Kategori</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @include('admin.kategori.table') 
        </div>
    </div>
</div>

@endsection
