<div class="modal fade" id="formularioCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Tipo de Personal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {{-- formulario --}}
                <form action="{{ route('GuardarTipoP') }}" method="POST" name="form-data"  class="row needs-validation" novalidate>
                    @csrf
                    <div class="col-md-6">
                        <label for="tbl_tipo_personals_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="tbl_tipo_personals_nombre"
                            name="tbl_tipo_personals_nombre" required onkeypress="return SoloLetras(event);" required maxlength="30">
                            <div class="invalid-feedback">Completa los datos</div>
                    </div>

                    {{-- botones --}}
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success col-3">Guardar</button>

                    </div>
                    {{-- fin botones --}}


                </form>
                {{-- fin formulario --}}


            </div>
        </div>
    </div>
</div>
