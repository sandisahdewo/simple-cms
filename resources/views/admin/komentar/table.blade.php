<table id="datatable-komentar" class="table table-hover table-striped">
    <thead>
        <th>Penulis</th> 
        <th>Komentar</th> 
        <th>Type</th> 
        <th>Status</th> 
        <th>Tgl. Komentar</th> 
    </thead> 
    <tbody>
        @foreach($komentars as $row) 
            <tr>
                <td>
                    <b>{{ $row->nama }}</b> <!-- {{ ($row->is_admin == 'true') }} ? '<label class="label label-danger">Admin</label>' : '' ?><br> -->                                
                        <small class="text-blue">E-mail :  {{ $row->email }}</small>
                </td>
                <td>
                    <?= $row->komentar ?><br>
                    {{ Form::open(['route' => ['komentar-reply', $row->id], 'id' => 'reply-'.$row->id, 'style' => 'display:none']) }}                               
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="padding: 5px 0px">{{ Form::textarea('komentar', null, ['class' => 'form-control', 'style' => 'width:100%;height:100px']) }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 5px 0px ">
                                    <button class="btn btn-success btn-sm"><i class="fa fa-comments"></i> Balas</button>
                                    <button type="button" class="btn btn-default btn-sm" onclick="cancel_reply({{ $row->id }})"><i class="fa fa-reply"></i> Batal</button>
                                </td>
                            </tr>
                        </table>
                    {{ Form::close() }}
                    <a href="javascript:void(0)" onclick="reply({{ $row->id }})"><i class="fa fa-reply"></i> Balas</a>
                    |
                    <a href="javascript:void(0)" onclick="confirm('Komentar yang dihapus tidak bisa dikembalikan lagi?', '{!! route('komentar-destroy', $row->id) !!}')"><i class="fa fa-trash"></i> Hapus</a>
                    |
                    <?php if($row->status == 'wappr') { ?>
                        <a href="javascript:void(0)" onclick="confirm('Komentar yang disetujui akan tampak pada website?', '{!! route('komentar-approve', $row->id) !!}')"><i class="fa fa-check"></i> Setujui</a>
                    <?php } else { ?>
                        <a href="javascript:void(0)" onclick="confirm('Komentar yang dibatalkan persetujuanya akan hilang dari website?', '{!! route('komentar-cancel_approve',$row->id) !!}')"><i class="fa fa-times"></i> Batalkan Persetujuan</a>
                    <?php } ?>
                </td> 
                <td>{{ ucfirst($row->tipe) }} </td> 
                <td>{{ boolean($row->status == 'wappr', 'Menunggu Persetujuan', 'Telah Disetujui') }}</td> 
                <td>{{ CarbonHumanDate(null, $row->tanggal_komentar) }}</td> 
            </tr> 
        @endforeach
    </tbody>
</table> 
