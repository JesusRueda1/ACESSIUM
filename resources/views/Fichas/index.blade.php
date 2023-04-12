@extends('layouts.auth_app')

@section('title')
    Fichas
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Fichas</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <a>Cantidad: {{ $total }}</a>
                    <form class="d-flex">
                        <button type="button" class="btn btn-success rounded-pill m-2" data-bs-toggle="modal"
                            data-bs-target="#formularioCrear"><i class="fas fa-plus"></i></button>
                    </form>
                    <div class="text-end">
                        <a class="btn btn-success buttom-end rounded-pill m-2" href="{{ route('Fichas/Import') }}">Importar Fichas</a>

                            <a class="btn btn-success rounded-pill m-2"{{--  href="{{ route('Perfiles/Exportar') }} --}}">Exportar Fichas</a>
                    </div>

                </div>
            </div>

            @include('layouts.msj')

            @include('Fichas.msjF')

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
                                <th>Grupo</th>
                                <th>Programa</th>
                                <th>Coordinacion</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($ficha as $f)
                                <tr>
                                    <td style="display: none">{{ $f->id }}</td>
                                    <td>{{ $f->tbl_fichas_codigo }}</td>
                                    <td>{{ $f->tbl_fichas_grupo }}</td>
                                    <td>{{ $f->tbl_programas->tbl_programas_nombre }} -
                                        {{ $f->tbl_programas->tbl_programas_version }}</td>
                                    <td>{{ $f->tbl_coordinacions->tbl_coordinacions_nombre }}</td>
                                    <td style="text-align: center;">

                                        <form action="{{ route('BorrarFicha', $f->id) }}" method="POST"
                                            style="display: inline-block; ">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger" rel="tooltip"
                                                onclick="return confirm('Seguro que quiere eliminar esta Ficha?') ">
                                                <i class="fas fa-trash-alt" title="Eliminar Registro"></i>
                                            </button>

                                        </form>


                                        <a type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#EditFicha{{ $f->id }}">
                                            <i class='bx bxs-edit-alt bx-xs'></i>
                                        </a>

                                    </td>

                                </tr>

                                @include('Fichas.edit')
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Grupo</th>
                                <th>Programa</th>
                                <th>Coordinacion</th>
                                <th>Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>

    @include('Fichas.create')
@endsection
