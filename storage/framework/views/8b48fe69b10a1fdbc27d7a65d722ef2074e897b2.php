<?php $__env->startSection('title', 'Komentar'); ?>

<?php $__env->startSection('content_body'); ?>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Komentar</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="well" style="overflow: auto;">
                <form class="form-group">
                    <div class="col-md-3">
                        <?php echo e(Form::select('tipe', ['all' => 'Semua Jenis', 'umum' => 'Umum', 'pengaduan' => 'Pengaduan'], $tipe, ['class' => 'form-control input-sm'])); ?>

                    </div>
                    <button class="btn btn-sm btn-default">Filter</button>
                    <div class="btn-group btn-sm" style="margin-top: -5px">
                        <a href="<?php echo e(route('komentar')); ?>" class="btn btn-sm btn-default">Semua</a>
                        <a href="<?php echo e(route('komentar', 'appr'.'?tipe='.$tipe)); ?>" class="btn btn-sm btn-default">Disetujui (<?php echo e($appr); ?>)</a>
                        <a href="<?php echo e(route('komentar', 'wappr'.'?tipe='.$tipe)); ?>" class="btn btn-sm btn-default">Menunggu (<?php echo e($wappr); ?>)</a>
                    </div>
                </form>
            </div>
            <?php echo $__env->make('admin.komentar.table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $('#datatable-komentar').dataTable();
    </script>
    <script>
    function reply(id) {
        $('#reply-' + id).show();
    }
    function cancel_reply(id) {
        $('#reply-' +id).hide();
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>