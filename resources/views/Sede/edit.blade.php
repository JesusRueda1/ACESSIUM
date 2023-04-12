<div class="modal fade" id="EditSede{{ $sede->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Actualizar Información
          </h6>
        </div>


        <form method="POST" action="{{ route('EditarSede', $sede->id) }}">
        @csrf
        @method('PUT')

            <div class="modal-body" id="cont_modal">
                <div class="row">
                    <div class="col-md-6">
                        <label for="tbl_sedes_codigo" class="form-label">Codigo</label>
                        <input type="number" class="form-control" id="tbl_sedes_codigo" name="tbl_sedes_codigo" value="{{$sede->tbl_sedes_codigo}}" required pattern="[0-9]+">
                      </div>
                      <div class="col-md-6">
                        <label for="tbl_sedes_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="tbl_sedes_nombre" name="tbl_sedes_nombre" value="{{$sede->tbl_sedes_nombre}}" required onkeypress="return SoloLetras(event);">
                      </div>
                      <div class="col-md-6">
                        <label for="tbl_sedes_ciudad" class="form-label">Ciudad</label>
                        <input type="text" class="form-control" id="tbl_sedes_ciudad" name="tbl_sedes_ciudad" required
                            onkeypress="return SoloLetras(event);" value="{{$sede->tbl_sedes_ciudad}}">
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-md-6">
                        <label for="tbl_sedes_direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="tbl_sedes_direccion" name="tbl_sedes_direccion"
                            required value="{{$sede->tbl_sedes_direccion}}">
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                      <div class="col-12">
                          <label for="tbl_sedes_tbl_coordinacions_id" class="form-label">Coordinacion</label>
                          <select name="tbl_sedes_tbl_coordinacions_id" id="tbl_sedes_tbl_coordinacions_id" class="form-select" aria-label="Default select example" required>
                              <option value="{{$sede->tbl_coordinacions->id}}">{{$sede->tbl_coordinacions->tbl_coordinacions_nombre}}</option>
                              @foreach ($coordinaciones as $r)
                                  <option value="{{$r->id}}">{{$r->tbl_coordinacions_nombre}}</option>
                              @endforeach
                            </select>
                      </div>
                      <div class="col-12">
                        <label for="tbl_sedes_tbl_centros_id" class="form-label">Centro</label>
                        <select name="tbl_sedes_tbl_centros_id" id="tbl_sedes_tbl_centros_id"
                            class="form-select" aria-label="Default select example" required>
                            <option value="{{$sede->tbl_centros->id}}">{{$sede->tbl_centros->tbl_centros_nombre}}</option>
                            @foreach ($centros as $c)
                                <option value="{{ $c->id }}">{{ $c->tbl_centros_nombre }}</option>
                            @endforeach
                        </select><br>
                    </div>

                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-secondary col-3" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success col-3">Guardar</button>
                </div>
            </div>
         </form>

      </div>
    </div>
  </div>
