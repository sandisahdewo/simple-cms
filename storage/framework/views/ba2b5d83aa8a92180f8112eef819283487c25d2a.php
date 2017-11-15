<div class="left-side-post-title"><?php echo e($posting->judul); ?></div>
<div class="left-side-post-datetime"><?php echo e(CarbonTime(null, $posting->created_at)); ?> | <?php echo e(CarbonHumanDate(null, $posting->created_at)); ?> | <?php echo e($posting->dibuat_oleh); ?></div>
<div class="left-side-post-text">
    <center><img src="<?php echo e($posting->gambar); ?>"></center>
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