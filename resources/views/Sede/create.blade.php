<div class="modal fade" id="formularioCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Sede</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {{-- formulario --}}
                <form action="{{ route('GuardarSede') }}" method="POST" name="form-data" class="row needs-validation"
                    novalidate>
                    @csrf
                    <div class="col-md-6">
                        <label for="tbl_sedes_codigo" class="form-label">Codigo</label>
                        <input type="number" class="form-control" id="tbl_sedes_codigo" name="tbl_sedes_codigo"
                            required pattern="[0-9]+">
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-md-6">
                        <label for="tbl_sedes_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="tbl_sedes_nombre" name="tbl_sedes_nombre" required
                            onkeypress="return SoloLetras(event);" maxlength="40">
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-md-6">
                        <label for="tbl_sedes_ciudad" class="form-label">Ciudad</label>
                        <input type="text" class="form-control" id="tbl_sedes_ciudad" name="tbl_sedes_ciudad" required
                            onkeypress="return SoloLetras(event);" maxlength="30">
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-md-6">
                        <label for="tbl_sedes_direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="tbl_sedes_direccion" name="tbl_sedes_direccion"
                            required maxlength="40">
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-12">
                        <label for="tbl_sedes_tbl_coordinacions_id" class="form-label">Coordinacion</label>
                        <select name="tbl_sedes_tbl_coordinacions_id" id="tbl_sedes_tbl_coordinacions_id"
                            class="form-select" aria-label="Default select example" required>
                            <option value=""></option>
                            @foreach ($coordinaciones as $r)
                                <option value="{{ $r->id }}">{{ $r->tbl_coordinacions_nombre }}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <div class="col-12">
                        <label for="tbl_sedes_tbl_centros_id" class="form-label">Centro</label>
                        <select name="tbl_sedes_tbl_centros_id" id="tbl_sedes_tbl_centros_id"
                            class="form-select" aria-label="Default select example" required>
                            <option value=""></option>
                            @foreach ($centros as $c)
                                <option value="{{ $c->id }}">{{ $c->tbl_centros_nombre }}</option>
                            @endforeach
                        </select><br>
                    </div>

                    {{-- botones --}}
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success col-3">Guardar</button>

                        {{-- fin botones --}}


                </form>
                {{-- fin formulario --}}


            </div>
        </div>
    </div>
</div>
