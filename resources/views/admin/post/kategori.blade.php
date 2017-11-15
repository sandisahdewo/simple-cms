<div class="form-group">
    <div class="btn-group-vertical btn-block" data-toggle="buttons">
        @foreach($kategori as $row)
            <input type="checkbox" name="id_kategori" value="{{ $row->id }}"> {{ $row->kategori }}
            <br>
        @endforeach
    </div>
</div>
