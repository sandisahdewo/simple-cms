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
                <td width="180">
                    <a href="<?php echo e(route('daftarMenu', ['idMenu' => $menu->id])); ?>">Tambah Daftar Menu</a><br>
                    <a href="<?php echo e(route('menu-edit', $menu->id)); ?>">Edit</a>
                    <a href="#" onclick="confirm('Menu yang dihapus tidak bisa dikembalikan!', '<?php echo route("menu-destroy", $menu->id); ?>')">Delete</a>
                </td> 
            </tr> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3" align="center">Tidak data untuk ditampilkan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table> 
