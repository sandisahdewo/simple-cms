<?php echo $__env->make('public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="container album-page">
    <div class="row">
      <div class="col-sm-9">
        <center class="title-slide">
          <h2 class="black">Berita</h2>
          <!-- <p><h5 class="grey"><i>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</i></h5></p> -->
        </center>
				<form class="form-group">
						<div class="col-md-2">
								<?php echo e(Form::select('year', $optArsip, null, ['onchange' => 'changeTahunBulan()', 'class' => 'form-control input-sm', 'id' => 'tahun'])); ?>

						</div>
						<div class="col-md-2">
								<?php echo e(Form::select('month', [
                    '01' => 'Januari',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember'
                ], null, ['onchange' => 'changeTahunBulan()', 'class' => 'form-control input-sm', 'id' => 'bulan'])); ?>

						</div>
            <a href="#" id="btn-filter" class="btn btn-default btn-filter">Filter</a>
				</form>
				<?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="left-side-activity">
          <div class="left-side-activity-title"><?php echo e($report->judul); ?></div>
          <div class="left-side-activity-datetime"><?php echo e(substr($report->created_at, 11)); ?> | <?php echo e(carbonHumanDate(null, $report->tanggal_posting)); ?> | <?php echo e($report->dibuat_oleh); ?></div>
          <div class="left-side-activity-text">
            <div class="row">
              <div class="col-sm-4"><img src="<?php echo e($report->gambar); ?>"></div>
              <div class="col-sm-8">
								<?php echo content($report->isi, 350, '<a href="'.route('berita-detail', $report->slug).'">Selengkapnya <i class="fa fa-angle-double-right"></i></a>'); ?>

              </div>
            </div>
          </div>
        </div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->startPush('public-script'); ?>
  <script>
    function changeTahunBulan() {
      var tahun = $('#tahun option:selected').val();
      var bulan = $('#bulan option:selected').val();
      $('#btn-filter').attr('href', '<?php echo e(asset('berita')); ?>/'+tahun+'/'+bulan);
    }
  $(document).ready(function() {
    changeTahunBulan();
		$('#btn-filter').removeAttr('href');
  });

  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
