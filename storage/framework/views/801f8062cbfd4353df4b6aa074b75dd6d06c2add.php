<?php $__env->startSection('title', 'Grup'); ?>

<?php $__env->startSection('content_body'); ?>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Grup</h2>
            <div class="clearfix"></div>
        </div>
        <a href="<?php echo e(route('grup-create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Grup</a> 
        <div class="x_content">
            <?php echo $__env->make('admin.grup.table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $('#datatable-kategori').dataTable();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>