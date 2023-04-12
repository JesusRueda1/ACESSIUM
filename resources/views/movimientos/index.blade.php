@extends('layouts.auth_app')

@section('title')
    Movimientos
@endsection

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .loader,
        .loader:before,
        .loader:after {
            background: #FFF;
            -webkit-animation: load1 1s infinite ease-in-out;
            animation: load1 1s infinite ease-in-out;
            width: 1em;
            height: 4em;
        }

        .loader:before,
        .loader:after {
            position: absolute;
            top: 0;
            content: '';
        }

        .loader:before {
            left: -1.5em;
        }

        .loader {
            text-indent: -9999em;
            margin: 10% 50%;
            position: relative;
            font-size: 11px;
            -webkit-animation-delay: 0.16s;
            animation-delay: 0.16s;
        }

        .loader:after {
            left: 1.5em;
            -webkit-animation-delay: 0.32s;
            animation-delay: 0.32s;
        }

        @-webkit-keyframes load1 {

            0%,
            80%,
            100% {
                box-shadow: 0 0 #FFF;
                height: 4em;
            }

            40% {
                box-shadow: 0 -2em #ffffff;
                height: 5em;
            }
        }

        @keyframes load1 {

            0%,
            80%,
            100% {
                box-shadow: 0 0 #FFF;
                height: 4em;
            }

            40% {
                box-shadow: 0 -2em #ffffff;
                height: 5em;
            }
        }

        .loader {
            display: none;
        }
    </style>
@endsection

@section('content')
                        @php
                                 $coordinacion = Auth::user()->tbl_perfils->tbl_perfil_tbl_coordinacion_id;
                                $user = DB::table('tbl_coordinacions')->where('id', $coordinacion)->first();  // determina el nombre de la coordinacion
                      @endphp
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-center">Movimientos Coordinacion {{$user->tbl_coordinacions_nombre}}</h1>
            <div class="row">
                <div class="card mb-4 col-12">
                    <div class="card-body">
                        <div class="row col-12" id="form_movimiento">

                            <form name="form-data" class="row needs-validation" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-2">
                                        <video class="p-0" style="position: relative;" id="preview" width="200px"
                                            height="200px"></video>
                                    </div>

                                    <div class="col-10">
                                        <label for="tbl_movimientos_identificacion"
                                            class="col-sm-3 col-form-label">Identificacion</label>
                                        <input type="number" class="form-control" id="tbl_movimientos_identificacion"
                                            name="tbl_movimientos_identificacion" required autofocus />
                                        <input type="text" class="form-control" id="tbl_movimientos_sede"
                                            name="tbl_movimientos_sede" style="display: none;"

                                            @if (Auth::user()->tbl_perfils->tbl_perfil_tbl_sedes_id != null) value="{{ Auth::user()->tbl_perfils->tbl_perfil_tbl_sedes_id }}"@endif
                                            required />
                                        <div class="text-center d-block mx-auto col-4 p-4">
                                            <input type="button" class="btn btn-success" value="Registrar"
                                                onclick="consultar();">
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

                <div class="card mb-4 col-12">
                    <div class="card-body">
                        <div class="row card-body">

                            <div id="contenedor">
                                <div class="loader" id="loader">Loading...</div>
                            </div>

                            @include('movimientos.msj')

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection


@section('script')
    @include('movimientos.script')
@endsection
