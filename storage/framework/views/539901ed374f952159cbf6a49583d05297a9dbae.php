            
            <div class="form-group">
                <?php echo Form::label('menu', 'Menu *'); ?>

                <?php echo Form::text('menu', isset($menu->menu) ? $menu->menu : '', ['onkeyup' => 'setSlug()', 'class' => 'form-control']); ?>

            </div> 
            <div class="form-group">
                <?php echo Form::label('keterangan', 'Keterangan'); ?>

                <?php echo Form::textarea('keterangan', isset($menu->keterangan) ? $menu->keterangan : '', ['class' => 'form-control', 'rows' => '3']); ?>

            </div>
