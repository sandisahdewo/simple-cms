@extends('admin.layouts.app')

@section('title', 'Daftar Menu')

@section('content_body')
<div class="col-md-4">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Daftar Menu</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! Form::model($daftarMenu, ['route' => ['daftarMenu-update', $daftarMenu->id], 'class' => 'form-horizontal form-label-left']) !!}
            @include('admin.daftarMenu.form')
            <div class="form-group">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"> </i> Perbarui</button>
            </div>
             {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Daftar Menu</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @include('admin.daftarMenu.table') 
        </div>
    </div>
</div>

@endsection
