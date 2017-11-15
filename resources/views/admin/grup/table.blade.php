            <table id="datatable-grup" class="table table-hover table-striped">
                <thead>
                    <th>Grup</th> 
                    <th>Keterangan</th> 
                    <th>Aksi</th> 
                </thead> 
                <tbody>
                    @foreach($grups as $grup) 
                        <tr>
                            <td>{{ $grup->grup }} </td> 
                            <td>{{ $grup->keterangan }}</td> 
                            <td width="140">
                                <a class="btn btn-xs btn-warning" href="{{ route('grup-edit', $grup->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-xs btn-danger" href="#" onclick="confirm('Grup akan dihapus?', '{!! route("grup-destroy", $grup->id) !!}')"><i class="fa fa-trash"></i> Hapus</a>
                            </td> 
                        </tr> 
                    @endforeach
                </tbody>
            </table> 
