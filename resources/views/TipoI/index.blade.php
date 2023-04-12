@extends('layouts.auth_app')

@section('title')
    Tipo Identificacion
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tipos de Identificacion</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <a>Cantidad: {{ $total }}</a>
                    <form class="d-flex">
                        <button type="button" class="btn btn-success rounded-pill m-2" data-bs-toggle="modal"
                            data-bs-target="#formularioCrear"><i class="fas fa-plus"></i></button>
                    </form>
                </div>
            </div>

            @include('layouts.msj')

            @include('TipoI.msjTI')

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>

                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th style="display: none">#</th>
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tipois as $ti)
                                <tr>
                                    <td style="display: none">{{ $ti->id }}</td>
                                    <td>{{ $ti->tbl_tipo_identificacions_nombre }}</td>
                                    <td style="text-align: center;">

                                        <form action="{{ route('BorrarTipoI', $ti->id) }}" method="POST"
                                            style="display: inline-block; ">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger" rel="tooltip"
                                                onclick="return confirm('Seguro que quiere eliminar este Tipo de Personal?') ">
                                                <i class="fas fa-trash-alt" title="Eliminar Registro"></i>
                                            </button>

                                        </form>


                                        <a type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#EditTipoI{{ $ti->id }}">
                                            <i class='bx bxs-edit-alt bx-xs'></i>
                                        </a>

                                    </td>

                                </tr>

                                @include('TipoI.edit')
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>

    @include('TipoI.create')
@endsection
