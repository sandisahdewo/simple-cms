@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content_body')
<h3>Dashboard</h3>
<div class="panel panel-default">
	<div class="panel-body">
		<div class="page-header">
			<h3>Selamat datang di @yield('title')</h3>
		</div>

		<div class="row">
			<div class="col-md-4">
				<h4 class="text-bold">Kategori</h4>
				<ul class="list-unstyled">
					<li><a href="{{ route('kategori') }}"><i class="fa fa-tag"></i> Tambah kategori</a></li>
				</ul>
			</div>
			<div class="col-md-4">
				<h4 class="text-bold">Tag</h4>
				<ul class="list-unstyled">
					<li><a href="{{ route('tag') }}"><i class="fa fa-hashtag"></i> Tambah tag baru</a></li>
				</ul>
			</div>
			<div class="col-md-4">
				<h4 class="text-bold">Post</h4>
				<ul class="list-unstyled">
					<li><a href="{{ route('post-create') }}?format=image"><i class="fa fa-image"></i> Tambah galeri</a></li>
					<li><a href="{{ route('post-create') }}?format=page"><i class="fa fa-file"></i> Tambah page</a></li>
					<li><a href="{{ route('post-create') }}?format=standart"><i class="fa fa-pencil"></i> Tambah post</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<h4 class="text-bold">Posting belum terpublish</h4>
				<table class="table table-responsive table-bordered">
				<thead>
					<tr>
					<th>Judul</th>
					<th width="150px" class="text-center">Tgl.Post</th>
					</tr>
				</thead>
				<tbody>
					@forelse($posts as $post)
						@if($post->status == 'draft')
						<tr>
							<td>
								<b>{{ $post->judul }}</b> by <label class="label label-danger">{{ $post->dibuat_oleh }}</label><br>
								<small class="text-blue">{{ asset('').$post->slug }}</small><br>
								<a href="#" onclick="confirm('Postingan yang sudah diterbitkan akan tampil pada website?', '{{ route("post-publish", array('id' => $post->id))}}')"><i class="fa fa-check"></i> Publish</a>
							</td>
							<td>{{ carbonHumanDate(null, $post->tanggal_posting) }}</td>
						</tr>
						@endif
					@empty
						<tr>
							<td colspan="2">Tidak ada data untuk ditampilkan.</td>
						</tr>
					@endforelse
				</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<h4 class="text-bold">Komentar belum disetujui</h4>
				<table class="table table-responsive table-bordered">
					<thead>
						<tr>
							<th>Komentar</th>
							<th width="100px" class="text-center">Tipe</th>
							<th width="150px" class="text-center">Tgl.Komentar</th>
						</tr>
					</thead>
					<tbody>
						@forelse($komentars as $komentar)
							@if($komentar->status == 'wappr')
							<tr>
								<td>
									<b>{{ $komentar->nama }}</b><br>
									<small class="text-blue">{{ 'Email : '.$komentar->email }}</small><br>
									{{ $komentar->komentar }}<br>
									<a href="#" onclick="confirm('Komentar yang akan disetujui akan tampil pada website?', '{{ route("komentar-approve", array('id' => $komentar->id))}}')"><i class="fa fa-check"></i> Setujui</a>
								</td>
								<td>{{ $komentar->tipe }}</td>
								<td>{{ carbonHumanDate(null, $komentar->tanggal_komentar) }}</td>
							</tr>
							@endif
						@empty
							<tr>
								<td colspan="2">Tidak ada data untuk ditampilkan.</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
@push('scripts')
@endpush
