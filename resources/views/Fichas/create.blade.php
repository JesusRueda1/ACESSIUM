<div class="modal fade" id="formularioCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Programa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {{-- formulario --}}
                <form action="{{ route('GuardarFicha') }}" method="POST" name="form-data" class="row needs-validation" novalidate>
                    @csrf
                    <div class="col-md-12">
                        <label for="tbl_fichas_codigo" class="form-label">Codigo</label>
                        <input type="number" class="form-control" id="tbl_fichas_codigo" name="tbl_fichas_codigo"
                            required pattern="[0-9]+">
                    </div>
                    <div class="col-md-6">
                        <label for="tbl_fichas_grupo" class="form-label">Grupo</label>
                        <input type="text" class="form-control" id="tbl_fichas_grupo" name="tbl_fichas_grupo"
                            required maxlength="20">
                    </div>
                    <div class="col-6">
                        <label for="tbl_fichas_tbl_coordinacions" class="form-label">Coordinacion</label>
                        <select name="tbl_fichas_tbl_coordinacions" id="tbl_fichas_tbl_coordinacions"
                            class="form-select" aria-label="Default select example" required>
                            <option value=""></option>
                            @foreach ($coordinacion as $c)
                                <option value="{{ $c->id }}">{{ $c->tbl_coordinacions_nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="tbl_fichas_tbl_programas_id" class="form-label">Programa</label>
                        <select name="tbl_fichas_tbl_programas_id" id="tbl_fichas_tbl_programas_id"
                            class="form-select" aria-label="Default select example" required>
                            <option value=""></option>
                            @foreach ($programas as $p)
                                <option value="{{ $p->id }}">{{ $p->tbl_programas_version }} -
                                    {{ $p->tbl_programas_nombre }}</option>
                            @endforeach
                        </select><br>
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
