<!--Bootstrap5-->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="css/style.css">

<div class="modal fade" id="ModalRegistroU" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#1f5c00;">
                <h5 class="modal-title " style="color: white"> Personal Invitado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {{-- formulario --}}
                <form method="POST" {{-- action="{{ route('') }} --}}">
                    @csrf
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Documento</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select><br>
                    <div class="form-floating mb-3">
                        <input type="namee" class="form-control" id="floatingInput" placeholder="Identificación">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="namee" class="form-control" id="floatingInput" placeholder="Nombres">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="Apellidos">
                    </div>


                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="Email">

                    </div><br>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">

                    </div><br>
                    <div class=" d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>

                </form>
                {{-- fin formulario --}}


            </div>
        </div>
    </div>
</div>

<!--Bootstrap5-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
