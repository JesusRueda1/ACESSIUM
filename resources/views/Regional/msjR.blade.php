    <!---msj de registro fallido -->
    @error('tbl_regionals_codigo')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{$message}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror

    @error('tbl_regionals_nombre')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{$message}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror

    @error('tbl_regionals_director')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{$message}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror
