<div class="modal fade" id="formularioCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Centro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {{-- formulario --}}
                <form class="row needs-validation" action="{{ route('GuardarCentro') }}" method="POST" name="form-data"
                    class="row g-3" novalidate>
                    @csrf
                    <div class="col-md-6">
                        <label for="tbl_centros_codigo" class="form-label">Codigo</label>
                        <input type="number" class="form-control" id="tbl_centros_codigo" name="tbl_centros_codigo"
                            required pattern="[0-9]+" >
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-md-6">
                        <label for="tbl_centros_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="tbl_centros_nombre" name="tbl_centros_nombre"
                            required onkeypress="return SoloLetras(event);" maxlength="40">
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-12">
                        <label for="tbl_centros_subdirector" class="form-label">SubDirector</label>
                        <input type="text" class="form-control" id="tbl_centros_subdirector"
                            name="tbl_centros_subdirector"  required onkeypress="return SoloLetras(event);" maxlength="40">
                        <div class="invalid-feedback">Completa los datos</div >
                    </div>
                    <div class="col-12">
                        <label for="tbl_centros_tbl_regionals_id" class="form-label">Regional</label>
                        <select name="tbl_centros_tbl_regionals_id" id="tbl_centros_tbl_regionals_id"
                            class="form-select" aria-label="Default select example" required maxlength="40">
                            <option value=""></option>
                            @foreach ($regional as $r)
                                <option value="{{ $r->id }}">{{ $r->tbl_regionals_nombre }}</option>
                            @endforeach
                        </select>
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
