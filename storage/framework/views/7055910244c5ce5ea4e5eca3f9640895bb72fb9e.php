<?php echo $__env->make('public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="container album-page">
    <div class="row">
      <div class="col-sm-9">
        <center class="title-slide">
          <h2 class="black">Album</h2>
          
        </center>
        <div class="info-menu">
          <div class="row album-box-center">
            <div class="col-md-4 col-sm-12 col-xs-12 album-center center-menu-album" id="boxscroll">
              <ul>
                <?php  $countGaleri = 0  ?>
                <?php $__empty_1 = true; $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <li>
                    <a href="<?php echo e(route('album-detail', $g->slug)); ?>" class="row">
                      <div class="col-sm-3 album-center-img">
                        <img src="<?php echo e($g->gambar); ?>" />
                      </div>
                      <div class="col-sm-9">
                        <span class="album-center-title"><?php echo e(character_limiter($g->judul, 18)); ?></span>
                        <div class="album-center-info-page">
                          <?php echo e(content($g->isi, 25)); ?>

                          <div class="album-center-datetime-info">
                            <i class="fa fa-clock-o"></i> <?php echo e(CarbonHumanDate(null, $g->tanggal_posting)); ?>

                          </div>
                        </div>
                      </div>
                    </a>
                  </li>
                  <?php  $countGaleri++  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
                <!-- <li>
                  <a href="gallery.php" class="row">
                    <div class="col-sm-3 album-center-img">
                      <img src="assets/img/gallery/1.jpg" />
                    </div>
                    <div class="col-sm-9">
                      <span class="album-center-title">Judul Album</span>
                      <div class="album-center-info-page">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        <div class="album-center-datetime-info">
                          <i class="fa fa-clock-o"></i> 11:20:00 | 07 Des 2016
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="gallery.php" class="row">
                    <div class="col-sm-3 album-center-img">
                      <img src="assets/img/gallery/2.jpg" />
                    </div>
                    <div class="col-sm-9">
                      <span class="album-center-title">Judul Album</span>
                      <div class="album-center-info-page">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                        <div class="album-center-datetime-info">
                          <i class="fa fa-clock-o"></i> 11:20:00 | 07 Des 2016
                        </div>
                      </div>
                    </div>
                  </a>
                </li> -->
              </ul>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12 album-center" id="boxscroll1">
              <div  class="right-box-album">
                <ul class="pgwSlideshow">
                <?php if(isset($album) ? $album : ''): ?>
                  <?php $__empty_1 = true; $__currentLoopData = $album; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $al): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li><img src="<?php echo e($al->url_gambar); ?>" alt="<?php echo e($al->keterangan); ?>" data-description="<?php echo e($al->deskripsi); ?>"></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <?php endif; ?>
                <?php endif; ?>
                </ul>
              </div>                   
            </div>
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