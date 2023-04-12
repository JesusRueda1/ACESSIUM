<div class="modal fade" id="formularioCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Programa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {{-- formulario --}}
                <form action="{{ route('GuardarPrograma') }}" method="POST" name="form-data" class="row needs-validation" novalidate>
                    @csrf
                    <div class="col-md-12">
                        <label for="tbl_programas_codigo" class="form-label">Codigo</label>
                        <input type="number" class="form-control" id="tbl_programas_codigo"
                            name="tbl_programas_codigo" required pattern="[0-9]+" required max="999999999" min="1">
                    </div>
                    <div class="col-md-12">
                        <label for="tbl_programas_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="tbl_programas_nombre" name="tbl_programas_nombre"
                            required onkeypress="return SoloLetras(event);" required maxlength="100" >
                    </div>
                    <div class="col-md-12">
                        <label for="tbl_programas_version" class="form-label">Version</label>
                        <input type="text" class="form-control" id="tbl_programas_version"
                            name="tbl_programas_version" required> <br>
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
