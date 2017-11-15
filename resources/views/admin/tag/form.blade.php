            <div class="form-group">
                {!! Form::label('tag', 'Tag *') !!}
                {!! Form::text('tag', isset($tag->tag) ? $tag->tag : '', ['onkeyup' => 'setSlug()', 'class' => 'form-control']) !!}
            </div> 
            <div class="form-group">
                {!! Form::label('slug', 'Slug *') !!}
                {!! Form::text('slug', isset($slug->slug) ? $slug->slug : '', ['onkeyup' => 'toSlug()', 'class' => 'form-control']) !!}
            </div> 
            <div class="form-group">
                {!! Form::label('keterangan', 'Keterangan') !!}
                {!! Form::textarea('keterangan', isset($tag->keterangan) ? $tag->keterangan : '', ['class' => 'form-control', 'rows' => '3']) !!}
            </div>

@push('scripts')
<script>
    function setSlug() {
        var text = $("input[name='tag']").val();
        $("input[name='slug']").val(text);
        toSlug();
    }
    function toSlug() {
        $("input[name='slug']").val(slugify($("input[name='slug']").val()));
    }
</script> 
@endpush
