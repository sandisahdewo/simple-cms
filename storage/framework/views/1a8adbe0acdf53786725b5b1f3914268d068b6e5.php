<div class="right-side-title">KEGIATAN</div>
<?php $__empty_1 = true; $__currentLoopData = $kegiatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="right-side-report">
    <div class="right-side-report-title"><?php echo e($keg->judul); ?></div>
    <div class="right-side-report-datetime"><?php echo e(CarbonTime(null, $keg->created_at)); ?> | <?php echo e(CarbonHumanDate(null, $keg->created_at)); ?></div>
    <div class="right-side-report-text">
        <div class="row">
            <div class="col-sm-5"><img src="<?php echo e($keg->gambar); ?>"></div>
            <div class="col-sm-7">
                <?php echo content($keg->isi, 150, '<a href="'.route('kegiatan-detail', $keg->slug).'">Selengkapnya <i class="fa fa-angle-double-right"></i></a>'); ?>

            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="right-side-report">
        Tidak ada kegiatan untuk ditampilkan.
    </div>
<?php endif; ?>