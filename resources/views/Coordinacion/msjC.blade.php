    <!---msj de registro fallido -->
    @error('tbl_coordinacions_codigo')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{$message}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror

    @error('tbl_coordinacions_nombre')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{$message}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror

    @error('tbl_coordinacions_coordinador')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{$message}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror

    @error('tbl_coordinacions_tbl_centros_id')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{$message}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror
