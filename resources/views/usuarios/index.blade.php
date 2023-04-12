@extends('layouts.auth_app')

@section('title')
Usuarios
@endsection

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Usuarios</h1>
        <div class="card mb-4">
            <div class="card-body">
                <a>Cantidad: {{ $total }} </a>
                <form class="d-flex">
                      <a type="button" class="btn btn-success rounded-pill m-2" href="{{ route('indexPerfil') }}"><i class="fas fa-plus"></i></a>

                </form>
                <div class="text-end">
                    <a class="btn btn-success buttom-end rounded-pill m-2" href="{{ route('indexPerfil') }}">Importar Usuarios</a>
                    <a class="btn btn-success buttom-end rounded-pill m-2" href="{{ route('Users/Exportar') }}">Exportar Usuarios</a>

            </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>

            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th style="">ID</th>
                            <th style="">Nombre</th>
                            <th style="">E-mail</th>
                            <th style="">Rol</th>
                            <th style="">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($usuarios as $usuario)
                                  <tr>
                                    <td >{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                      @if(!empty($usuario->getRoleNames()))
                                        @foreach($usuario->getRoleNames() as $rolNombre)
                                          <span>{{ $rolNombre }}</span>
                                        @endforeach
                                      @endif
                                    </td>

                                    <td>
                                        <form action="{{ route('BorrarUser', $usuario->id) }}" method="POST"
                                            style="display: inline-block; ">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger" rel="tooltip"
                                                onclick="return confirm('Seguro que quiere eliminar este Usuario?') ">
                                                <i class="fas fa-trash-alt" title="Eliminar Registro"></i>
                                            </button>

                                        </form>


                                        <a type="submit" class="btn btn-primary" href="{{ route('EditarUser',$usuario->id) }}">
                                            <i class='bx bxs-edit-alt bx-xs'></i>
                                        </a>
                                    </td>
                                  </tr>
                                @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection
