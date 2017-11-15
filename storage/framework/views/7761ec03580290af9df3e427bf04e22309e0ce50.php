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
                <?php echo $__env->make('public.berita', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="right-side">
                <?php echo $__env->make('public.kegiatan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>