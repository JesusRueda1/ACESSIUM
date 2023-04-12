<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ACCESUM - @yield('title')</title>
    @yield('head')
    <link rel="shortcut icon" href="img/logoverde.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('css/login.ss') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/loader.css')}}">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="http://code.jquery.com/jquery-1.11.2.min.js" type='text/javascript'></script>
    <script type="text/javascript" src="instascan.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <style>
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

    </style>

    @yield('styles')
</head>

<body class="sb-nav-fixed">
{{--      <div class="container_loader">
        <div class="loader"></div>

    </div> --}}

    @include('layouts.nav')

    <!-- sidebar -->
    <div id="layoutSidenav">

        @include('layouts.sidebar')

        <div id="layoutSidenav_content">
            <main id="">
                @yield('content')
            </main>
            @include('layouts.flooter')
        </div>

    </div>

    @include('layouts.script')
    @yield('script')
</body>

</html>
