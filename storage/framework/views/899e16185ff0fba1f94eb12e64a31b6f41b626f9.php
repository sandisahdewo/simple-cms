            <div class="form-group">
                <?php echo Form::label('tag', 'Tag *'); ?>

                <?php echo Form::text('tag', isset($tag->tag) ? $tag->tag : '', ['onkeyup' => 'setSlug()', 'class' => 'form-control']); ?>

            </div> 
            <div class="form-group">
                <?php echo Form::label('slug', 'Slug *'); ?>

                <?php echo Form::text('slug', isset($slug->slug) ? $slug->slug : '', ['class' => 'form-control']); ?>

            </div> 
            <div class="form-group">
                <?php echo Form::label('keterangan', 'Keterangan'); ?>

                <?php echo Form::textarea('keterangan', isset($tag->keterangan) ? $tag->keterangan : '', ['class' => 'form-control', 'rows' => '3']); ?>

            </div>

<?php $__env->startPush('scripts'); ?>
<script>
    function setSlug() {
        var slug = $("input[name='tag'").val();
        $("input[name='slug']").val(slugify(slug));
    }
</script>
<?php $__env->stopPush(); ?>
