<div class="form-group">
    {!! Form::label('judul', 'Judul *') !!}
    {!! Form::text('judul', isset($post->judul) ? $post->judul : '', ['onkeyup' => 'setSlug()', 'class' => 'form-control']) !!}
</div>
    {!! Form::label('slug', 'Slug *') !!}
<div class="input-group mb-2 mr-sm-2 mb-sm-0">
	<div class="input-group-addon">{{ url('/').'/' }}<a id="jenis_slug"></a></div>
    {!! Form::text('slug', isset($dataSlug->slug) ? $dataSlug->slug : '', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('isi', 'Isi *') !!}
    {!! Form::textarea('isi', isset($post->isi) ? $post->isi : '', ['class' => 'form-control', 'id' => 'posting']) !!}
</div>

@push('scripts')

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
@endpush
