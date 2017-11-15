            <div class="form-group">
                <?php echo Form::label('grup', 'Grup *'); ?>

                <?php echo Form::text('grup', isset($grup->grup) ? $grup->grup : '', ['class' => 'form-control']); ?>

            </div> 
            <div class="form-group">
                <?php echo Form::label('keterangan', 'Keterangan'); ?>

                <?php echo Form::textarea('keterangan', isset($grup->keterangan) ? $grup->keterangan : '', ['class' => 'form-control', 'rows' => '3']); ?>

            </div>

