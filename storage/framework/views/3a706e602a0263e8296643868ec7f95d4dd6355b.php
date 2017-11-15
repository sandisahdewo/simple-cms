<table id="datatable-kategori" class="table table-hover table-striped">
    <?php if(!empty($induk)): ?>
        <a href="<?php echo e(route('daftarMenu', [request()->segment(3), 'parent_id' => isset($induk->parent_id) ? $induk->parent_id : ''])); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali ke parent</a>
        <div class="clearfix"></div>
    <?php elseif(request()->get('parent_id') !== null && empty($induk->parent_id) !== null): ?>
        <a href="<?php echo e(route('daftarMenu', [request()->segment(3)])); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali ke awal</a>
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
                <td width="180">
                    <a href="<?php echo e(route('daftarMenu', request()->segment(3).'?parent_id='.$daftarMenu->id)); ?>">Lihat & Tambah Children</a>
                    <a href="<?php echo e(route('daftarMenu-edit', [request()->segment(3), $daftarMenu->id.'?parent_id='.$parent_id])); ?>">Edit</a>
                    <a href="#" onclick="confirm('Daftar Menu yang dihapus tidak bisa dikembalikan!', '<?php echo route("daftarMenu-destroy", [request()->segment(3), $daftarMenu->id]); ?>')">Delete</a>
                </td> 
            </tr> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3" align="center">Tidak mempunyai children.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table> 
