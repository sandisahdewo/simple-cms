@extends('admin.layouts.app')

@section('title', 'User')

@section('content_body')
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit User</h2>
            <div class="clearfix"></div>
        </div>
        <a href="{{ route('user') }}" class="btn btn-primary"><i class="fa fa-users"></i> Lihat Data User</a> 
        <div class="x_content">
            {!! Form::model($user, ['route' => ['user-update', $user->id], 'class' => 'form-horizontal']) !!}
            @include('admin.user.form') 
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
            <a href="{{ route('user') }}" class="btn btn-default"><i class="fa fa-reply"></i> Batal</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
