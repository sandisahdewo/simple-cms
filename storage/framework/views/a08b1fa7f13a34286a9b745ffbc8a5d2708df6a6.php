            <table id="datatable-tag" class="table table-hover table-striped">
                <thead>
                    <th>Tag</th> 
                    <th>Keterangan</th> 
                    <th>Aksi</th> 
                </thead> 
                <tbody>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <tr>
                            <td><?php echo e($tag->tag); ?> </td> 
                            <td><?php echo e($tag->keterangan); ?></td> 
                            <td width="130">
                                <a class="btn btn-xs btn-warning" href="<?php echo e(route('tag-edit', $tag->id)); ?>"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-xs btn-danger" href="#" onclick="confirm('Tag yang dihapus tidak dapat dikembalikan!', '<?php echo route("tag-destroy", $tag->id); ?>')"><i class="fa fa-trash"></i> Hapus</a>
                            </td> 
                        </tr> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table> 
