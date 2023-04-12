<div class="modal fade" id="EditCoordinacion{{ $coordinacion->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Actualizar Información
          </h6>
        </div>


        <form method="POST" action="{{ route('EditarCoordinacion', $coordinacion->id) }}">
        @csrf
        @method('PUT')

            <div class="modal-body" id="cont_modal">
                <div class="row">
                    <div class="col-md-6">
                        <label for="tbl_coordinacions_codigo" class="form-label">Codigo</label>
                        <input type="number" class="form-control" id="tbl_coordinacions_codigo" name="tbl_coordinacions_codigo" value="{{$coordinacion->tbl_coordinacions_codigo}}" required>
                      </div>
                      <div class="col-md-6">
                        <label for="tbl_coordinacions_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="tbl_coordinacions_nombre" name="tbl_coordinacions_nombre" value="{{$coordinacion->tbl_coordinacions_nombre}}" required>
                      </div>
                      <div class="col-12">
                        <label for="tbl_coordinacions_coordinador" class="form-label">Coordinador</label>
                        <input type="text" class="form-control" id="tbl_coordinacions_coordinador" name="tbl_coordinacions_coordinador" value="{{$coordinacion->tbl_coordinacions_coordinador}}" onkeypress="return SoloLetras(event);">
                      </div>
                      <div class="col-12">
                          <label for="tbl_coordinacions_tbl_centros_id" class="form-label">Centro</label>
                          <select name="tbl_coordinacions_tbl_centros_id" id="tbl_coordinacions_tbl_centros_id" class="form-select" aria-label="Default select example" required>
                              <option value="{{$coordinacion->tbl_centros->id}}">{{$coordinacion->tbl_centros->tbl_centros_nombre}}</option>
                              @foreach ($centros as $centro)
                              <option value="{{ $centro->id }}">{{ $centro->tbl_centros_nombre }}-{{$centro->regional->tbl_regionals_nombre}}</option>
                              @endforeach
                            </select>
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
