<div class="left-side-post-title"><?php echo e($posting->judul); ?></div>
<div class="left-side-post-datetime"><?php echo e(CarbonTime(null, $posting->created_at)); ?> | <?php echo e(CarbonHumanDate(null, $posting->created_at)); ?> | <?php echo e($posting->dibuat_oleh); ?></div>
<div class="left-side-post-text">
    <center><img src="<?php echo e($posting->gambar); ?>"></center>
    <p>
    	<?php echo $posting->isi; ?>

    </p>
</div>