@extends('layouts.auth_app')

@section('title')
    Registros Funcionarios y Contratistas
@endsection

@section('styles')
    <style>
        .tamaño-iconos {
            height: 3em !important;
        }

        .tamaño-letra-cant {
            font-size: 3em !important;
        }

        .tamaño-letra-flooter {
            font-size: 18px !important;
        }

        .text-color {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-white-rgb), var(--bs-text-opacity)) !important;
            text-decoration: none;
        }
    </style>
@endsection


@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded p-4">

                            <div class="text-center">
                                <h4>Funcionarios y Contratistas</h4>
                            </div>


                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="card bg-primary text-color mb-4">
                                        <div class="card-body row">
                                            <div class="col-6">
                                                <i class="fas fa-user-tie tamaño-iconos "></i>
                                            </div>
                                            <div class="col-6" align="right">
                                                <h1 class="tamaño-letra">{{ $cant_funcionarios }}</h1>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link tamaño-letra-flooter"
                                                href="#">Funcionario</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card bg-warning text-color mb-4">
                                        <div class="card-body row">
                                            <div class="col-6">
                                                <i class="fas fa-chalkboard-teacher tamaño-iconos"></i>
                                            </div>
                                            <div class="col-6" align="right">
                                                <h1 class="tamaño-letra">{{ $cant_contratistas }}</h1>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link tamaño-letra-flooter"
                                                href="#">Contratistas</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="">
                <div class="row">
                    <div class="col-md-2">
                        <label for="tbl_sedes_tbl_centros_id" class="form-label">Fecha</label>
                        <input type="date" class="form-control"/>
                        <br>
                    </div>
                    <div class="col-md-3">
                        <label for="tbl_sedes_tbl_centros_id" class="form-label">Documento</label>
                        <input type="number" class="form-control" placeholder="opcional..."/>
                    </div>

                    <div class="col-md-3" style="margin-top:32px;" >

                        <input type="button" value="Consultar" class="btn btn-success" >
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>{{-- style="marginTop:10%;" --}}
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
