<?php echo e(Form::hidden('parent_id', request()->get('parent_id'))); ?>

<div class="form-group">
    <?php echo Form::label('kategori', 'Kategori *'); ?>

    <?php echo Form::text('kategori', null, ['onkeyup' => 'setSlug()', 'class' => 'form-control']); ?>

</div> 
<div class="form-group">
    <?php echo Form::label('lbl_induk', 'Induk Dari'); ?>

    <?php echo Form::text('lbl_induk', isset($backButtonControll->kategori) ? $backButtonControll->kategori : '- Jadikan Induk -', ['class' => 'form-control', 'disabled' => '']); ?>

</div> 
 <div class="form-group">
    <?php echo Form::label('slug', 'Slug *'); ?>

    <?php echo Form::text('slug', isset($slug->slug) ? $slug->slug : '', ['onkeyup' => 'toSlug()', 'class' => 'form-control']); ?>

</div> 
<div class="form-group">
    <?php echo Form::label('keterangan', 'Keterangan'); ?>

    <?php echo Form::textarea('keterangan', null, ['class' => 'form-control', 'rows' => '3']); ?>

</div>
<?php $__env->startPush('scripts'); ?>
<script>
    function setSlug() {
        var text = $("input[name='kategori']").val();
        $("input[name='slug']").val(text);
        toSlug();
    }
    function toSlug() {
        $("input[name='slug']").val(slugify($("input[name='slug']").val()));
    }
</script> 
<?php $__env->stopPush(); ?>