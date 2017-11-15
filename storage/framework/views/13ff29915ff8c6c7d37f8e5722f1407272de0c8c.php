<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_body'); ?>
<h3>Dashboard</h3>
<div class="panel panel-default">
	<div class="panel-body">
		<div class="page-header">
			<h3>Selamat datang di <?php echo $__env->yieldContent('title'); ?></h3>
		</div>

		<div class="row">
			<div class="col-md-4">
				<h4 class="text-bold">Kategori</h4>
				<ul class="list-unstyled">
					<li><a href="<?php echo e(route('kategori')); ?>"><i class="fa fa-tag"></i> Tambah kategori</a></li>
				</ul>
			</div>
			<div class="col-md-4">
				<h4 class="text-bold">Tag</h4>
				<ul class="list-unstyled">
					<li><a href="<?php echo e(route('tag')); ?>"><i class="fa fa-hashtag"></i> Tambah tag baru</a></li>
				</ul>
			</div>
			<div class="col-md-4">
				<h4 class="text-bold">Post</h4>
				<ul class="list-unstyled">
					<li><a href="<?php echo e(route('post-create')); ?>?format=image"><i class="fa fa-image"></i> Tambah galeri</a></li>
					<li><a href="<?php echo e(route('post-create')); ?>?format=page"><i class="fa fa-file"></i> Tambah page</a></li>
					<li><a href="<?php echo e(route('post-create')); ?>?format=standart"><i class="fa fa-pencil"></i> Tambah post</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<h4 class="text-bold">Posting belum terpublish</h4>
				<table class="table table-responsive table-bordered">
          <thead>
            <tr>
              <th>Judul</th>
              <th width="150px" class="text-center">Tgl.Post</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($post->status == 'draft'): ?>
							<tr>
	              <td>
	                <b><?php echo e($post->judul); ?></b> by <label class="label label-danger"><?php echo e($post->dibuat_oleh); ?></label><br>
	                <small class="text-blue"><?php echo e(asset('').$post->slug); ?></small><br>
	                <a href="#" onclick="confirm('Postingan yang sudah diterbitkan akan tampil pada website?', '<?php echo e(route("post-publish", array('id' => $post->id))); ?>')"><i class="fa fa-check"></i> Publish</a>
	              </td>
	              <td><?php echo e(carbonHumanDate(null, $post->tanggal_posting)); ?></td>
							</tr>
							<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<h4 class="text-bold">Komentar belum terpublish</h4>
				<table class="table table-responsive table-bordered">
					<thead>
            <tr>
              <th>Komentar</th>
              <th width="100px" class="text-center">Tipe</th>
              <th width="150px" class="text-center">Tgl.Komentar</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $komentars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $komentar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($komentar->status == 'draft'): ?>
							<tr>
	              <td>
	                <b><?php echo e($komentar->nama); ?></b><br>
	                <small class="text-blue"><?php echo e('Email : '.$komentar->email); ?></small><br>
	                <?php echo e($komentar->komentar); ?><br>
	                <a href="#" onclick="confirm('Komentar yang akan disetujui akan tampil pada website?', '<?php echo e(route("komentar-approve", array('id' => $post->id))); ?>')"><i class="fa fa-check"></i> Setujui</a>
	              </td>
	              <td><?php echo e($komentar->tipe); ?></td>
	              <td><?php echo e(carbonHumanDate(null, $komentar->tanggal_komentar)); ?></td>
							</tr>
							<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>