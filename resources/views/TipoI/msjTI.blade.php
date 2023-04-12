    <!---msj de registro fallido -->
    @error('tbl_tipo_identificacions_nombre')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{$message}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror
