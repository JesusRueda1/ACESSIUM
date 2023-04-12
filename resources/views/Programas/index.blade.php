@extends('layouts.auth_app')

@section('title')
    Programas
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Programas</h1>
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

            @include('Programas.msjPg')

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
                                <th>Version</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($programa as $p)
                                <tr>
                                    <td style="display: none">{{ $p->id }}</td>
                                    <td>{{ $p->tbl_programas_codigo }}</td>
                                    <td>{{ $p->tbl_programas_nombre }}</td>
                                    <td>{{ $p->tbl_programas_version }}</td>
                                    <td style="text-align: center;">

                                        <form action="{{ route('BorrarPrograma', $p->id) }}" method="POST"
                                            style="display: inline-block; ">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger" rel="tooltip"
                                                onclick="return confirm('Seguro que quiere eliminar este Programa?') ">
                                                <i class="fas fa-trash-alt" title="Eliminar Registro"></i>
                                            </button>

                                        </form>


                                        <a type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#EditPrograma{{ $p->id }}">
                                            <i class='bx bxs-edit-alt bx-xs'></i>
                                        </a>

                                    </td>

                                </tr>

                                @include('Programas.edit')
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Version</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>

    @include('Programas.create')
@endsection
