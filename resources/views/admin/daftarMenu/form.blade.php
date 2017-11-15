{{ Form::hidden('parent_id', request()->get('parent_id')) }}
<div class="form-group">
    {!! Form::label('menu', 'Menu *') !!}
    {!! Form::text('menu', isset($daftarMenu->menu) ? $daftarMenu->menu : '', ['onkeyup' => 'setSlug()', 'class' => 'form-control']) !!}
</div> 
<div class="form-group">
    {!! Form::label('induk', 'Induk') !!}
    {!! Form::text('induk', isset($induk->menu) ? $induk->menu : '- Jadikan Induk -', ['class' => 'form-control', 'readonly']) !!}
</div> 
<div class="form-group">
    {!! Form::label('url', 'Url *') !!}
    {!! Form::text('url', isset($daftarMenu->url) ? $daftarMenu->url : '', ['class' => 'form-control']) !!}
</div> 

@push('scripts')
<script>
    function setSlug() {
        var slug = $("input[name='menu'").val();
        $("input[name='url']").val(slugify(slug));
    }
</script>
@endpush
