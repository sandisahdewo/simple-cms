<div class="btn-group-vertical btn-block" data-toggle="buttons">
    <label class="btn btn-primary">
        <?php echo Form::radio('jenis', '1', isset($post->jenis) ? $post->jenis : ''); ?> Berita
    </label>
    <label class="btn btn-primary">
        <?php echo Form::radio('jenis', '2', isset($post->jenis) ? $post->jenis : ''); ?> Pengumuman
    </label>
    <label class="btn btn-primary">
        <?php echo Form::radio('jenis', '3', isset($post->jenis) ? $post->jenis : ''); ?> Page
    </label>
    <label class="btn btn-primary">
        <?php echo Form::radio('jenis', '4', isset($post->jenis) ? $post->jenis : ''); ?> Galeri
    </label>
    <label class="btn btn-primary">
        <?php echo Form::radio('jenis', '5', isset($post->jenis) ? $post->jenis : ''); ?> Kegiatan
    </label>
</div>
