<div class="modal fade" id="EditFicha{{ $f->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Actualizar Información
          </h6>
        </div>


        <form method="POST" action="{{ route('EditarFicha', $f->id) }}">
        @csrf
        @method('PUT')

            <div class="modal-body" id="cont_modal">
                <div class="row">
                    @csrf

                    <div class="col-md-12">
                        <label for="tbl_fichas_codigo" class="form-label">Codigo</label>
                        <input type="text" class="form-control" id="tbl_fichas_codigo" name="tbl_fichas_codigo" value="{{$f->tbl_fichas_codigo}}" required pattern="[0-9]+">
                        </div>
                        <div class="col-md-6">
                          <label for="tbl_fichas_grupo" class="form-label">Grupo</label>
                          <input type="text" class="form-control" id="tbl_fichas_grupo" name="tbl_fichas_grupo" value="{{$f->tbl_fichas_grupo}}" required>
                        </div>
                        <div class="col-6">
                            <label for="tbl_fichas_tbl_coordinacions" class="form-label">Coordinacion</label>
                            <select name="tbl_fichas_tbl_coordinacions" id="tbl_fichas_tbl_coordinacions" class="form-select" aria-label="Default select example">
                                <option value="{{$f->tbl_coordinacions->id}}">{{$f->tbl_coordinacions->tbl_coordinacions_nombre}}</option>
                                @foreach ($coordinacion as $c)
                                    <option value="{{$c->id}}">{{$c->tbl_coordinacions_nombre}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="col-12">
                            <label for="tbl_fichas_tbl_programas_id" class="form-label">Programa</label>
                            <select name="tbl_fichas_tbl_programas_id" id="tbl_fichas_tbl_programas_id" class="form-select" aria-label="Default select example">
                                <option value="{{$f->tbl_programas->id}}">{{$f->tbl_programas->tbl_programas_nombre}}</option>
                                @foreach ($programas as $p)
                                    <option value="{{$p->id}}">{{$p->tbl_programas_nombre}}</option>
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
