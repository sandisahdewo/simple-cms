<?php echo $__env->make('public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="container album-page">
    <div class="row">
      <div class="col-sm-9">
        <div class="left-side-post">
          <div class="left-side-post-title"><?php echo e($posting->judul); ?></div>
          <div class="left-side-post-datetime"><?php echo e(CarbonTime(null, $posting->created_at)); ?> | <?php echo e(CarbonHumanDate(null, $posting->created_at)); ?> | <?php echo e($posting->dibuat_oleh); ?></div>
          <div class="left-side-post-text">
            <center><img src="<?php echo e($posting->gambar); ?>"></center>
            <p>
              <?php echo e(content($posting->isi, false)); ?>

            </p>
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
        </div>
      </div>
      <div class="col-sm-3">
        <div class="right-side-top">
          <div class="right-side-title">BERITA</div>
          <div class="right-side-report">
            <?php if($berita): ?>
              <?php $__empty_1 = true; $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                <div class="right-side-report-title"><?php echo e(character_limiter($ber->judul, 20)); ?></div>
                <div class="right-side-report-datetime"><?php echo e(CarbonTime(null, $ber->created_at)); ?> | <?php echo e(CarbonHumanDate(null, $ber->created_at)); ?></div>
                <div class="right-side-report-text">
                  <?php echo content($ber->isi, 150, '<a href="'.route('berita-detail', $ber->slug).'">Selengkapnya <i class="fa fa-angle-double-right"></i></a>'); ?>

                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

              <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="right-side">
          <div class="right-side-title">KEGIATAN</div>
          <div class="right-side-report">
            <?php if($kegiatan): ?>
              <?php $__empty_1 = true; $__currentLoopData = $kegiatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php echo $__env->make('public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>