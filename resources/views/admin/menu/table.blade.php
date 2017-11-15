<table id="datatable-menu" class="table table-hover table-striped">
    <thead>
        <th>Kategori</th> 
        <th>Keterangan</th> 
        <th>Aksi</th> 
    </thead> 
    <tbody>
        @forelse($menus as $menu) 
            <tr>
                <td>{{ $menu->menu }}</td> 
                <td>{{ $menu->keterangan }}</td> 
                <td width="180" class="text-center">
                    <a class="btn btn-xs btn-primary" href="{{ route('daftarMenu', ['idMenu' => $menu->id]) }}"><i class="fa fa-list"></i> Daftar Menu</a><br>
                    @if(!$menu->menu == 'Sidebar')
                        <a class="btn btn-xs btn-warning" href="{{ route('menu-edit', $menu->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                        <a class="btn btn-xs btn-danger" href="#" onclick="confirm('Menu yang dihapus tidak bisa dikembalikan!', '{!! route("menu-destroy", $menu->id) !!}')"><i class="fa fa-trash"></i> Hapus</a>
                    @endif
                </td> 
            </tr> 
        @empty
            <tr>
                <td colspan="3" align="center">Tidak data untuk ditampilkan.</td>
            </tr>
        @endforelse
    </tbody>
</table> 
