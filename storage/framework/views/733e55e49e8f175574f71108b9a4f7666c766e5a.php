<?php echo $__env->make('public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-9">
			<center class="title-slide">
				<h2 class="black"><?php echo e($posting->judul); ?></h2>
			</center>
			<div class="info-menu">
				<div class="left-side-title"><?php echo e($posting->judul); ?></div>
				<div class="left-side-text">
					<center>
						<img src="<?php echo e($posting->gambar); ?>">
					</center>
					<?php echo $posting->isi; ?>

				</div>
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