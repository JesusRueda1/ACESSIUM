@extends('layouts.auth_app')

@section('title', 'Carnet')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/carnet.css') }}">
    <style>

    </style>
@endsection

@php
use App\Models\tbl_perfil;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

$email =Auth::user()->email;
        $user = User::where('email', '=', $email)->firstOrFail();
        $name = $user->name;
        $perfil = tbl_perfil::where('tbl_perfil_nombres', '=', $name)->firstOrFail();
        $nombre = $perfil->tbl_perfil_nombres;
        $apellido = $perfil->tbl_perfil_apellidos;
        $celular = $perfil->tbl_perfil_celular;
        $tipodocumento = $perfil->tbl_tipo_identificacions;
        $documento = $perfil->tbl_perfil_idenficacion;
        $rh = $perfil->tbl_perfil_RH;
        $centro = $perfil->tbl_centros;
        $foto = $perfil->tbl_imagens;
        $rol = $perfil->tbl_tipo_personals->tbl_tipo_personals_nombre;
@endphp
@section('content')

    <main>

        <div class="container">
            <div class="row" style="margin:2%;">

                <div class="row">
                    <div class="col-6 padding">
                        <div class="row">
                            <img id="logoCarnet" src="/img/fondo_sena.jpeg" alt="Logo del SENA verde">
                        </div>
                        <div class="row">


                                <h3>{{ $rol }}</h3>


                        </div>
                    </div>

                    <div class="col-6 padding containerfotocarnet">
                        {{-- para que salgan las imagenes ejecutar php artisan storage:link --}}
                        @if (  $foto != null)
                            <img id="FotoCarnet" src="/images/{{$foto->path }}"
                                alt="">
                        @else
                            <img id="FotoCarnet" src="/img/sin_foto.jpg" alt="">
                        @endif
                    </div>
                    <div class="row">
                        <hr size=10 style="color:#39A900">
                    </div>




                    <div class="row">
                      {{--   @if (Auth::User()->tbl_perfils->tbl_perfil_nombres != null && Auth::User()->tbl_perfils->tbl_perfil_apellidos != null)
                            <h1 style="color: #39A900;">{{$email}}
                                {{ Auth::User()->tbl_perfils->tbl_perfil_apellidos }}</h1>
                        @else
                            <h1>No tiene nombre ni apellidos</h1>
                        @endif --}}
                        <h1 style="color: #39A900;">{{$nombre}} {{$apellido}}


                    </div>




                    <div class="row">
                        @if ($tipodocumento != null)
                            <h5>{{ $tipodocumento->tbl_tipo_identificacions_nombre }}
                                - {{ $documento }}</h5>
                        @else
                            <h5>No tiene documento</h5>
                        @endif

                        @if ($rh != null)
                            <h4>RH: {{ $rh }}</h4>
                        @else
                            <h4>No tiene RH</h4>
                        @endif

                        {!! QrCode::size(300)->generate($documento) !!}

                    </div>
                </div>

                <div class="col-xl-12">
                    <hr size=10 style="color:#39A900" width="30%">
                </div>

                <div class="col-xl-12">
                    @if ( $centro->tbl_regionals != null)
                        <h2>{{ $centro->tbl_regionals->tbl_regionals_nombre }}</h2>
                    @else
                        <h2>No hay regional asociada</h2>
                    @endif

                    @if ( $centro != null)
                        <h3 style="color:#39A900">{{  $centro->tbl_centros_nombre }}</h3>
                    @else
                        <h3>No tiene un centro asignado</h3>
                    @endif

                </div>

            </div>
        </div>

    </main>
@endsection
