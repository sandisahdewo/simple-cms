            {{-- {{ Form::hidden('parent_id', request()->get('parent_id')) }} --}}
            <div class="form-group">
                {!! Form::label('menu', 'Menu *') !!}
                {!! Form::text('menu', isset($menu->menu) ? $menu->menu : '', ['onkeyup' => 'setSlug()', 'class' => 'form-control']) !!}
            </div> 
            <div class="form-group">
                {!! Form::label('keterangan', 'Keterangan') !!}
                {!! Form::textarea('keterangan', isset($menu->keterangan) ? $menu->keterangan : '', ['class' => 'form-control', 'rows' => '3']) !!}
            </div>
