<table id="datatable-post" class="table table-hover table-striped">
    <thead>
        <th>Judul</th>                                        
        <th width="200px" class="text-center">Kategori</th>
        <th width="200px" class="text-center">Tag</th>
        <th width="100px" class="text-center">Status</th>
        <th width="150px" class="text-center">Tgl.Post</th>
    </thead> 
    <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <tr>
            <td width="400">
                <b><?php echo e($row->judul); ?></b> by <label class="label label-danger"><?php echo e($row->dibuat_oleh); ?></label><br>
                <small class="text-blue"><?php echo e(url($row->slug)); ?></small><br>
                <a href="<?php echo e(route('post-edit', $row->id)); ?>"><i class="fa fa-edit"></i> Edit</a>
                |
                <a href="javascript:void(0)" onclick="confirm('Postingan yang dihapus tidak bisa dikembalikan lagi?', '<?php echo route('post-delete', $row->id); ?>')"><i class="fa fa-trash"></i> Hapus</a>
                |
                <?php if($row->status == 'draft'): ?>
                <a href="javascript:void(0)" onclick="confirm('Postingan yang sudah diteribitkan akan tampil pada website?', '<?php echo route("post-publish", $row->id); ?>')"><i class="fa fa-check"></i> Publish</a>
                <?php else: ?>
                <a href="javascript:void(0)" onclick="confirm('Postingan yang sudah diubah menjadi draft akan hilang dari website?', '<?php echo route("post-draft", $row->id); ?>')"><i class="fa fa-list"></i> Draft</a>
                <?php endif; ?>
            </td>
            <td>
                <?php $__currentLoopData = $row->kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label class="label label-primary label-tag"><?php echo e($kategori->kategori); ?></label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td>
                <?php $__currentLoopData = $row->tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="label label-primary label-tag"><?php echo e($tag->tag); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td class="text-center"><?php echo e(ucfirst($row->status)); ?></td>
            <td class="text-center"><?php echo e(carbonHumanDate(null, $row->tanggal_posting)); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table> 
