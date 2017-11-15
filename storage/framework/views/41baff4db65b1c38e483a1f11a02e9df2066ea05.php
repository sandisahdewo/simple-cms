<?php echo $__env->make('public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="container">
    <div class="pnf-page">
      <center><img src="<?php echo e(asset('assets/img/404.png')); ?>" /></center>
      <center>
        <a href="<?php echo e(route('home')); ?>" class="btn btn-warning flat"><i class="fa fa-reply"></i> Kembali Ke Halaman Utama</a>
      </center>
    </div>
  </div>

<?php echo $__env->make('public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
