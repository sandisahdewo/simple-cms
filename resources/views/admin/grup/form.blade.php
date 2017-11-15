            <div class="form-group">
                {!! Form::label('grup', 'Grup *') !!}
                {!! Form::text('grup', isset($grup->grup) ? $grup->grup : '', ['class' => 'form-control']) !!}
            </div> 
            <div class="form-group">
                {!! Form::label('keterangan', 'Keterangan') !!}
                {!! Form::textarea('keterangan', isset($grup->keterangan) ? $grup->keterangan : '', ['class' => 'form-control', 'rows' => '3']) !!}
            </div>

