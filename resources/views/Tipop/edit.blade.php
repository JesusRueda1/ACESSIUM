<div class="modal fade" id="EditTipoP{{ $tp->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" >
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Actualizar Información
          </h6>
        </div>


        <form method="POST" action="{{ route('EditarTipoP', $tp->id) }}">
        @csrf
        @method('PUT')

            <div class="modal-body" id="cont_modal">
                <div class="row">
                    <div class="col-md-12">
                        <label for="tbl_tipo_personals_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="tbl_tipo_personals_nombre" name="tbl_tipo_personals_nombre" value="{{$tp->tbl_tipo_personals_nombre}}" required onkeypress="return SoloLetras(event);">
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
