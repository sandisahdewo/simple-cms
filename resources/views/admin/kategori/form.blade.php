{{ Form::hidden('parent_id', request()->get('parent_id')) }}
<div class="form-group">
    {!! Form::label('kategori', 'Kategori *') !!}
    {!! Form::text('kategori', null, ['onkeyup' => 'setSlug()', 'class' => 'form-control']) !!}
</div> 
<div class="form-group">
    {!! Form::label('lbl_induk', 'Induk Dari') !!}
    {!! Form::text('lbl_induk', isset($backButtonControll->kategori) ? $backButtonControll->kategori : '- Jadikan Induk -', ['class' => 'form-control', 'disabled' => '']) !!}
</div> 
 <div class="form-group">
    {!! Form::label('slug', 'Slug *') !!}
    {!! Form::text('slug', isset($slug->slug) ? $slug->slug : '', ['onkeyup' => 'toSlug()', 'class' => 'form-control']) !!}
</div> 
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'rows' => '3']) !!}
</div>
@push('scripts')
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
@endpush