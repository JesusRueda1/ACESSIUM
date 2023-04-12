<div class="modal fade" id="EditCentro{{ $centro->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Actualizar Información
          </h6>
        </div>


        <form method="POST" action="{{ route('EditarCentro', $centro->id) }}">
        @csrf
        @method('PUT')

            <div class="modal-body" id="cont_modal">
                <div class="row">
                    <div class="col-md-12">
                        <label for="tbl_centros_codigo" class="form-label">Codigo</label>
                        <input type="text" class="form-control" id="tbl_centros_codigo" name="tbl_centros_codigo" value="{{ $centro->tbl_centros_codigo }}" required pattern="[0-9]+">
                    </div>
                    <div class="col-md-12">
                        <label for="tbl_centros_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="tbl_centros_nombre" name="tbl_centros_nombre" value="{{ $centro->tbl_centros_nombre}}" required onkeypress="return SoloLetras(event);">
                    </div>
                    <div class="col-12">
                        <label for="tbl_centros_subdirector" class="form-label">SubDirector</label>
                        <input type="text" class="form-control" id="tbl_centros_subdirector" name="tbl_centros_subdirector" value="{{ $centro->tbl_centros_subdirector}}" onkeypress="return SoloLetras(event);">
                    </div>
                    <div class="col-12">
                          <label for="tbl_centros_tbl_regionals_id" class="form-label">Regional</label>
                          <select name="tbl_centros_tbl_regionals_id" id="tbl_centros_tbl_regionals_id" class="form-select" aria-label="Default select example">
                              <option value="{{$centro->tbl_regionals->id}}">{{$centro->tbl_regionals->tbl_regionals_nombre}}</option>
                              @foreach ($regional as $r)
                                  <option value="{{$r->id}}">{{$r->tbl_regionals_nombre}}</option>
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
