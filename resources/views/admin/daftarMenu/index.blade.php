@extends('admin.layouts.app')

@section('title', 'Daftar Menu')

@section('content_body')
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Daftar Halaman</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table class="table table-bordered">
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tag</th>
                    <th>Status</th>
                    <th width="130">Tgl. Posting</th>
                </tr>

                <tr>
                    <td>

                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="x_panel">
        <div class="x_title">
            <h2>Tambah Daftar Menu</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! Form::open(['route' => ['daftarMenu-store'], 'class' => 'form-horizontal form-label-left']) !!}
                @include('admin.daftarMenu.form')
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
            <h2>Data Daftar Menu</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @include('admin.daftarMenu.table') 
        </div>
    </div>
</div>

@endsection
