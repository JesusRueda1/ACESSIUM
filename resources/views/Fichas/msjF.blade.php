    <!---msj de registro fallido -->
    @error('tbl_fichas_codigo')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{$message}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror

    @error('tbl_fichas_grupo')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{$message}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror

    @error('tbl_fichas_tbl_coordinacions')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{$message}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror

    @error('tbl_fichas_tbl_programas_id')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{$message}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror

