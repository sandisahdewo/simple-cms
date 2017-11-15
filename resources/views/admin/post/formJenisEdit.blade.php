<div class="btn-group-vertical btn-block" data-toggle="buttons">
    <label class="btn btn-primary @if($post->jenis == 1) active @endif">
        {!! Form::radio('jenis', '1', isset($post->jenis) ? $post->jenis : '') !!} Berita
    </label>
    <label class="btn btn-primary @if($post->jenis == 2) active @endif">
        {!! Form::radio('jenis', '2', isset($post->jenis) ? $post->jenis : '') !!} Pengumuman
    </label>
    <label class="btn btn-primary @if($post->jenis == 3) active @endif">
        {!! Form::radio('jenis', '3', isset($post->jenis) ? $post->jenis : '') !!} Page
    </label>
    <label class="btn btn-primary @if($post->jenis == 4) active @endif">
        {!! Form::radio('jenis', '4', isset($post->jenis) ? $post->jenis : '') !!} Galeri
    </label>
    <label class="btn btn-primary @if($post->jenis == 5) active @endif">
        {!! Form::radio('jenis', '5', isset($post->jenis) ? $post->jenis : '') !!} Kegiatan
    </label>
</div>