@extends('layouts.auth_app')

@section('title')
    imagenes
@endsection

@section('styles')

@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">imagenes</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <a>Cantidad: {{ $total }}</a>
                    <form class="d-flex">
                        <button type="button" class="btn btn-success rounded-pill m-2" data-bs-toggle="modal"
                            data-bs-target="#formularioCrear"><i class="fas fa-plus"></i>
                        </button>
                    </form>
                </div>
            </div>

            @include('layouts.msj')

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th style="display:none;">#</th>
                                <th>Imagen</th>
                                <th>Path</th>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($imagenes as $list)

                                <tr>
                                    <td style="display:none;">{{ $list->id }}</td>
                                    <td>
                                        <img id="FotoCarnet" src="/images/{{$list->path}}" alt="" height="150" width="150">
                                    </td>
                                    <td>{{ $list->path }}</td>
                                    <td>{{ $list->tbl_perfils->tbl_perfil_idenficacion }}</td>
                                    <td>{{ $list->tbl_perfils->tbl_perfil_nombres }} {{$list->tbl_perfils->tbl_perfil_apellidos}}</td>

                                    <td style="text-align: center;">

                                        {{-- <form action="{{ route('BorrarImagen', $list->id) }}" method="POST"
                                            style="display: inline-block; ">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger" rel="tooltip"
                                                onclick="return confirm('Seguro que quiere eliminar este imagenes?') ">
                                                <i class="fas fa-trash-alt" title="Eliminar Registro"></i>
                                            </button>

                                            </form> --}}
                                        en mantenimiento

                                    </td>

                                </tr>

                                @include('imagenes.edit')
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    @include('Perfil.Createfoto')
@endsection
