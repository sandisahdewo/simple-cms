<div class="right-side-title">BERITA</div>
<?php $__empty_1 = true; $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
<div class="right-side-report">
    <div class="right-side-report-title"><?php echo e(character_limiter($ber->judul, 20)); ?></div>
    <div class="right-side-report-datetime"><?php echo e(CarbonTime(null, $ber->created_at)); ?> | <?php echo e(CarbonHumanDate(null, $ber->created_at)); ?></div>
    <div class="right-side-report-text">
        <?php echo content($ber->isi, 150, '<a href="'.route('berita-detail', $ber->slug).'">Selengkapnya <i class="fa fa-angle-double-right"></i></a>'); ?>

    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="right-side-report">
        Tidak ada kegiatan untuk ditampilkan.
    </div>
<?php endif; ?>