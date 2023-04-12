@extends('layouts.auth_app')

@section('title')
    Dashboard
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
    <!-- Sale & Revenue Start -->

    @php
    use App\Models\tbl_perfil;
    use App\Models\tbl_coordinacion;
    use App\Models\tbl_tipo_personal;
    use Illuminate\Support\Facades\DB;

    if (Auth::user()->id == '1'){
        $coordinacion= '1';
    }
    else
    $coordinacion = Auth::user()->tbl_perfils->tbl_perfil_tbl_coordinacion_id;

    $user = DB::table('tbl_coordinacions')->where('id', $coordinacion)->first();



    $tp1 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Funcionario')->pluck('id');
    $tp2 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Contratista')->pluck('id');
    $tp3 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Servicios')->pluck('id');
    $tp4 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Porteria')->pluck('id');
    $tp5 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Aprendiz')->pluck('id');
    $tp6 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Visitante')->pluck('id');

    $fecha_actual = ' Fecha actual: ' . date('d') . ' del ' . date('m') . ' de ' . date('Y') ;

     echo 'Usted esta en la coordinacion :  ', $user->tbl_coordinacions_nombre  ;



    /* <<<<<<CARDS Y TABLAS>>>>>> */

    /* funcionario */

    $funcionario = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp1)->get();
    $F_entrada = floatval(
        $funcionario
            ->where('tbl_perfil_pase', 'entrada')
            ->where('tbl_perfil_tbl_coordinacion_id', $coordinacion)
            ->count(),
    );
    $funcionarios = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp1)
        ->where('tbl_perfil_pase', 'entrada')
        ->where('tbl_perfil_tbl_coordinacion_id', $coordinacion)
        ->get();

    /* contratistas */
    $contratistas = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp2)->get();
    $C_entrada = $contratistas
        ->where('tbl_perfil_pase', 'entrada')
        ->where('tbl_perfil_tbl_coordinacion_id', $coordinacion)
        ->count();
    $contratistas = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp2)
        ->where('tbl_perfil_pase', 'entrada')
        ->where('tbl_perfil_tbl_coordinacion_id', $coordinacion)
        ->get();

    /* Agentes de servicio */
    $servicios = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp3)->get();
    $S_entrada = floatval(
        $servicios
            ->where('tbl_perfil_pase', 'entrada')
            ->where('tbl_perfil_tbl_coordinacion_id', $coordinacion)
            ->count(),
    );
    $servicios = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp3)
        ->where('tbl_perfil_pase', 'entrada')
        ->where('tbl_perfil_tbl_coordinacion_id', $coordinacion)
        ->get();

    /* porteros */
    $porteros = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp4)->get();
    $P_entrada = floatval(
        $porteros
            ->where('tbl_perfil_pase', 'entrada')
            ->where('tbl_perfil_tbl_coordinacion_id', $coordinacion)
            ->count(),
    );
    $porteros = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp4)
        ->where('tbl_perfil_pase', 'entrada')
        ->where('tbl_perfil_tbl_coordinacion_id', $coordinacion)
        ->get();

    /* aprendiz */
    $aprendices = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp5)->get();
    $A_entrada = floatval(
        $aprendices
            ->where('tbl_perfil_pase', 'entrada')
            ->where('tbl_perfil_tbl_coordinacion_id', $coordinacion)
            ->count(),
    );
    $aprendices = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp5)
        ->where('tbl_perfil_pase', 'entrada')
        ->where('tbl_perfil_tbl_coordinacion_id', $coordinacion)
        ->get();

    /* visitantes */
    $visitantes = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp6)->get();
    $V_entrada = floatval(
        $visitantes
            ->where('tbl_perfil_pase', 'entrada')
            ->where('tbl_perfil_tbl_coordinacion_id', $coordinacion)
            ->count(),
    );
    $visitantes = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp6)
        ->where('tbl_perfil_pase', 'entrada')
        ->where('tbl_perfil_tbl_coordinacion_id', $coordinacion)
        ->get();

    @endphp

    <!-- Sales Chart Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-4">

                    <div class="text-center">
                        <h4>{{ $fecha_actual }}</h4>
                    </div>


                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card bg-primary text-color mb-4">
                                <div class="card-body row">
                                    <div class="col-6">
                                        <i class="fas fa-user-tie tamaño-iconos "></i>
                                    </div>
                                    <div class="col-6" align="right">
                                        <h1 class="tamaño-letra">{{ $F_entrada }}</h1>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link tamaño-letra-flooter" data-bs-toggle="modal"
                                        data-bs-target="#modalfuncionario">Funcionario</a>
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
                                        <h1 class="tamaño-letra">{{ $C_entrada }}</h1>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link tamaño-letra-flooter" data-bs-toggle="modal"
                                        data-bs-target="#modalcontratistas">Contratistas</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card bg-success text-color mb-4">
                                <div class="card-body row">
                                    <div class="col-6">
                                        <i class="fas fa-people-carry tamaño-iconos"></i>
                                    </div>
                                    <div class="col-6" align="right">
                                        <h1 class="tamaño-letra">{{ $S_entrada }}</h1>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link tamaño-letra-flooter" data-bs-toggle="modal"
                                        data-bs-target="#modalservicios">Agentes
                                        de servicios</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card bg-success text-color  mb-4">
                                <div class="card-body row">
                                    <div class="col-6">
                                        <i class="fas fa-door-open tamaño-iconos"></i>
                                    </div>
                                    <div class="col-6" align="right">
                                        <h1 class="tamaño-letra">{{ $P_entrada }}</h1>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link tamaño-letra-flooter" data-bs-toggle="modal"
                                        data-bs-target="#modalporteros">Porteria</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card bg-primary text-color mb-4">
                                <div class="card-body row">
                                    <div class="col-6">
                                        <i class="fas fa-user-graduate tamaño-iconos"></i>
                                    </div>
                                    <div class="col-6" align="right">
                                        <h1 class="tamaño-letra">{{ $A_entrada }}</h1>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link tamaño-letra-flooter" data-bs-toggle="modal"
                                        data-bs-target="#modalaprendices">Aprendices</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card bg-danger text-color mb-4">
                                <div class="card-body row">
                                    <div class="col-6">
                                        <i class="fas fa-user tamaño-iconos"></i>
                                    </div>
                                    <div class="col-6" align="right">
                                        <h1 class="tamaño-letra">{{ $V_entrada }}</h1>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link tamaño-letra-flooter" data-bs-toggle="modal"
                                        data-bs-target="#modalvisitantes">Visitantes</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><br><br><br>

    @include('modal_dash')

    <!-- Widgets End -->
@endsection
