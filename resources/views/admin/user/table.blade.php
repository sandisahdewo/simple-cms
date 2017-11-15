            <table id="datatable-user" class="table table-hover table-striped">
                <thead>
                    <th>Username</th> 
                    <th>Nama Profil</th> 
                    <th>Grup</th> 
                    <th>Login Terakhir</th> 
                    <th>Aksi</th> 
                </thead> 
                <tbody>
                    @foreach($users as $user) 
                        <tr>
                            <td>{{ $user->username }} </td> 
                            <td>{{ $user->nama }}</td> 
                            <td>{{ $user->grup->grup }}</td> 
                            <td>{{ $user->terakhir_login }}</td> 
                            <td width="130">
                                <a class="btn btn-xs btn-warning" href="{{ route('user-edit', $user->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-xs btn-danger" href="#" onclick="confirmDelete('Grup', '{!! route("user-destroy", $user->id) !!}')"><i class="fa fa-trash"></i> Hapus</a>
                            </td> 
                        </tr> 
                    @endforeach
                </tbody>
            </table> 
