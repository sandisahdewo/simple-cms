@extends('admin.layouts.app')

@section('title', 'Menu')

@section('content_body')
<div class="col-md-4">
    <div class="x_panel">
        <div class="x_title">
            <h2>Tambah Menu</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! Form::open(['route' => ['menu-store', request()->segment(2)], 'class' => 'form-horizontal form-label-left']) !!}
            @include('admin.menu.form')
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
            <h2>Data Menu</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @include('admin.menu.table') 
        </div>
    </div>
</div>

@endsection
