<?php echo $__env->make('public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="container album-page">
    <div class="row">
        <div class="col-sm-9">
            <div class="left-side-post">
                <?php if($posting->format == 'standart'): ?>
                    <?php echo $__env->make('public.post.standart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php elseif($posting->format == 'page'): ?>
                    <?php echo $__env->make('public.post.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php elseif($posting->format == 'image'): ?>
                    <?php echo $__env->make('public.post.image', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="right-side-top">
                <?php echo $__env->make('public.berita', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="right-side">
                <?php echo $__env->make('public.kegiatan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php echo $__env->make('public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>