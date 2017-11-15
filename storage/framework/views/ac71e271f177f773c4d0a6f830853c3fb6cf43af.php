<?php if(!empty(session()->has('errorMessage'))): ?>
   <div class="alert alert-danger fade in">
        <i class="fa fa-ban"></i>
        <?php echo e(session()->get('errorMessage')); ?>

   </div>
<?php endif; ?>
<?php if(!empty(session()->has('successMessage'))): ?>
   <div class="alert alert-success fade in">
        <i class="fa fa-check"></i>
        <?php echo e(session()->get('successMessage')); ?>

   </div>
<?php endif; ?>
<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <h4>
            <i class="fa fa-times"></i>
            Form tidak diisi dengan benar!
        </h4>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>