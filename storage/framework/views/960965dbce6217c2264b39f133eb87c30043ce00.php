<table id="datatable-komentar" class="table table-hover table-striped">
    <thead>
        <th>Penulis</th> 
        <th>Komentar</th> 
        <th>Type</th> 
        <th>Status</th> 
        <th>Tgl. Komentar</th> 
    </thead> 
    <tbody>
        <?php $__currentLoopData = $komentars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <tr>
                <td>
                    <b><?php echo e($row->nama); ?></b> <!-- <?php echo e(($row->is_admin == 'true')); ?> ? '<label class="label label-danger">Admin</label>' : '' ?><br> -->                                
                        <small class="text-blue">E-mail :  <?php echo e($row->email); ?></small>
                </td>
                <td>
                    <?= $row->komentar ?><br>
                    <?php echo e(Form::open(['route' => ['komentar-reply', $row->id], 'id' => 'reply-'.$row->id, 'style' => 'display:none'])); ?>                               
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="padding: 5px 0px"><?php echo e(Form::textarea('komentar', null, ['class' => 'form-control', 'style' => 'width:100%;height:100px'])); ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 5px 0px ">
                                    <button class="btn btn-success btn-sm"><i class="fa fa-comments"></i> Balas</button>
                                    <button type="button" class="btn btn-default btn-sm" onclick="cancel_reply(<?php echo e($row->id); ?>)"><i class="fa fa-reply"></i> Batal</button>
                                </td>
                            </tr>
                        </table>
                    <?php echo e(Form::close()); ?>

                    <a href="javascript:void(0)" onclick="reply(<?php echo e($row->id); ?>)"><i class="fa fa-reply"></i> Reply</a>
                    |
                    <a href="javascript:void(0)" onclick="confirm('Komentar yang dihapus tidak bisa dikembalikan lagi?', '<?php echo route('komentar-destroy', $row->id); ?>')"><i class="fa fa-trash"></i> Delete</a>
                    |
                    <?php if($row->status == 'wappr') { ?>
                        <a href="javascript:void(0)" onclick="confirm('Komentar yang disetujui akan tampak pada website?', '<?php echo route('komentar-approve', $row->id); ?>')"><i class="fa fa-check"></i> Setujui</a>
                    <?php } else { ?>
                        <a href="javascript:void(0)" onclick="confirm('Komentar yang dibatalkan persetujuanya akan hilang dari website?', '<?php echo route('komentar-cancel_approve',$row->id); ?>')"><i class="fa fa-times"></i> Batalkan Persetujuan</a>
                    <?php } ?>
                </td> 
                <td><?php echo e(ucfirst($row->tipe)); ?> </td> 
                <td><?php echo e(boolean($row->status == 'wappr', 'Menunggu Persetujuan', 'Telah Disetujui')); ?></td> 
                <td><?php echo e(CarbonHumanDate(null, $row->tanggal_komentar)); ?></td> 
            </tr> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table> 
