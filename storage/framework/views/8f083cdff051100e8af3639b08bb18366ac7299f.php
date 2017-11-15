<?php $__env->startSection('title', 'Grup'); ?>

<?php $__env->startSection('content_body'); ?>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Grup</h2>
            <div class="clearfix"></div>
        </div>
        <a href="<?php echo e(route('grup')); ?>" class="btn btn-primary"><i class="fa fa-users"></i> Lihat Data Grup</a> 
        <div class="x_content">
            <?php echo Form::model($grup, ['route' => ['grup-update', $grup->id], 'class' => 'form-horizontal']); ?>

            <?php echo $__env->make('admin.grup.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
            <a href="<?php echo e(route('grup')); ?>" class="btn btn-default"><i class="fa fa-reply"></i> Batal</a>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>