<div class="modal fade" id="formularioCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Coordinacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {{-- formulario --}}
                <form class="row needs-validation" action="{{ route('GuardarCoordinacion') }}" method="POST" name="form-data"
                    class="row g-3" novalidate>
                    @csrf
                    <div class="col-md-6">
                        <label for="tbl_coordinacions_codigo" class="form-label">Codigo</label>
                        <input type="number" class="form-control" id="tbl_coordinacions_codigo"
                            name="tbl_coordinacions_codigo" required pattern="[0-9]+">
                            <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-md-6">
                        <label for="tbl_coordinacions_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="tbl_coordinacions_nombre"
                            name="tbl_coordinacions_nombre" required maxlength="40">
                            <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-12" id="divEle" style="display:none;"">
                        <label for="tbl_coordinacions_coordinador" class="form-label" ">Coordinador</label>
                        <input type="text" class="form-control" id="tbl_coordinacions_coordinador"
                            name="tbl_coordinacions_coordinador" required onkeypress="return SoloLetras(event);" maxlength="40">
                            <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-12" >
                        <label for="tbl_coordinacions_tbl_centros_id" class="form-label">Centro</label>
                        <select name="tbl_coordinacions_tbl_centros_id" id="tbl_coordinacions_tbl_centros_id"
                            class="form-select" aria-label="Default select example" onchange="NpCorto();"required>
                            <option value=""></option>
                            @foreach ($centros as $centro){{-- tbl_centros_nombre change --}}
                                <option value="{{ $centro->id }}">{{ $centro->tbl_centros_nombre }}-{{$centro->regional->tbl_regionals_nombre}}</option>
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
<script>
   function NpCorto() {
    var textoNpCorto = $("select#tbl_coordinacions_tbl_centros_id").val();

     if (textoNpCorto == "1") {
            alert('Ingresar la universidad');
            $("#divEle").toggle();
     } else {
            $("#divEle").hide();
        };
};
    </script>
