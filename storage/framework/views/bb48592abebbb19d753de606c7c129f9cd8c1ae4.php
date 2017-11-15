<div class="left-side-post-title"><?php echo e($posting->judul); ?></div>
<div class="left-side-post-datetime"><?php echo e(CarbonTime(null, $posting->created_at)); ?> | <?php echo e(CarbonHumanDate(null, $posting->created_at)); ?> | <?php echo e($posting->dibuat_oleh); ?></div>
<div class="left-side-post-text">
    <div id="myReport" class="carousel carousel-post slide" data-ride="carousel">
        <?php  $countLiImg = 0;  ?>
        <ol class="carousel-indicators">
            <?php $__currentLoopData = $posting->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li data-target="#myReport" data-slide-to="<?php echo e($countLiImg); ?>" class="report-slide <?php if($countLiImg == 0): ?> active <?php endif; ?>"></li>
            <?php  $countLiImg++;  ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php  $countImage = 0;  ?>
            <?php $__currentLoopData = $posting->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item item-report <?php if($countImage == 0): ?> active <?php endif; ?>">
                    <center><img class="third-slide" src="<?php echo e($img->url_gambar); ?>"></center>
                </div>
            <?php  $countImage++;  ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <a class="arrow left carousel-control" href="#myReport" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="arrow right carousel-control" href="#myReport" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <p>
        <?php echo e(content($posting->isi, false)); ?>

    </p>
    <?php echo $__env->make('public.partials.tag_kategori', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="left-side-post-comment-input">
    <h3>Komentar</h3>
    <?php echo Form::open(['route' => 'tanggapan-store']); ?>

    <div class="form-group">
        <?php echo Form::text('email', null, ['class' => 'form-control flat', 'placeholder' => 'Masukkan Alamat E-mail']); ?>

    </div>
    <div class="form-group">
        <?php echo Form::textarea('komentar', null, ['class' => 'form-control flat', 'placeholder' => 'Masukkan Keluhan', 'rows' => '2']); ?>

    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg pull-right">KIRIM</button>
    </div>
    <?php echo Form::close(); ?>

</div>
