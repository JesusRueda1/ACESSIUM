@extends('layouts.auth_app')

@section('title')
Centros
@endsection

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Centros</h1>
        <div class="card mb-4">
            <div class="card-body">
                <a>Cantidad: {{$total}}</a>
                <form class="d-flex">
                    <button type="button" class="btn btn-success rounded-pill m-2" data-bs-toggle="modal" data-bs-target="#formularioCrear"><i class="fas fa-plus"></i></button>
                </form>

            </div>

            <div class="text-end">
                <a class="btn btn-success buttom-end rounded-pill m-2" href="/formatos/centros_accesum (1).xlsx" download="formato_centros.xlsx">Descargar formato </a>
                <a class="btn btn-success buttom-end rounded-pill m-2" href="{{ route('Centro/Import') }}">Importar Centros</a>
                <a class="btn btn-success buttom-end rounded-pill m-2" href="{{ route('Centro/Export') }}">Exportar Centros</a>

        </div>

        </div>

        @include('layouts.msj')

        @include('Centro.msjC')

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>

            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                        <th style="display:none;">#</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>SubDirector</th>
                        <th>Regional</th>
                        <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($centros as $centro)
                                            <tr>
                                                <td style="display:none;">{{$centro->id}}</td>
                                                <td>{{$centro->tbl_centros_codigo}}</td>
                                                <td>{{$centro->tbl_centros_nombre}}</td>
                                                <td>{{$centro->tbl_centros_subdirector}}</td>
                                                <td>{{$centro->tbl_regionals->tbl_regionals_nombre}}</td>
                                                <td style="text-align: center;">

                                                    <form action="{{ route('BorrarCentro', $centro->id) }}" method="POST" style="display: inline-block; ">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger" rel="tooltip" onclick="return confirm('Seguro que quiere eliminar este Centro?') ">
                                                        <i class="fas fa-trash-alt" title="Eliminar Registro"></i>
                                                    </button>

                                                    </form>


                                                    <a type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditCentro{{ $centro->id }}">
                                                        <i class='bx bxs-edit-alt bx-xs'></i>
                                                    </a>

                                                </td>

                                            </tr>

                                            @include('Centro.edit')

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

@include('Centro.create')

@endsection
