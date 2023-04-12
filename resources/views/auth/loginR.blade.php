<!--Modal Administrador-->
<div class="modal fade" id="ModalAdmi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"style="background: #1f5c00;"">
                <h5 class="modal-title " style="color: white">Acceder como Administrador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {{-- formulario --}}
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-floating mb-3">

                        <input type="wmail" class="form-control" placeholder="{{ __('email') }}" required
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <br>
                    <div class="form-floating mb-3">
                        <input type="password" id="input" placeholder="{{ __('password') }}"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div><br>


                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary d-block mx-auto">
                            {{ __('Ingresar') }}
                        </button>
                        <br>

                    </div>

                    <div class="form-group d-md-flex">


                    </div>
                </form>
                {{-- fin formulario --}}


            </div>
        </div>
    </div>
</div>
