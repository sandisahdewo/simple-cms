<table id="datatable-kategori" class="table table-hover table-striped">
    <?php if(!empty($induk)): ?>
        <a href="<?php echo e(route('daftarMenu', ['parent_id' => isset($induk->parent_id) ? $induk->parent_id : ''])); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
        <div class="clearfix"></div>
    <?php elseif(request()->get('parent_id') !== null && empty($induk->parent_id) !== null): ?>
        <a href="<?php echo e(route('daftarMenu')); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali ke awal</a>
    <?php endif; ?>
    <thead>
        <th>Daftar Menu</th> 
        <th>Url</th> 
        <th>Aksi</th> 
    </thead> 
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $daftarMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daftarMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
            <tr>
                <td><?php echo e($daftarMenu->menu); ?></td> 
                <td><?php echo e($daftarMenu->url); ?></td> 
                <td width="140" class="text-center">
                    <?php if(request()->get('parent_id') == null): ?> 
                        <a class="btn btn-xs btn-primary" href="<?php echo e(route('daftarMenu', '?parent_id='.$daftarMenu->id)); ?>"><i class="fa fa-indent"></i> Tambah Sub-Menu</a>
                    <?php endif; ?>
                    <a class="btn btn-xs btn-warning" href="<?php echo e(route('daftarMenu-edit', [$daftarMenu->id.'?parent_id='.$parent_id])); ?>"><i class="fa fa-pencil"></i> Edit</a>
                    <a class="btn btn-xs btn-danger" href="#" onclick="confirm('Daftar Menu yang dihapus tidak bisa dikembalikan!', '<?php echo route("daftarMenu-destroy", [$daftarMenu->id]); ?>')"><i class="fa fa-trash"></i> Hapus</a>
                </td> 
            </tr> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3" align="center">Tidak mempunyai children.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table> 
