@extends('admin.layouts.app')

@section('title', 'Post')

@section('content_body')
{!! Form::model($post, ['route' => ['post-update', $post->id], 'class' => 'form-horizontal form-label-left']) !!}
    @include('admin.post.standart.form')
{!! Form::close() !!}
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.tanggal').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            defaultDate: {{ $post->tanggal_posting }}
        });
    });

    function browse_main_image() {
        $('#filemanager').modal('show');
    }

    function clear_main_image() {
        $('#gambar').val('');
        $('#img-preview').prop('src', base_url('images/no_image.jpg'));
    }

    function responsive_filemanager_callback(field_id){
        $('#img-preview').prop('src', $('#gambar').val());
    }
</script>
@endpush