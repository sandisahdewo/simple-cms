<?php echo e(Form::hidden('parent_id', request()->get('parent_id'))); ?>

<div class="form-group">
    <?php echo Form::label('menu', 'Menu *'); ?>

    <?php echo Form::text('menu', isset($daftarMenu->menu) ? $daftarMenu->menu : '', ['onkeyup' => 'setSlug()', 'class' => 'form-control']); ?>

</div> 
<div class="form-group">
    <?php echo Form::label('induk', 'Induk'); ?>

    <?php echo Form::text('induk', isset($induk->menu) ? $induk->menu : '- Jadikan Induk -', ['class' => 'form-control', 'readonly']); ?>

</div> 
<div class="form-group">
    <?php echo Form::label('url', 'Url *'); ?>

    <?php echo Form::text('url', isset($daftarMenu->url) ? $daftarMenu->url : '', ['class' => 'form-control']); ?>

</div> 

<?php $__env->startPush('scripts'); ?>
<script>
    function setSlug() {
        var slug = $("input[name='menu'").val();
        $("input[name='url']").val(slugify(slug));
    }
</script>
<?php $__env->stopPush(); ?>
