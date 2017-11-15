<table id="datatable-post" class="table table-hover table-striped">
    <thead>
        <th>Judul</th>                                        
        <th width="200px" class="text-center">Kategori</th>
        <th width="200px" class="text-center">Tag</th>
        <th width="100px" class="text-center">Status</th>
        <th width="150px" class="text-center">Tgl.Post</th>
    </thead> 
    <tbody>
        @foreach($data as $row) 
        <tr>
            <td width="400">
                <b>{{ $row->judul }}</b> by <label class="label label-danger">{{ $row->dibuat_oleh }}</label><br>
                <small class="text-blue">{{ url($row->slug) }}</small><br>
                <a href="{{ route('post-edit', $row->id) }}"><i class="fa fa-edit"></i> Edit</a>
                |
                <a href="javascript:void(0)" onclick="confirm('Postingan yang dihapus tidak bisa dikembalikan lagi?', '{!! route('post-delete', $row->id) !!}')"><i class="fa fa-trash"></i> Hapus</a>
                |
                @if ($row->status == 'draft')
                <a href="javascript:void(0)" onclick="confirm('Postingan yang sudah diteribitkan akan tampil pada website?', '{!! route("post-publish", $row->id) !!}')"><i class="fa fa-check"></i> Publish</a>
                @else
                <a href="javascript:void(0)" onclick="confirm('Postingan yang sudah diubah menjadi draft akan hilang dari website?', '{!! route("post-draft", $row->id) !!}')"><i class="fa fa-list"></i> Draft</a>
                @endif
            </td>
            <td>
                @foreach ($row->kategori as $kategori)
                <label class="label label-primary label-tag">{{ $kategori->kategori }}</label>
                @endforeach
            </td>
            <td>
                @foreach ($row->tag as $tag)
                <div class="label label-primary label-tag">{{ $tag->tag }}</div>
                @endforeach
            </td>
            <td class="text-center">{{ ucfirst($row->status) }}</td>
            <td class="text-center">{{ carbonHumanDate(null, $row->tanggal_posting) }}</td>
        </tr>
        @endforeach
    </tbody>
</table> 
