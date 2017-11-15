<?php $__env->startSection('title', 'Menu'); ?>

<?php $__env->startSection('content_body'); ?>
<div class="col-md-4">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Menu</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php echo Form::model($menu, ['route' => ['menu-update', $menu->id], 'class' => 'form-horizontal form-label-left']); ?>

            <?php echo $__env->make('admin.menu.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             <div class="form-group">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"> </i> Perbarui</button>
            </div>
           <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Menu</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php echo $__env->make('admin.menu.table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $('#datatable-menu').dataTable();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>