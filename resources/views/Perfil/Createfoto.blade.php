<div class="modal fade" id="formularioCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="imgcontainer">
                   
                    <img src="img/sin_foto.jpg" alt="Avatar" class="avatar">
                  
                </div>
                <form class="row needs-validation" action="{{ route('GuardarFoto') }}" method="POST" name="form-data"
                    class="row g-3" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="col-12">
                        <label for="path" class="form-label">Foto</label>
                        
                        <div class="invalid-feedback">Completa los datos</div>
                        <br>
                    </div>
                    <div class="col-md-6" style="display: none;">
                       
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success col-3">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
