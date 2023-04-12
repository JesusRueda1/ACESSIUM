<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="shortcut icon" href="img/logoverde.png" type="image/x-icon">
    <!-- Style -->
    <link rel="stylesheet" href="css/login.css"> 

    <title>ACESSUM</title>
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/risas.css">

    <!--bootstrap5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>

<body>

    <header>
        <div class="p-4" style="background:  #39A900">
            <h1>ACCESUM</h1>
            <br>
            <h2>Sistema de control de acceso a las instalaciones del SENA</h2>
        </div>
    </header>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section"></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-lg-9">

                    <div class="justify-content-center wrap d-xxl-flex">

                        <div class="img" style="background-image: url(img/carnet-12.jpeg);">
                        </div>

                        <div class="login-wrap p-4 p-md-6">


                            <div class="d-flex">

                                <div class="w-100">  
                                    <h3 class="mb-4 text-center" style="color: #39A900">Iniciar Sesión</h3>
                                </div>

                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group mb-1">

                                    <input type="email" class="form-control" placeholder="{{ __('email') }}"
                                        required class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- Uncaught TypeError: Cannot read properties of null (reading 'type') --}}
                                </div><br>
                                <div class="form-group mb-3">

                                    <span class="icon-eye"><i class="fa-regular fa-eye-slash"></i></i></span>
                                    <input type="password" id="password" placeholder="{{ __('password') }}"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">


                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div><br>



                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary d-block mx-auto" >
                                        {{ __('Ingresar') }}
                                    </button>
                                    <br>
                                    @if (Route::has('password.request'))
                                        <a class="btn d-block text-primary22" href="{{ route('password.request') }}">
                                            {{ __('Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif
                                </div>

                                <div class="form-group d-md-flex">


                                </div>
                            </form>
                            <a class="d-block alt22" href=" " data-bs-toggle="modal" data-bs-target="#ModalRegistroU"
                                value>
                                <center>Registro como personal invitado...!</center>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
    <br><br><br>
    <section class="footer">


        <div class=""><br>
            <h2>Redes Socilaes</h2>
            <center>
                <img src="img/arrobasena.png" alt="" hspace="70">

                <a href="https://www.instagram.com/senacomunica/?hl=es-la" target="_blank"><img src="img/instagram.png"
                        alt="" hspace="12"></a>
                <a href="https://es-la.facebook.com/SENAAtlantico/" target="_blank"><img src="img/facebook.png" alt=""
                        hspace="12"></a>
                <a href="https://twitter.com/SENAComunica?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
                    target="_blank"><img src="img/twitter.png" alt="" hspace="12"></a>
                <a href="https://www.youtube.com/user/SENATV?app=desktop" target="_blank"> <img src="img/youtube.png"
                        alt="" hspace="12"></a>



                <img src="img/senaedu.png" alt="" hspace="70">
            </center>
        </div><br>
        <span class="copyright">&copy;2022, SENA de TIC, all rights resrved.

        </span>
    </section>


    @include('auth.registerU')

    @include('auth.loginR')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="js/mains.js"></script>
</body>

</html>

