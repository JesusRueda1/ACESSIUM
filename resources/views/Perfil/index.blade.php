@extends('layouts.auth_app')

@section('title')
    Perfil
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
@endsection

@php
    use App\Models\tbl_perfil;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;

    $email = Auth::user()->email;
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
    $rolcodigo = $perfil->tbl_tipo_personals->id;
    $rolid = $perfil->tbl_perfil_tbl_tipo_personals_id;
    $direccion = $perfil->tbl_perfil_direccion;
    $ciudadresidencia = $perfil->tbl_perfil_ciudad_residencia;
    $estadocivil = $perfil->tbl_perfil_estado_civil;
    $ficha = $perfil->tbl_perfil_tbl_fichas_id;
    $grupo = $perfil->tbl_fichas->tbl_fichas_grupo;
    $codigo = $perfil->tbl_fichas->tbl_fichas_codigo;
    $programanombre = $perfil->tbl_fichas->tbl_programas->tbl_programas_nombre;
    $regional = $perfil->tbl_centros->tbl_centros_tbl_regionals_id;
    $regionalnombre = $perfil->tbl_centros->tbl_regionals->tbl_regionals_nombre;
    $estado = $perfil->tbl_perfil_estado;
    $perfilid = $perfil->tbl_perfil_id;
    $ide = $perfil->id;
    $vacuna = $perfil->tbl_perfil_vacuna;
    $sexo = $perfil->tbl_perfil_sexo;
    $centrocodigo = $perfil->tbl_centros->id;
    $centroid= $perfil->tbl_perfil_tbl_centros_id;
@endphp

