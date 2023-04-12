<div class="modal fade" id="EditRegional{{ $regional->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Actualizar Información
          </h6>
        </div>


        <form class="" method="POST" action="{{ route('EditarRegional', $regional->id) }}" novalidate>
        @csrf
        @method('PUT')

            <div class="modal-body" id="cont_modal">
                <div class="row">
                    <div class="col-md-6">
                        <label for="tbl_regionals_codigo" class="form-label">Codigo</label>
                        <input type="number" class="form-control" id="tbl_regionals_codigo" name="tbl_regionals_codigo" value="{{$regional->tbl_regionals_codigo}}" required pattern="[0-9]+">
                        <div class="invalid-feedback">Completa los datos</div>
                      </div>
                      <div class="col-md-6">
                        <label for="tbl_regionals_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="tbl_regionals_nombre" name="tbl_regionals_nombre" value="{{$regional->tbl_regionals_nombre}}" required onkeypress="return SoloLetras(event);">
                        <div class="invalid-feedback">Completa los datos</div>
                        <br>
                      </div>
                      <div class="col-12">
                        <label for="tbl_regionals_director" class="form-label">Director</label>
                        <input type="text" class="form-control" id="tbl_regionals_director" name="tbl_regionals_director" value="{{$regional->tbl_regionals_director}}" required onkeypress="return SoloLetras(event);">
                        <div class="invalid-feedback">Completa los datos</div>
                        <br>
                      </div>

                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-secondary col-3" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success col-md-3">Guardar</button>
                </div>
            </div>
         </form>

      </div>
    </div>
  </div>
