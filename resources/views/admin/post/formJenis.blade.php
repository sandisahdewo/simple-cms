<div class="btn-group-vertical btn-block" data-toggle="buttons">
    <button onclick="changeJenis()">L</button>
    <label class="btn btn-primary">
        {!! Form::radio('jenis', '1', isset($post->jenis) ? $post->jenis : '', ['onclick' => 'changeJenis()']) !!} Berita
    </label>
    <label class="btn btn-primary">
        {!! Form::radio('jenis', '2', isset($post->jenis) ? $post->jenis : '') !!} Pengumuman
    </label>
    <label class="btn btn-primary">
        {!! Form::radio('jenis', '3', isset($post->jenis) ? $post->jenis : '') !!} Page
    </label>
    <label class="btn btn-primary">
        {!! Form::radio('jenis', '4', isset($post->jenis) ? $post->jenis : '') !!} Galeri
    </label>
    <label class="btn btn-primary">
        {!! Form::radio('jenis', '5', isset($post->jenis) ? $post->jenis : '') !!} Kegiatan
    </label>
</div>

@push('scripts')
<script>
    function changeJenis() {
        alert('test');
    }
</script>
@endpush