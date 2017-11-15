<p>
	<span class="grey">Tag : </span>
	<?php $__empty_1 = true; $__currentLoopData = $posting->tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	<label class="label label-primary"><a href="<?php echo e(route('find-tag', $tag->tag)); ?>" class="white"><?php echo e($tag->tag); ?></a></label>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

	<?php endif; ?>
	|
	<span class="grey">Kategori : </span>
	<?php $__empty_1 = true; $__currentLoopData = $posting->kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	<label class="label label-warning"><a href="<?php echo e(route('find-kategori', $kategori->kategori)); ?>" class="white"><?php echo e($kategori->kategori); ?></a></label>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	<?php endif; ?>
</p>