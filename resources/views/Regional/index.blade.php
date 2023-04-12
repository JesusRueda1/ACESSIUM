@extends('layouts.auth_app')

@section('title')
    Regional
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Regional</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <a>Cantidad: {{ $total }}</a>
                    <form class="d-flex">
                        <button type="button" class="btn btn-success rounded-pill m-2" data-bs-toggle="modal"
                            data-bs-target="#formularioCrear"><i class="fas fa-plus"></i></button>
                    </form>
                    <div class="text-end">

                        <a class="btn btn-success buttom-end rounded-pill m-2" href="/formatos/accesum_regionales (1).xlsx" download="formato_regionales.xlsx">Descargar formato </a>
                        <a class="btn btn-success buttom-end rounded-pill m-2" href="{{ route('regional/Import') }}">Importar Regionales</a>
                        <a class="btn btn-success buttom-end rounded-pill m-2" href="{{ route('Regional/Exportar') }}">Exportar Regionales</a>

                </div>

                </div>
            </div>

            @include('layouts.msj')

            @include('Regional.msjR')


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
                                <th>Director</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($regionales as $regional)
                                <tr>
                                    <td style="display: none">{{ $regional->id }}</td>
                                    <td>{{ $regional->tbl_regionals_codigo }}</td>
                                    <td>{{ $regional->tbl_regionals_nombre }}</td>
                                    <td>{{ $regional->tbl_regionals_director }}</td>
                                    <td style="text-align: center;">

                                        <form action="{{ route('BorrarRegional', $regional->id) }}" method="POST"
                                            style="display: inline-block; ">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger" rel="tooltip"
                                                onclick="return confirm('Seguro que quiere eliminar esta regional?') ">
                                                <i class="fas fa-trash-alt" title="Eliminar Registro"></i>
                                            </button>

                                        </form>

                                        <a type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#EditRegional{{ $regional->id }}">
                                            <i class='bx bxs-edit-alt bx-xs'></i>
                                        </a>

                                    </td>
                                </tr>

                                {{-- Modal Borrar --}}
                                @include('Regional.edit')
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Director</th>
                                <th>Opciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>

    @include('Regional.create')
@endsection
