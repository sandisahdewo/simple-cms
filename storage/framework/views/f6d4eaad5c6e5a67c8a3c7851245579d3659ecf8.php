<table id="datatable-kategori" class="table table-hover table-striped">
    <?php if(!empty($backButtonControll)): ?>
        <a href="<?php echo e(route('kategori', ['parent_id' => isset($backButtonControll->parent_id) ? $backButtonControll->parent_id : ''])); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
        <div class="clearfix"></div>
    <?php endif; ?>
    <thead>
        <th>Kategori</th> 
        <th>Keterangan</th> 
        <th>Aksi</th> 
    </thead> 
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
            <tr>
                <td><?php echo e($kategori->kategori); ?></td> 
                <td><?php echo e($kategori->keterangan); ?></td> 
                <td width="160" class="text-center">
                    <a class="btn btn-xs btn-primary" href="<?php echo e(route('kategori', 'parent_id='.$kategori->id)); ?>"><i class="fa fa-indent"></i> Sub-Kategori</a>
                    <a class="btn btn-xs btn-warning" href="<?php echo e(route('kategori-edit', $kategori->id.'?parent_id='.$parent_id)); ?>"><i class="fa fa-pencil"></i> Edit</a>
                    <a class="btn btn-xs btn-danger" href="#" onclick="confirm('Kategori yang dihapus tidak bisa dikembalikan!', '<?php echo route("kategori-destroy", $kategori->id); ?>')"><i class="fa fa-trash"></i> Hapus</a>
                </td> 
            </tr> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3" align="center">Tidak mempunyai children.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table> 
