@extends('admin.layouts.app')

@section('title', 'Post')

@section('content_body')
{!! Form::model($post, ['route' => ['post-update', $post->id], 'class' => 'form-horizontal form-label-left']) !!}
    @include('admin.post.image.form')
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

        var toolbarContent = [
            { name: 'document', items : [ 'Source'] },
            { name: 'clipboard', items : ['PasteText','PasteFromWord','-','Undo','Redo' ] },                
            { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','RemoveFormat' ] },                  
            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
            { name: 'links', items : [ 'Link','Unlink' ] },
            { name: 'insert', items : [ 'Image','Table','HorizontalRule','SpecialChar','PageBreak' ] },         
            { name: 'styles', items : [ 'Format', ] },
            { name: 'colors', items : [ 'TextColor','BGColor' ] },
            { name: 'tools', items : [ 'Maximize','-','About' ] }
        ];
        CKEDITOR.replace('content', {
            toolbar : toolbarContent,
            filebrowserBrowseUrl : base_url('filemanager/dialog.php?type=2&editor=ckeditor&fldr='),
            filebrowserUploadUrl : base_url('filemanager/dialog.php?type=2&editor=ckeditor&fldr='),
            filebrowserImageBrowseUrl : base_url('filemanager/dialog.php?type=1&editor=ckeditor&fldr='),
            height : '500px'
        });
        var toolbarPostImageContent = [                    
            { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike' ] },                              
        ];
        CKEDITOR.replace('post-image-description', {
            toolbar : toolbarPostImageContent,
            filebrowserBrowseUrl : base_url('filemanager/dialog.php?type=2&editor=content&fldr='),
            filebrowserUploadUrl : base_url('filemanager/dialog.php?type=2&editor=content&fldr='),
            filebrowserImageBrowseUrl : base_url('filemanager/dialog.php?type=1&editor=content&fldr='),
            height : '200px'
        });
    });
    var countPostImages = 1;

   function browse_main_image() {
        $('[name="filemanager"]').attr('src', base_url('vendors/responsive_filemanager/filemanager/dialog.php?type=0&field_id=gambar'));
        $('#filemanager').modal('show');
    }

    function clear_main_image() {
        $('#img-preview').val('');
        $('#gambar').prop('src', base_url('public/img/no_image_available.jpg'));
    }

    function browse_post_image() {
        $('[name="filemanager"]').attr('src', base_url('vendors/responsive_filemanager/filemanager/dialog.php?type=0&field_id=image-url-add'));
        $('#filemanager').modal('show');
    }

    function responsive_filemanager_callback(field_id){     
        if (field_id == 'gambar') {
            $('#img-preview').prop('src', $('#gambar').val());
        } else {
             countPostImages++;
             html = '<div id="post-image-list-'+countPostImages+'" class="col-md-4 post-image-list">'+
                '<div class="post-image-image">'+
                    '<img src="'+$('#image-url-add').val()+'" />'+
                    '<input type="hidden" name="images['+countPostImages+'][url_gambar]" value="'+$('#image-url-add').val()+'">'+
                    '<input type="hidden" name="images['+countPostImages+'][keterangan]" value="" id="post-image-list-caption-'+countPostImages+'">'+
                    '<input type="hidden" name="images['+countPostImages+'][link]" value="" id="post-image-list-link-'+countPostImages+'">'+
                    '<input type="hidden" name="images['+countPostImages+'][deskripsi]" value="" id="post-image-list-description-'+countPostImages+'">'+
                '</div>'+
                '<div class="btn-group">'+
                    '<button type="button" class="btn btn-default btn-sm" onclick="edit_post_image('+countPostImages+')"><i class="fa fa-pencil"></i></button>'+
                    '<button type="button" class="btn btn-default btn-sm" onclick="delete_post_image('+countPostImages+')"><i class="fa fa-trash"></i></button>'+
                '</div>'+
            '</div>';
            $('#post-image').prepend(html);
            $('#image-url-add').val('');
        }
    }

    function edit_post_image(id) {
        var caption = $('#post-image-list-caption-' + id).val();
        var link = $('#post-image-list-link-' + id).val();
        var description = $('#post-image-list-description-' + id).val();
        $('#post-image-id').val(id);
        $('#post-image-caption').val(caption);
        $('#post-image-link').val(link);
        $('#post-image-description').val(description);
        // CKEDITOR.instances['post-image-description'].setData(description);
        $('#form-post-image').modal('show');
    }
    function save_post_image() {
        var id = $('#post-image-id').val();
        var caption = $('#post-image-caption').val();
        var link = $('#post-image-link').val();
        var description = $('#post-image-description').val();
        // var description = CKEDITOR.instances['post-image-description'].getData(description);
        $('#post-image-list-caption-' + id).val(caption);
        $('#post-image-list-link-' + id).val(link);
        $('#post-image-list-description-' + id).val(description);        
        $('#form-post-image').modal('hide');
    }
    function delete_post_image(id) {
        $('#post-image-list-' + id).remove();
    }
</script>
@endpush