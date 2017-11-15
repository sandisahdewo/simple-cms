<?php echo $__env->make('public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<header id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php  $countsLi = 0  ?>
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $liSlider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <li data-target="#myCarousel" data-slide-to="<?php echo e($countsLi); ?>" class="<?php if($countsLi == 0): ?> active <?php endif; ?>"></li>
        <?php  $countsLi++  ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
    <div class="carousel-inner" role="listbox">
        <?php  $counts = 0  ?>
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item <?php if($counts == 0): ?> active <?php endif; ?>">
            <img class="first-slide" src="<?php echo e($slider->url_gambar); ?>" alt="Pertama">
            <div class="container">
                <div class="carousel-caption">
                    <h1><?php echo e($slider->keterangan); ?></h1>
                    <p class="roboto-font"><?php echo e($slider->deskripsi); ?></p>
                </div>
            </div>
        </div>
        <?php  $counts++  ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</header>

<section class="tab-content">
    <div class="box-title">
        <h2 class="general-title text-center">KEGIATAN</h2>
    </div>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $kegiatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-3 activity-box">
                <img src="<?php echo e($keg->gambar); ?>">
                <div class="activity-text">
                    <div class="activity-title"><?php echo e($keg->judul); ?></div>
                    <?php echo content($keg->isi, 75, '<a href="'.route('kegiatan-detail', $keg->slug).'">Selengkapnya <i class="fa fa-angle-double-right"></i></a>'); ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<section class="tab-content tab-report">
    <div class="box-title">
        <h2 class="general-title text-center">BERITA</h2>
    </div>
    <div class="container">
        <div id="myReport" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php  $countsLiBerita = 0  ?>
                <?php $__empty_1 = true; $__currentLoopData = $sliderBerita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li data-target="#myReport" data-slide-to="<?php echo e($countsLiBerita); ?>" class="report-slide <?php if($countsLiBerita == 0): ?> active <?php endif; ?>"></li>
                <?php  $countsLiBerita++  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php  $countsBerita = 0;  ?>
                <?php $__currentLoopData = $sliderBerita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item item-report <?php if($countsBerita == 0): ?> active <?php endif; ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 item-report-img">
                                    <img class="third-slide" src="<?php echo e($berita->gambar); ?>" alt="Empat">
                                </div>
                                <div class="col-sm-6">
                                    <div class="item-report-text">
                                        <h3><?php echo e($berita->judul); ?></h3>
                                        <p class="justify-style"><?php echo e(content($berita->isi, false)); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  $countsBerita++;  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a class="arrow left carousel-control" href="#myReport" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="arrow right carousel-control" href="#myReport" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <section class="tab-content">
        <div class="box-title">
            <h2 class="general-title text-center">GALERY</h2>
        </div>
        <div class="container">
            <div class="gallery-box">
                <div class="row">
                    <div class="col-sm-5 gallery-box-img">
                        <img src="<?php echo e($galeri->first()->gambar); ?>" alt="Empat">
                    </div>
                    <div class="col-sm-7">
                        <div class="gallery-box-text">
                            <h4 class="gallery-box-title"><?php echo e($galeri->first()->judul); ?></h4>
                            <span class="white"><?php echo e(CarbonHumanDate(null, $galeri->first()->tanggal_posting)); ?> - <?php echo e($galeri->first()->dibuat_oleh); ?></span>
                            <p class="justify-style"><?php echo e(content($galeri->first()->isi, false)); ?></p>
                        </div>
                        <div class="gallery-box-album">
                            <?php $__currentLoopData = $galeri->splice(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeriImg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img src="<?php echo e($galeriImg->gambar); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tab-content">
        <div class="box-title">
            <h2 class="general-title text-center">PENGADUAN</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 complaint-box-left">
                    <?php $__empty_1 = true; $__currentLoopData = $komentar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $koment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-sm-4">
                        <span><?php echo e($koment->email); ?></span>
                        <p class="complaint-box-text"><?php echo e($koment->komentar); ?></p>
                        <span class="complaint-answer">JAWABAN :</span>
                        <p><i><?php echo e(isset($koment->jawaban[0]->komentar) ? $koment->jawaban[0]->komentar : ''); ?></i></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <span>Tidak ada Pengaduan untuk di tampilkan.</span>
                    <?php endif; ?>
                </div>
                <div class="col-sm-4 complaint-box-right">
                    <h3 class="complaint-box-right-title">Silahkan Adukan Keluhan Anda</h3>
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
            </div>
        </div>
    </section>

    <?php echo $__env->make('public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>