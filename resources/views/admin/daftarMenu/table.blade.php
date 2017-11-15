<table id="datatable-kategori" class="table table-hover table-striped">
    @if(!empty($induk))
        <a href="{{ route('daftarMenu', ['parent_id' => isset($induk->parent_id) ? $induk->parent_id : '']) }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
        <div class="clearfix"></div>
    @elseif(request()->get('parent_id') !== null && empty($induk->parent_id) !== null)
        <a href="{{ route('daftarMenu') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali ke awal</a>
    @endif
    <thead>
        <th>Daftar Menu</th> 
        <th>Url</th> 
        <th>Aksi</th> 
    </thead> 
    <tbody>
        @forelse($daftarMenus as $daftarMenu) 
            <tr>
                <td>{{ $daftarMenu->menu }}</td> 
                <td>{{ $daftarMenu->url }}</td> 
                <td width="140" class="text-center">
                    @if(request()->get('parent_id') == null) 
                        <a class="btn btn-xs btn-primary" href="{{ route('daftarMenu', '?parent_id='.$daftarMenu->id) }}"><i class="fa fa-indent"></i> Tambah Sub-Menu</a>
                    @endif
                    <a class="btn btn-xs btn-warning" href="{{ route('daftarMenu-edit', [$daftarMenu->id.'?parent_id='.$parent_id]) }}"><i class="fa fa-pencil"></i> Edit</a>
                    <a class="btn btn-xs btn-danger" href="#" onclick="confirm('Daftar Menu yang dihapus tidak bisa dikembalikan!', '{!! route("daftarMenu-destroy", [$daftarMenu->id]) !!}')"><i class="fa fa-trash"></i> Hapus</a>
                </td> 
            </tr> 
        @empty
            <tr>
                <td colspan="3" align="center">Tidak mempunyai children.</td>
            </tr>
        @endforelse
    </tbody>
</table> 
