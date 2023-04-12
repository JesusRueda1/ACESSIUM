@extends('layouts.auth_app')

@section('title')
    Perfil
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Perfil</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <a>Cantidad: {{ $total }}</a>
                    <form class="d-flex">
                        <button type="button" class="btn btn-success rounded-pill m-2" data-bs-toggle="modal"
                            data-bs-target="#formularioCrear"><i class="fas fa-plus"></i></button>
                    </form>
                    <div class="text-end">
                        <a class="btn btn-success buttom-end rounded-pill m-2" href="/formatos/Usuarios para importar (5).xlsx" download="formato_perfiles.xlsx">Descargar formato </a>

                        <button type="submit" class="btn btn-success bottom-end rounded-pill m-2" id="btn" data-bs-toggle="modal"
                            data-bs-target="#importarPerfiles">Importar Perfiles</button>

                            <a class="btn btn-success rounded-pill m-2" href="{{ route('Perfiles/Exportar') }}">Exportar Perfiles</a>
                    </div>
                </div>
            </div>

            @include('PerfilCrud.import')

            @include('layouts.msj')

            @include('PerfilCrud.msjP')

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if (isset($errors) && $errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            @if (session()->has('failures'))
                <table class="table table-danger">
                    <tr>
                        <th>Row</th>
                        <th>Attribute</th>
                        <th>Errors</th>
                        <th>Value</th>
                    </tr>

                    @foreach (session()->get('failures') as $validation)
                        <tr>
                            <td>{{ $validation->row() }}</td>
                            <td>{{ $validation->attribute() }}</td>
                            <td>
                                <ul>
                                    @foreach ($validation->errors() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                {{ $validation->values()[$validation->attribute()] }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Tipo de Identificacion</th>
                                <th>Identificacion</th>
                                <th>Nombres y apellidos</th>
                                <th>Celular</th>
                                <th>Ciudad de Residencia</th>
                                <th>Dirección</th>
                                <th>Vacuna</th>
                                <th>Grupo Sanguineo</th>
                                <th>Estado Civil</th>
                                <th>Sexo</th>
                                <th>Estado</th>
                                <th>Coordinacion</th>
                                <th>Ficha</th>
                                <th>Tipo de Personal</th>
                                <th>Centro</th>
                                <th>Opciones</th>
                            </tr>

                        </thead>
                        <tbody>

                            @foreach ($perfiles as $list)
                                <tr>
                                    <td >{{ $list->id }}</td>
                                    <td>{{ $list->tbl_tipo_identificacions->tbl_tipo_identificacions_nombre ?? ''}}</td>
                                    <td>{{ $list->tbl_perfil_idenficacion }}</td>
                                    <td>{{ $list->tbl_perfil_nombres }} {{ $list->tbl_perfil_apellidos }}</td>

                                    @if ($list->tbl_perfil_celular != null)
                                        <td>{{ $list->tbl_perfil_celular }}</td>
                                    @else
                                        <td></td>
                                    @endif



                                    @if ($list->tbl_perfil_ciudad_residencia != null)
                                        <td>{{ $list->tbl_perfil_ciudad_residencia }}</td>
                                    @else
                                        <td></td>
                                    @endif

                                    @if ($list->tbl_perfil_direccion != null)
                                        <td>{{ $list->tbl_perfil_direccion }}</td>
                                    @else
                                        <td></td>
                                    @endif

                                    @if ($list->tbl_perfil_vacuna != null)
                                        <td>{{ $list->tbl_perfil_vacuna }}</td>
                                    @else
                                        <td></td>
                                    @endif

                                    <td>{{ $list->tbl_perfil_RH }}</td>
                                    <td>{{ $list->tbl_perfil_estado_civil }}</td>
                                    <td>{{ $list->tbl_perfil_sexo }}</td>

                                    <td>{{ $list->tbl_perfil_estado }}</td>
                                    <td>{{ $list->tbl_coordinacions->tbl_coordinacions_nombre }}</td>
                                    @if ($list->tbl_perfil_tbl_fichas_id != null)
                                        <td>{{ $list->tbl_fichas->tbl_fichas_codigo }} -
                                            {{ $list->tbl_fichas->tbl_fichas_grupo }}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>{{ $list->tbl_tipo_personals->tbl_tipo_personals_nombre }}</td>
                                    <td>{{ $list->tbl_centros->tbl_centros_nombre }}</td>

                                    <td style="text-align: center;">

                                        <form action="{{ route('BorrarPerfil', $list->id) }}" method="POST"
                                            style="display: inline-block; ">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger" rel="tooltip"
                                                onclick="return confirm('Seguro que quiere eliminar esté perfil?') ">
                                                <i class="fas fa-trash-alt" title="Eliminar Registro"></i>
                                            </button>

                                        </form>


                                        <a type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#EditPerfil{{ $list->id }}">
                                            <i class='bx bxs-edit-alt bx-xs'></i>
                                        </a>

                                    </td>

                                </tr>


                                @include('PerfilCrud.edit')
                            @endforeach


                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>

    @include('PerfilCrud.create')
@endsection
