            <div class="form-group">
                <?php echo Form::label('username', 'Username *'); ?>

                <?php echo Form::text('username', isset($user->username) ? $user->username : '', ['class' => 'form-control']); ?>

            </div> 
            <div class="form-group">
                <?php echo Form::label('nama', 'Nama *'); ?>

                <?php echo Form::text('nama', isset($user->nama) ? $user->nama : '', ['class' => 'form-control']); ?>

            </div> 
            <div class="form-group">
                <?php echo Form::label('email', 'Email'); ?>

                <?php echo Form::text('email', isset($user->email) ? $user->email : '', ['class' => 'form-control']); ?>

            </div> 
            <div class="form-group">
                <?php echo Form::label('grup', 'Grup'); ?>

                <?php echo Form::select('id_grup', $lists_grup, isset($user->id_grup) ? $user->id_grup : '', ['class' => 'form-control']); ?>

            </div>
            <?php if(!isset($user)): ?>
            <div class="form-group">
                <?php echo Form::label('password', 'Password *'); ?>

                <?php echo Form::password('password', ['class' => 'form-control']); ?>

            </div> 
            <div class="form-group">
                <?php echo Form::label('password_confirmation', 'Konfirmasi Password *'); ?>

                <?php echo Form::password('password_confirmation', ['class' => 'form-control']); ?>

            </div>
            <?php endif; ?>
