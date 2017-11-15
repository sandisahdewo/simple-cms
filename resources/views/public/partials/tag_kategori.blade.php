<p>
	<span class="grey">Tag : </span>
	@forelse($posting->tag as $tag)
	<label class="label label-primary"><a href="{{ route('find-tag', $tag->tag) }}" class="white">{{ $tag->tag }}</a></label>
	@empty

	@endforelse
	|
	<span class="grey">Kategori : </span>
	@forelse($posting->kategori as $kategori)
	<label class="label label-warning"><a href="{{ route('find-kategori', $kategori->kategori) }}" class="white">{{ $kategori->kategori }}</a></label>
	@empty
	@endforelse
</p>