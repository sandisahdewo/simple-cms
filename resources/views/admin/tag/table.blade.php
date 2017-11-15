            <table id="datatable-tag" class="table table-hover table-striped">
                <thead>
                    <th>Tag</th> 
                    <th>Keterangan</th> 
                    <th>Aksi</th> 
                </thead> 
                <tbody>
                    @foreach($tags as $tag) 
                        <tr>
                            <td>{{ $tag->tag }} </td> 
                            <td>{{ $tag->keterangan }}</td> 
                            <td width="130">
                                <a class="btn btn-xs btn-warning" href="{{ route('tag-edit', $tag->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-xs btn-danger" href="#" onclick="confirm('Tag yang dihapus tidak dapat dikembalikan!', '{!! route("tag-destroy", $tag->id) !!}')"><i class="fa fa-trash"></i> Hapus</a>
                            </td> 
                        </tr> 
                    @endforeach
                </tbody>
            </table> 
