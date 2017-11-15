            <table id="datatable-user" class="table table-hover table-striped">
                <thead>
                    <th>Username</th> 
                    <th>Nama Profil</th> 
                    <th>Grup</th> 
                    <th>Login Terakhir</th> 
                    <th>Aksi</th> 
                </thead> 
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <tr>
                            <td><?php echo e($user->username); ?> </td> 
                            <td><?php echo e($user->nama); ?></td> 
                            <td><?php echo e($user->grup->grup); ?></td> 
                            <td><?php echo e($user->terakhir_login); ?></td> 
                            <td width="130">
                                <a class="btn btn-xs btn-warning" href="<?php echo e(route('user-edit', $user->id)); ?>"><i class="fa fa-pencil"></i> Edit</a>
                                <a class="btn btn-xs btn-danger" href="#" onclick="confirmDelete('Grup', '<?php echo route("user-destroy", $user->id); ?>')"><i class="fa fa-trash"></i> Hapus</a>
                            </td> 
                        </tr> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table> 
