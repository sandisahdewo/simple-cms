<table id="datatable-kategori" class="table table-hover table-striped">
    @if(!empty($backButtonControll))
        <a href="{{ route('kategori', ['parent_id' => isset($backButtonControll->parent_id) ? $backButtonControll->parent_id : '']) }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
        <div class="clearfix"></div>
    @endif
    <thead>
        <th>Kategori</th> 
        <th>Keterangan</th> 
        <th>Aksi</th> 
    </thead> 
    <tbody>
        @forelse($kategoris as $kategori) 
            <tr>
                <td>{{ $kategori->kategori }}</td> 
                <td>{{ $kategori->keterangan }}</td> 
                <td width="160" class="text-center">
                    <a class="btn btn-xs btn-primary" href="{{ route('kategori', 'parent_id='.$kategori->id) }}"><i class="fa fa-indent"></i> Sub-Kategori</a>
                    <a class="btn btn-xs btn-warning" href="{{ route('kategori-edit', $kategori->id.'?parent_id='.$parent_id) }}"><i class="fa fa-pencil"></i> Edit</a>
                    <a class="btn btn-xs btn-danger" href="#" onclick="confirm('Kategori yang dihapus tidak bisa dikembalikan!', '{!! route("kategori-destroy", $kategori->id) !!}')"><i class="fa fa-trash"></i> Hapus</a>
                </td> 
            </tr> 
        @empty
            <tr>
                <td colspan="3" align="center">Tidak mempunyai children.</td>
            </tr>
        @endforelse
    </tbody>
</table> 
