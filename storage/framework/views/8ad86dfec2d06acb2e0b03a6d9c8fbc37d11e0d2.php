<div class="col-md-8">
    <div class="x_panel">
        <div class="x_title">
            <h2>Tambah Post</h2>
            <div class="clearfix"></div>
            <?php echo $__env->make('admin.post.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Tambah Image</h2>
            <div class="clearfix"></div>
            <div class="x_content">
            </div>
            <div id="post-image" class="post-image">
                <?php if(isset($images) ? $images : ''): ?>
                    <?php  $count_post_images = 0  ?>
                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <?php  $count_post_images++;  ?>                             
                        <div id="post-image-list-<?php echo e($count_post_images); ?>" class="col-md-4 post-image-list">
                            <div class="post-image-image">
                                <img src="<?php echo e($image->url_gambar); ?>" />   
                                <input type="hidden" name="images[<?php echo e($count_post_images); ?>][url_gambar]" value="<?php echo e($image->url_gambar); ?>">
                                <input type="hidden" name="images[<?php echo e($count_post_images); ?>][keterangan]" value="<?php echo e($image->keterangan); ?>" id="post-image-list-caption-<?php echo e($count_post_images); ?>">
                                <input type="hidden" name="images[<?php echo e($count_post_images); ?>][link]" value="<?php echo e($image->link); ?>" id="post-image-list-link-<?php echo e($count_post_images); ?>">
                                <input type="hidden" name="images[<?php echo e($count_post_images); ?>][deskripsi]" value="<?php echo e($image->deskripsi); ?>" id="post-image-list-description-<?php echo e($count_post_images); ?>">
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm" onclick="edit_post_image(<?php echo e($count_post_images); ?>)"><i class="fa fa-pencil"></i></button>
                                <button type="button" class="btn btn-default btn-sm" onclick="delete_post_image(<?php echo e($count_post_images); ?>)"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>                                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="post-image-add">
                    <a href="javascript:void(0)" onclick="browse_post_image()"><i class="fa fa-plus-circle"></i></a>
                    <input type="hidden" id="image-url-add">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Post</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="form-group">
                <?php echo Form::label('tanggal_posting', 'Tanggal Posting'); ?>

                <?php echo Form::text('tanggal_posting', isset($post->tanggal_posting) ? $post->tanggal_posting : '', ['class' => 'form-control tanggal']); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('status', 'Status'); ?>

                <?php echo Form::select('status', ['draft' => 'Draft', 'publish' => 'Publish'], isset($post->status) ? $post->status : '', ['class' => 'form-control']); ?>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"> </i> Simpan</button>
                <a href="<?php echo e(route('post')); ?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
            </div>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Jenis Post</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="form-group">
                <?php if(!empty($post)): ?>
                    <?php echo $__env->make('admin.post.formJenisEdit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php else: ?>
                    <?php echo $__env->make('admin.post.formJenis', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Format Post</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="form-group">
                <?php echo Form::hidden('format', 'image'); ?>

                <div class="btn-group-vertical btn-block">
                    <a href="#" onclick="confirm('Jika mengganti format maka data yang di masukkan akan hilang.', '?format=standart')" class="btn btn-primary"><i class="fa fa-thumb-tack"></i> Standard</a>
                    <a href="#" onclick="confirm('Jika mengganti format maka data yang di masukkan akan hilang.', '?format=page')" class="btn btn-primary"><i class="fa fa-pencil"></i> Page</a>
                    <a href="#" onclick="confirm('Jika mengganti format maka data yang di masukkan akan hilang.', '?format=image')" class="btn btn-primary active"><i class="fa fa-photo"></i> Image</a>
                </div>
            </div>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Kategori</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="form-group">
                <div class="btn-group-vertical btn-block" data-toggle="buttons">
                    <?php $__empty_1 = true; $__currentLoopData = treeData($treeKategori); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php echo str_repeat('&nbsp;&nbsp;&nbsp;', $kategori->level) . Form::checkbox('id_kategori['.$kategori->id.']', $kategori->id) . ' '. $kategori->kategori; ?><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p>Tidak ada kategori untuk ditampilkan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Tag</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="form-group">
                <div class="btn-group-vertical btn-block" data-toggle="buttons">
                    <?php echo Form::select('id_tag[]', $tag, null, ['class' => 'form-control select2', 'multiple' => 'multiple']); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Gambar Post</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="form-group">
                <?php echo Form::hidden('gambar', null, ['id' => 'gambar']); ?>

                <img src="<?php echo e(isset($post->gambar) ? $post->gambar : asset('images/no_image.jpg')); ?>" id="img-preview" class="img-responsive">
                <div class="text-center" style="margin-top:20px;">
                    <button type="button" class="btn btn-default btn-sm text-center" onclick="browse_main_image()"><i class="fa fa-folder-open"></i> Browse</button>
                    <button type="button" class="btn btn-danger btn-sm text-center" onclick="clear_main_image()"><i class="fa fa-times"></i> Clear</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="filemanager" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">File Manager</h4>
            </div>
            <div class="modal-body"  style="padding: 0px;">
                <iframe name="filemanager" width="100%" height="500" style="border: 0px;" src="<?php echo e(asset('vendors/responsive_filemanager/filemanager/dialog.php?type=0&field_id=gambar')); ?>"></iframe>
            </div>
        </div>
    </div>
</div>

<div id="form-post-image" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Data Image</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="post-image-id">
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" id="post-image-caption" class="form-control">
                </div>                
                <div class="form-group">
                    <label>Link</label>
                    <input type="text" id="post-image-link" class="form-control">
                </div>                
                <div class="form-group">   
                    <label>Deskripsi</label>                 
                    <textarea id="post-image-description" class="form-control"></textarea>
                </div>                
            </div>      
            <div class="modal-footer">
                <button type="button" id="post-image-save" class="btn btn-success" onclick="save_post_image()"><i class="fa fa-check"></i> Simpan</button>
                <button type="button" id="post-image-save" class="btn btn-default" data-dismiss="modal"><i class="fa fa-reply"></i> Batal</button>
            </div>
        </div>
    </div>
</div>