@extends('layouts.auth_app')

@section('title')
Coordinacion
@endsection

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Coordinacion</h1>
        <div class="card mb-4">
            <div class="card-body">
                <a>Cantidad: {{$total}}</a>
                <form class="d-flex">
                    <button type="button" class="btn btn-success rounded-pill m-2" data-bs-toggle="modal" data-bs-target="#formularioCrear"><i class="fas fa-plus"></i></button>
                </form>
                <div class="text-end">
                    <a class="btn btn-success buttom-end rounded-pill m-2" href="/formatos/Coordinacion formato.xlsx" download="formato_coordinacion.xlsx">Descargar formato </a>
                    <a class="btn btn-success buttom-end rounded-pill m-2" href="{{ route('Coordinacion/Import') }}">Importar Coordinaciones</a>
                    <a class="btn btn-success buttom-end rounded-pill m-2" href="{{ route('Coordinacion/Exportar') }}">Exportar Coordinaciones</a>

            </div>
            </div>
        </div>

        @include('layouts.msj')

        @include('Coordinacion.msjC')

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>

            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                        <th style="display: none">#</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Coordinador</th>
                        <th>Centro</th>
                        <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($coordinaciones as $coordinacion)
                                <tr>
                                        <td style="display: none">{{$coordinacion->id}}</td>
                                        <td>{{$coordinacion->tbl_coordinacions_codigo}}</td>
                                        <td>{{$coordinacion->tbl_coordinacions_nombre}}</td>
                                        <td>{{$coordinacion->tbl_coordinacions_coordinador}}</td>
                                        <td>{{$coordinacion->tbl_coordinacions_tbl_centros_id}} - {{$coordinacion->centros->tbl_centros_nombre}} - {{$coordinacion->centros->regional->tbl_regionals_nombre}}</td>
                                    <td style="text-align: center;">

                                        <form action="{{ route('BorrarCoordinacion', $coordinacion->id) }}" method="POST" style="display: inline-block; ">
                                        @csrf
                                        @method('DELETE')

                                            <button type="submit" class="btn btn-danger" rel="tooltip" onclick="return confirm('Seguro que quiere eliminar este Centro?') ">
                                                <i class="fas fa-trash-alt" title="Eliminar Registro"></i>
                                            </button>

                                        </form>


                                        <a type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditCoordinacion{{ $coordinacion->id }}">
                                            <i class='bx bxs-edit-alt bx-xs'></i>                                        </a>

                                    </td>

                                </tr>

                            @include('Coordinacion.edit')

                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                        <th>#</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>SubDirector</th>
                        <th>Regional</th>
                        <th>Opciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</main>

@include('Coordinacion.create')

@endsection


