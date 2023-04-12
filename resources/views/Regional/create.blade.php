<div class="modal fade" id="formularioCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Regional</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {{-- formulario --}}
                <form class="row needs-validation" action="{{ route('GuardarRegional') }}" method="POST"
                    name="form-data" class="row g-3" novalidate>
                    @csrf
                    <div class="col-md-6">
                        <label for="tbl_regionals_codigo" class="form-label">Codigo</label>
                        <input type="number" class="form-control" id="tbl_regionals_codigo"
                            name="tbl_regionals_codigo" required pattern="[0-9]+">
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-md-6">
                        <label for="tbl_regionals_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="tbl_regionals_nombre" name="tbl_regionals_nombre"
                            required onkeypress="return SoloLetras(event);"  maxlength="40">
                        <div class="invalid-feedback">Completa los datos</div>
                        <br>
                    </div>
                    <div class="col-12">
                        <label for="tbl_regionals_director" class="form-label">Director</label>
                        <input type="text" class="form-control" id="tbl_regionals_director"
                            name="tbl_regionals_director" required onkeypress="return SoloLetras(event);"  maxlength="45">
                        <div class="invalid-feedback">Completa los datos</div>
                        <br>
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
