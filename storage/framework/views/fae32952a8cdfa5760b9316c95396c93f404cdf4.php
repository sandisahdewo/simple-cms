<?php $__env->startSection('title', 'Post'); ?>

<?php $__env->startSection('content_body'); ?>
<?php echo Form::model($post, ['route' => ['post-update', $post->id ], 'class' => 'form-horizontal form-label-left']); ?>

    <?php echo $__env->make('admin.post.page.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.tanggal').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            defaultDate: '<?= date('Y-m-d') ?>'
        });
        $('.tanggal').datepicker("setDate", new Date());
    });

    function browse_main_image() {
        $('#filemanager').modal('show');
    }

    function clear_main_image() {
        $('#gambar').val('');
        $('#img-preview').prop('src', base_url('/public/images/no_image.jpg'));
    }

    function responsive_filemanager_callback(field_id){     
        $('#img-preview').prop('src', $('#gambar').val());
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>