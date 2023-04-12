@extends('layouts.auth_app')

@section('title')
    Sedes
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Sede</h1>
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

            @include('Sede.msjS')

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
                                <th>Ciudad</th>
                                <th>Direccion</th>
                                <th>Coordinacion</th>
                                <th>Centro</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sedes as $sede)
                                <tr>
                                    <td style="display: none">{{ $sede->id }}</td>
                                    <td>{{ $sede->tbl_sedes_codigo }}</td>
                                    <td>{{ $sede->tbl_sedes_nombre }}</td>
                                    <td>{{ $sede->tbl_sedes_ciudad}}</td>
                                    <td>{{ $sede->tbl_sedes_direccion }}</td>
                                    <td>{{ $sede->tbl_coordinacions->tbl_coordinacions_nombre }}</td>
                                    <td>{{ $sede->tbl_centros->tbl_centros_nombre }}</td>
                                    <td style="text-align: center;">

                                        <form action="{{ route('BorrarSede', $sede->id) }}" method="POST"
                                            style="display: inline-block; ">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger" rel="tooltip"
                                                onclick="return confirm('Seguro que quiere eliminar esta Sede?') ">
                                                <i class="fas fa-trash-alt" title="Eliminar Registro"></i>
                                            </button>

                                        </form>


                                        <a type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#EditSede{{ $sede->id }}">
                                            <i class='bx bxs-edit-alt bx-xs'></i>
                                        </a>

                                    </td>

                                </tr>

                                @include('Sede.edit')
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Coordinacion</th>
                                <th>Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>

    @include('Sede.create')
@endsection
