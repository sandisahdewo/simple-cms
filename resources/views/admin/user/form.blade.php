            <div class="form-group">
                {!! Form::label('username', 'Username *') !!}
                {!! Form::text('username', isset($user->username) ? $user->username : '', ['class' => 'form-control']) !!}
            </div> 
            <div class="form-group">
                {!! Form::label('nama', 'Nama *') !!}
                {!! Form::text('nama', isset($user->nama) ? $user->nama : '', ['class' => 'form-control']) !!}
            </div> 
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', isset($user->email) ? $user->email : '', ['class' => 'form-control']) !!}
            </div> 
            <div class="form-group">
                {!! Form::label('grup', 'Grup') !!}
                {!! Form::select('id_grup', $lists_grup, isset($user->id_grup) ? $user->id_grup : '', ['class' => 'form-control']) !!}
            </div>
            @if(!isset($user))
            <div class="form-group">
                {!! Form::label('password', 'Password *') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div> 
            <div class="form-group">
                {!! Form::label('password_confirmation', 'Konfirmasi Password *') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>
            @endif
