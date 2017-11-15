<?php echo $__env->make('public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="container album-page">
    <div class="row">
        <div style="margin-top:40px">
            <?php echo $__env->make('public.message_validate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-sm-9">
            <center class="title-slide">
                <h2 class="black">Pengaduan</h2>
                
            </center>
            <div class="left-side-complaint">
                <div class="left-side-complaint-box">
                    <div class="row">
                        <div class="col-sm-6 left-side-complaint-right">
                            <h3 class="left-side-complaint-right-title">Silahkan Adukan Keluhan Anda</h3>
                            <?php echo Form::open(['route' => 'tanggapan-store']); ?>

                            <div class="complaint-box-right-text">
                                <div class="form-group">
                                    <?php echo Form::text('email', null, ['class' => 'form-control flat', 'placeholder' => 'Masukkan Alamat E-mail']); ?>

                                </div>
                                <div class="form-group">
                                    <?php echo Form::textarea('komentar', null, ['class' => 'form-control flat', 'placeholder' => 'Masukkan Keluhan', 'rows' => '2']); ?>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-complaint pull-right">KIRIM</button>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                        <div class="col-sm-6 left-side-complaint-left">
                            <h3 class="left-side-complaint-right-title">Cari Keluhan Serupa</h3>
                            <?php echo Form::open(['route' => ['pengaduan', 'cari='], 'method' => 'get']); ?>

                            <div class="complaint-box-right-text">
                                <div class="form-group">
                                    <input type="text" name="cari" value="<?php echo e(request()->get('cari')); ?>" class="form-control flat" placeholder="Masukkan Kata Kunci">
                                    <p class="warning-text">* Sebelum melaporkan aduan, Anda bisa mencari aduan serupa melalui kotak pencarian dibawah ini.</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-complaint pull-right">CARI</button>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
                <?php $__empty_1 = true; $__currentLoopData = $complaint; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="left-side-complaint-comment">
                        <div class="left-side-complaint-date"><?php echo e(CarbonHumanDate(null, $comp->tanggal_komentar)); ?></div>
                        <div class="left-side-complaint-email"><?php echo e($comp->email); ?></div>
                        <div class="left-side-complaint-text"><?php echo e($comp->komentar); ?></div>
                        <div class="left-side-complaint-title-answer">JAWABAN :</div>
                        <div class="left-side-complaint-text"><?php echo e(isset($comp->jawaban[0]->komentar) ? $comp->jawaban[0]->komentar : ''); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="left-side-complaint-comment">
                        <div class="left-side-complaint-text">Tidak ada keluhan untuk ditampilkan</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="right-side-top">
                <div class="right-side-title">BERITA</div>
                <?php if($berita): ?>
                  <?php $__empty_1 = true; $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                    <div class="right-side-report">
                        <div class="right-side-report-title"><?php echo e(character_limiter($ber->judul, 20)); ?></div>
                        <div class="right-side-report-datetime"><?php echo e(CarbonTime(null, $ber->created_at)); ?> | <?php echo e(CarbonHumanDate(null, $ber->created_at)); ?></div>
                        <div class="right-side-report-text">
                            <?php echo content($ber->isi, 150, '<a href="'.route('berita-detail', $ber->slug).'">Selengkapnya <i class="fa fa-angle-double-right"></i></a>'); ?>

                        </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                  <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="right-side">
                <div class="right-side-title">KEGIATAN</div>
                <?php if($kegiatan): ?>
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

                  <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>