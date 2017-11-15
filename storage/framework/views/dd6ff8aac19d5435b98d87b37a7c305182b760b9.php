<table id="datatable-menu" class="table table-hover table-striped">
    <thead>
        <th>Kategori</th> 
        <th>Keterangan</th> 
        <th>Aksi</th> 
    </thead> 
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
            <tr>
                <td><?php echo e($menu->menu); ?></td> 
                <td><?php echo e($menu->keterangan); ?></td> 
                <td width="180" class="text-center">
                    <a class="btn btn-xs btn-primary" href="<?php echo e(route('daftarMenu', ['idMenu' => $menu->id])); ?>"><i class="fa fa-list"></i> Daftar Menu</a><br>
                    <?php if(!$menu->menu == 'Sidebar'): ?>
                        <a class="btn btn-xs btn-warning" href="<?php echo e(route('menu-edit', $menu->id)); ?>"><i class="fa fa-pencil"></i> Edit</a>
                        <a class="btn btn-xs btn-danger" href="#" onclick="confirm('Menu yang dihapus tidak bisa dikembalikan!', '<?php echo route("menu-destroy", $menu->id); ?>')"><i class="fa fa-trash"></i> Hapus</a>
                    <?php endif; ?>
                </td> 
            </tr> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3" align="center">Tidak data untuk ditampilkan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table> 