@section('content')
    <main>

        <br><b></b><br><b><br></b>

        <div class="container-fluid px-4" style="">
            <div class="container">
                <div class="card mb-4 shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="conteni">
                        @if ($foto != null)
                            <img id="FotoCarnet" class=" avatar" src="/images/{{ $foto->path }}" alt=""
                                style="box-shadow: 0 0 12px #bdbcba;">
                        @else
                            <img id="FotoCarnet" class=" avatar" src="/img/sin_foto.jpg" alt=""
                                style="box-shadow: 0 0 12px #bdbcba;">
                        @endif
                        
                    </div><br><br><br>
                    <div class="row card-body" style="color:#1f5c00;">
                        <div class="col-lg-6 col-md-12" >
                                                    <label for="" class="form-label">Tipo de documento</label>
                                                        <input type="text" class="  perfilinput " id="tbl_aprendiz_identificacion"
                                                            value="@if ($tipodocumento != null) {{ $tipodocumento->tbl_tipo_identificacions_nombre }} @endif"
                                                            readonly>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="validationCustom02" class="form-label">Nº de identificación</label>
                                                        <input type="text" class="  perfilinput  " id="validationCustom02"
                                                            value="@if ($documento != null) {{ $documento }} @endif"
                                                            readonly>
                                                    </div><br>
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="validationCustom01" class="form-label">Nombres</label>
                                                        <input type="text" class="  perfilinput  " id="validationCustom01"
                                                            value="@if ($nombre != null) {{ $nombre }} @endif"
                                                            autocomplete readonly>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="validationCustom02" class="form-label">Apellidos</label>
                                                        <input type="text" class="  perfilinput  " id="validationCustom02"
                                                            value="@if ($apellido != null) {{ $apellido }} @endif"
                                                            readonly>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="" class="form-label">Correo</label>
                                                        <input type="text" class="  perfilinput  " id="text_1"
                                                            value="@if (Auth::user()->email != null) {{ Auth::user()->email }} @endif" readonly>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="" class="form-label">Celular</label>
                                                        <input type="text" class="  perfilinput  "
                                                            value="@if ($celular != null) {{ $celular }} @endif"
                                                            id="text_2" readonly>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="" class="form-label">Dirección</label>
                                                        <input type="text" class="  perfilinput  " id="text_3"
                                                            value="@if ($direccion != null) {{ $direccion }} @endif"
                                                            readonly>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="" class="form-label">Ciudad de recidencia</label>
                                                        <input type="text" class="  perfilinput  " id="text_3"
                                                            value="@if ($ciudadresidencia != null) {{ $ciudadresidencia }} @endif"
                                                            readonly>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="" class="form-label">Grupo Sanguineo</label>
                                                        <input type="text" class="  perfilinput  " id="text_3"
                                                            value="@if ($rh != null) {{ $rh }} @endif"
                                                            readonly>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="" class="form-label">Estado Civil</label>
                                                        <input type="text" class="  perfilinput  " id="text_3"
                                                            value="@if ($estadocivil != null) {{ $estadocivil }} @endif"
                                                            readonly>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="" class="form-label">T. de personal</label>
                                                        <input type="text" class="  perfilinput  " id=""
                                                            value="@if ($rol != null) {{ $rol }} @endif"
                                                            readonly>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="" class="form-label">Centro</label>
                                                        <input type="text" class="  perfilinput  " id=""
                                                            value="@if ($centro->tbl_centros_nombre != null) {{ $centro->tbl_centros_nombre }} @endif"
                                                            readonly>
                                                    </div>
                                                     @if ($ficha != null)
                            <div class="col-lg-6 col-md-12">
                                <label for="" class="form-label">Ficha</label>
                                <input type="text" class="  perfilinput  " id=""
                                    value="{{ $codigo }} - {{ $grupo }}" readonly>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label for="" class="form-label">Programa</label>
                                <input type="text" class="  perfilinput  " id=""
                                    value="{{ $programanombre }}" readonly>
                            </div>
                            @endif

                            <div class="col-lg-6 col-md-12">
                                <label for="" class="form-label">Regional</label>
                                <input type="text" class="  perfilinput  " id="" size="70"
                                    value="@if ($regional != null) {{ $regionalnombre }} @endif" readonly>

                            </div>

                            <div class="col-lg-6 col-md-12">
                                <label for="" class="form-label">Estado</label>
                                <input type="text" class="  perfilinput  " id=""
                                    value="@if ($estado != null) {{ $estado }} @endif" readonly>
                            </div>


                            <div class="text-end">
                                <button type="submit" class="btn btn-success bottom-end" id="btn"
                                    data-bs-toggle="modal" data-bs-target="#EditContraseña">Cambiar contraseña</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Editar Informacion
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Informacion
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('ActualizarPerfil', $ide) }}">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-body" id="cont_modal">
                                                        <div class="row">
                                                            @csrf
                                                            <div class="col-6" style="display: none;">
                                                                <label for="tbl_perfil_tbl_tipo_identificacions_id"
                                                                    class="form-label">Tipo de
                                                                    identificación</label>
                                                                <select name="tbl_perfil_tbl_tipo_identificacions_id"
                                                                    id="tbl_perfil_tbl_tipo_identificacions_id"
                                                                    class="form-select">
                                                                    <option
                                                                        value="{{ $tipodocumento->id }}">
                                                                        {{$tipodocumento->tbl_tipo_identificacions_nombre }}
                                                                    </option>
                                                                    {{-- @foreach ($tipoI as $ti)
                                                                    <option value="{{ $ti->id }}">{{ $ti->tbl_tipo_identificacions_nombre }}
                                                                    </option>
                                                                @endforeach --}}
                                                                </select>
                                                            </div>

                                                            <div class="col-md-6" style="display: none;">
                                                                <label for="tbl_perfil_idenficacion" class="form-label">Nº
                                                                    Identificacion</label>
                                                                <input type="number" class="form-control"
                                                                    id="tbl_perfil_idenficacion"
                                                                    name="tbl_perfil_idenficacion" required
                                                                    pattern="[0-9]+"
                                                                    value="{{ $documento }}">
                                                                <div class="invalid-feedback">Completa los datos</div>
                                                            </div>
                                                            <div class="col-md-12" style="display: none;">
                                                                <label for="tbl_perfil_nombres"
                                                                    class="form-label">Nombres</label>
                                                                <input type="text" class="form-control"
                                                                    id="tbl_perfil_nombres" name="tbl_perfil_nombres"
                                                                    required onkeypress="return SoloLetras(event);"
                                                                    value="{{ $nombre }}">
                                                                <div class="invalid-feedback">Completa los datos</div>
                                                            </div>
                                                            <div class="col-md-12" style="display: none;">
                                                                <label for="tbl_perfil_apellidos"
                                                                    class="form-label">Apellidos</label>
                                                                <input type="text" class="form-control"
                                                                    id="tbl_perfil_apellidos" name="tbl_perfil_apellidos"
                                                                    required onkeypress="return SoloLetras(event);"
                                                                    value="{{ $apellido }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="tbl_perfil_celular"
                                                                    class="form-label">Celular</label>
                                                                <input type="number" class="form-control"
                                                                    id="tbl_perfil_celular" name="tbl_perfil_celular"
                                                                    pattern="[0-9]+"
                                                                    value="{{ $celular }}">
                                                                <div class="invalid-feedback">Completa los datos</div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="tbl_perfil_ciudad_Residencia"
                                                                    class="form-label">Ciudad de Residencia</label>
                                                                <input type="text" class="form-control"
                                                                    id="tbl_perfil_ciudad_Residencia"
                                                                    name="tbl_perfil_ciudad_Residencia"
                                                                    onkeypress="return SoloLetras(event);"
                                                                    value="{{ $ciudadresidencia }}">
                                                                <div class="invalid-feedback">Completa los datos</div><br>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="tbl_perfil_direccion"
                                                                    class="form-label">Dirección</label>
                                                                <input type="text" class="form-control"
                                                                    id="tbl_perfil_direccion" name="tbl_perfil_direccion"
                                                                    value="{{ $direccion }}">
                                                                <div class="valid-feedback"></div><br>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="tbl_perfil_vacuna" class="form-label">Vacuna
                                                                    contra covid</label>
                                                                <select name="tbl_perfil_vacuna" id="tbl_perfil_vacuna"
                                                                    class="form-select"
                                                                    aria-label="Default select example">
                                                                    <option
                                                                        value="{{ $vacuna }}">
                                                                        {{ $vacuna }}
                                                                    </option>
                                                                    <option value="Si">Si</option>
                                                                    <option value="No">No</option>
                                                                </select><br>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="tbl_perfil_RH" class="form-label">RH</label>
                                                                <select name="tbl_perfil_RH" id="tbl_perfil_RH"
                                                                    class="form-select"
                                                                    aria-label="Default select example">
                                                                    <option
                                                                        value="{{ $rh }}">
                                                                        {{ $rh }}
                                                                    </option>
                                                                    <option value="A+">A+</option>
                                                                    <option value="A-">A-</option>
                                                                    <option value="B+">B+</option>
                                                                    <option value="B-">B-</option>
                                                                    <option value="AB+">AB+</option>
                                                                    <option value="AB-">AB-</option>
                                                                    <option value="O+">O+</option>
                                                                    <option value="O-">O-</option>
                                                                </select><br>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="tbl_perfil_Estado_civil"
                                                                    class="form-label">Estado Civil</label>
                                                                <select name="tbl_perfil_Estado_civil"
                                                                    id="tbl_perfil_Estado_civil" class="form-select"
                                                                    aria-label="Default select example">
                                                                    <option
                                                                        value="{{ $estadocivil }}">
                                                                        {{ $estadocivil }}
                                                                    </option>
                                                                    <option value="Soltero/a">Soltero/a</option>
                                                                    <option value="Casado/a">Casado/a</option>
                                                                    <option value="Union libre">Union Libre</option>
                                                                </select><br>
                                                            </div>
                                                            <div class="col-6" style="display: none;">
                                                                <label for="tbl_perfil_estado"
                                                                    class="form-label">Estado</label>
                                                                <select name="tbl_perfil_estado" id="tbl_perfil_estado"
                                                                    class="form-select"
                                                                    aria-label="Default select example">
                                                                    <option
                                                                        value="{{ $estado }}">
                                                                        {{ $estado }}
                                                                    </option>
                                                                    <option value="Activo">Activo</option>
                                                                    <option value="Inactivo">Inactivo</option>
                                                                    <option value="Bloqueado">Bloqueado</option>
                                                                </select><br>
                                                            </div>
                                                            <div class="col-6" style="display: none;">
                                                                <label for="tbl_perfil_sexo"
                                                                    class="form-label">Sexo</label>
                                                                <select name="tbl_perfil_sexo" id="tbl_perfil_sexo"
                                                                    class="form-select"
                                                                    aria-label="Default select example">
                                                                    <option
                                                                        value="{{ $sexo }}">
                                                                        {{ $sexo }}
                                                                    </option>
                                                                    <option value="Masculino">Masculino</option>
                                                                    <option value="Femenino">Femenino</option>
                                                                    <option value="Prefiero no decirlo">Prefiero no decirlo
                                                                    </option>
                                                                </select><br>
                                                            </div>
                                                            <div class="col-6" style="display: none;">
                                                                <label for="tbl_perfil_tbl_fichas_id"
                                                                    class="form-label">Ficha</label>
                                                                <select name="tbl_perfil_tbl_fichas_id"
                                                                    id="tbl_perfil_tbl_fichas_id" class="form-select"
                                                                    aria-label="Default select example">
                                                                    @if ($ficha)
                                                                        <option
                                                                            value="{{ $ficha }}">
                                                                            {{ $codigo }}
                                                                            -
                                                                            {{ $grupo }}
                                                                        </option>
                                                                    @endif{{--
                                                                @foreach ($fichas as $list2)
                                                                    <option value="{{ $list2->id }}">{{ $list2->tbl_fichas_codigo }} -
                                                                        {{ $list2->tbl_fichas_grupo }}</option>
                                                                @endforeach --}}
                                                                </select><br>
                                                            </div>
                                                            <div class="col-6" style="display: none;">
                                                                <label for="tbl_perfil_tbl_tipo_personals_id"
                                                                    class="form-label">Tipo de
                                                                    Personal</label>
                                                                <select name="tbl_perfil_tbl_tipo_personals_id"
                                                                    id="tbl_perfil_tbl_tipo_personals_id"
                                                                    class="form-select"
                                                                    aria-label="Default select example" required>
                                                                    @if ($rolid != null)
                                                                        <option
                                                                            value="{{ $rolcodigo }}">
                                                                            {{ $rol }}
                                                                        </option>
                                                                    @endif
                                                                    {{-- @foreach ($tipoP as $list3)
                                                                    <option value="{{ $list3->id }}">{{ $list3->tbl_tipo_personals_nombre }}
                                                                    </option>
                                                                @endforeach --}}
                                                                </select>
                                                            </div>
                                                            <div class="col-6" style="display: none;">
                                                                <label for="tbl_perfil_tbl_centros_id"
                                                                    class="form-label">Centros</label>
                                                                <select name="tbl_perfil_tbl_centros_id"
                                                                    id="tbl_perfil_tbl_centros_id" class="form-select"
                                                                    aria-label="Default select example" required>
                                                                    @if ($centroid != null)
                                                                        <option
                                                                            value="{{ $centrocodigo }}">

                                                                            {{ $centro }}
                                                                        </option>
                                                                    @endif
                                                                    {{-- @foreach ($centros as $list)
                                                                    <option value="{{ $list->id }}">{{ $list->tbl_centros_nombre }}</option>
                                                                @endforeach --}}
                                                                </select>
                                                                <br>
                                                            </div>

                                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                                <button type="button" class="btn btn-secondary col-3"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit"
                                                                    class="btn btn-success col-3">Guardar</button>
                                                            </div>
                                                        </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Button trigger modal -->

                        </div>
                    </div>
                </div>
            </div>
    </main>

    @include('Perfil.Createfoto')
    @include('Perfil.editcontrasena')
@endsection
