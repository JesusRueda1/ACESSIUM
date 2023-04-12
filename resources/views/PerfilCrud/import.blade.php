<div class="modal fade" id="importarPerfiles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Identificacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {{-- formulario --}}

                <form action="{{ route('Importar.perfiles') }}" method="POST" name="form-data"
                    class="row needs-validation"  enctype="multipart/form-data"  novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Importar Excel</label>
                        <input class="form-control" type="file" id="file" name="file">
                    </div>
                    (Es necesario asignarle el email de cada usuario a importar)
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
