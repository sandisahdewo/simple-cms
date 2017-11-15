@extends('admin.layouts.app')

@section('title', 'User')

@section('content_body')
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Tambah User</h2>
            <div class="clearfix"></div>
        </div>
        <a href="{{ route('user') }}" class="btn btn-primary"><i class="fa fa-user"></i> Lihat Data User</a> 
        <div class="x_content">
            {!! Form::open(['route' => 'user-store', 'class' => 'form-horizontal']) !!}
            @include('admin.user.form') 
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
            <a href="{{ route('user') }}" class="btn btn-default"><i class="fa fa-reply"></i> Batal</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
