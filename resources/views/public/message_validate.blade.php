@if (!empty(session()->has('errorMessage')))
   <div class="alert alert-danger fade in">
        <i class="fa fa-ban"></i>
        {{ session()->get('errorMessage') }}
   </div>
@endif
@if (!empty(session()->has('successMessage')))
   <div class="alert alert-success fade in">
        <i class="fa fa-check"></i>
        {{ session()->get('successMessage') }}
   </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <h4>
            <i class="fa fa-times"></i>
            Form tidak diisi dengan benar!
        </h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif