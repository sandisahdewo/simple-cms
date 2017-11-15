            <?php echo e(Form::hidden('parent_id', request()->get('parent_id'))); ?>

            <div class="form-group">
                <?php echo Form::label('kategori', 'Kategori *'); ?>

                <?php echo Form::text('kategori', isset($kategori->kategori) ? $kategori->kategori : '', ['onkeyup' => 'setSlug()', 'class' => 'form-control']); ?>

            </div> 
            <div class="form-group">
                <?php echo Form::label('slug', 'Slug *'); ?>

                <?php echo Form::text('slug', isset($slug->slug) ? $slug->slug : '', ['class' => 'form-control']); ?>

            </div> 
            <div class="form-group">
                <?php echo Form::label('keterangan', 'Keterangan'); ?>

                <?php echo Form::textarea('keterangan', isset($kategori->keterangan) ? $kategori->keterangan : '', ['class' => 'form-control', 'rows' => '3']); ?>

            </div>

<?php $__env->startPush('scripts'); ?>
<script>
    function setSlug() {
        var slug = $("input[name='kategori'").val();
        $("input[name='slug']").val(slugify(slug));
    }
</script>
<?php $__env->stopPush(); ?>
