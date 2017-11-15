<div class="form-group">
    <?php echo Form::label('judul', 'Judul *'); ?>

    <?php echo Form::text('judul', isset($post->judul) ? $post->judul : '', ['onkeyup' => 'setSlug()', 'class' => 'form-control']); ?>

</div>
    <?php echo Form::label('slug', 'Slug *'); ?>

<div class="input-group mb-2 mr-sm-2 mb-sm-0">
	<div class="input-group-addon"><?php echo e(url('/').'/'); ?><a id="jenis_slug"></a></div>
    <?php echo Form::text('slug', isset($dataSlug->slug) ? $dataSlug->slug : '', ['class' => 'form-control']); ?>

</div>
<div class="form-group">
    <?php echo Form::label('isi', 'Isi *'); ?>

    <?php echo Form::textarea('isi', isset($post->isi) ? $post->isi : '', ['class' => 'form-control', 'id' => 'posting']); ?>

</div>

<?php $__env->startPush('scripts'); ?>

<script>
var editor = CKEDITOR.replace('posting');

function setSlug() {
        var slug = $("input[name='judul'").val();
        $("input[name='slug']").val(slugify(slug));
    }
$('.select2').select2({
	placeholder : ' '
});

</script>
<?php $__env->stopPush(); ?>
