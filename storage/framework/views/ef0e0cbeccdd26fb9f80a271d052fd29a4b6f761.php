<?php $__env->startSection('title', 'Media'); ?>

<?php $__env->startSection('content_body'); ?>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Media</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <iframe src="<?php echo e(asset('vendors/responsive_filemanager/filemanager/dialog.php')); ?>" style="border: 0px;" width="100%" height="550"></iframe>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $('#datatable-tag').dataTable();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>