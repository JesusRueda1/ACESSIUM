<div class="modal fade" id="EditContraseña" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Actualizar Contraseña
                </h6>
            </div>
            <form class="" method="POST" action="{{ route('UpdateContraseña', Auth::user()->id) }}" novalidate>
                @csrf
                @method('PUT')

                <div class="modal-body" id="cont_modal">
                    <div class="row">

                        <input type="email" class="form-control" style="display: none;" id="name" name="name"
                            value="{{ Auth::user()->name }}" required>

                        <div class="col-lg-12 col-sm-12">
                            <label for="email" class="form-label">Correo *</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ Auth::user()->email }}" required>
                                <br>
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <label for="password" class="form-label">Confirmar</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <br>
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <label for="confirm-password" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="confirm-password" name="confirm-password">
                            <br>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-success col-md-3">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
