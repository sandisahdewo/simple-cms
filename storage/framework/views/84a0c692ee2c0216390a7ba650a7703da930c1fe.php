            <table id="datatable-grup" class="table table-hover table-striped">
                <thead>
                    <th>Grup</th> 
                    <th>Keterangan</th> 
                    <th>Aksi</th> 
                </thead> 
                <tbody>
                    <?php $__currentLoopData = $grups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <tr>
                            <td><?php echo e($grup->grup); ?> </td> 
                            <td><?php echo e($grup->keterangan); ?></td> 
                            <td width="140">
                                <a class="btn btn-xs btn-warning" href="<?php echo e(route('grup-edit', $grup->id)); ?>"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-xs btn-danger" href="#" onclick="confirm('Grup akan dihapus?', '<?php echo route("grup-destroy", $grup->id); ?>')"><i class="fa fa-trash"></i> Hapus</a>
                            </td> 
                        </tr> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table> 
