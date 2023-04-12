{{-- BLANCO



-------------DASHBOAR---------------
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
    </style>
@endsection

@section('content')
    <!-- Sale & Revenue Start -->
    @php
    use App\Models\tbl_perfil;
    use App\Models\tbl_tipo_personal;
    use Illuminate\Support\Facades\DB;

    $tp1 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Funcionario')->pluck('id');
    $cant_funcionarios = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp1)->count();

    $tp2 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Contratista')->pluck('id');
    $cant_Contratistas = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp2)->count();

    $tp3 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Servicios')->pluck('id');
    $cant_Servicios = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp3)->count();

    $tp4 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Porteria')->pluck('id');
    $cant_Porteros = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp4)->count();

    $tp5 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Aprendiz')->pluck('id');
    $cant_Aprendices = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp5)->count();

    $tp6 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Visitante')->pluck('id');
    $cant_Visitantes = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp6)->count();

    $titulo_bar = ' Fecha actual: ' . date('d') . ' del ' . date('m') . ' de ' . date('Y');

    /* <<<<<<CARDS Y GRAFICAS>>>>>> */

    /* funcionario */
    $funcionario = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp1)->get();
    $F_salida = floatval($funcionario->where('tbl_perfil_pase', 'salida')->count());
    $F_entrada = floatval($funcionario->where('tbl_perfil_pase', 'entrada')->count());

    /* contratistas */
    $contratistas = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp2)->get();
    $C_salida = $contratistas->where('tbl_perfil_pase', 'salida')->count();
    $C_entrada = $contratistas->where('tbl_perfil_pase', 'entrada')->count();

    /* Agentes de servicio */
    $servicios = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp3)->get();
    $S_salida = floatval($servicios->where('tbl_perfil_pase', 'salida')->count());
    $S_entrada = floatval($servicios->where('tbl_perfil_pase', 'entrada')->count());

    /* porteros */
    $porteros = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp4)->get();
    $P_salida = floatval($porteros->where('tbl_perfil_pase', 'salida')->count());
    $P_entrada = floatval($porteros->where('tbl_perfil_pase', 'entrada')->count());

    /* aprendiz */
    $aprendices = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp5)->get();
    $A_salida = floatval($aprendices->where('tbl_perfil_pase', 'salida')->count());
    $A_entrada = floatval($aprendices->where('tbl_perfil_pase', 'entrada')->count());

    /* visitantes */
    $visitantes = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp6)->get();
    $V_salida = floatval($visitantes->where('tbl_perfil_pase', 'salida')->count());
    $V_entrada = floatval($visitantes->where('tbl_perfil_pase', 'entrada')->count());

    @endphp
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body row">
                            <div class="col-6">
                                <i class="fas fa-user-tie tamaño-iconos "></i>
                            </div>
                            <div class="col-6" align="right">
                                <h1 class="tamaño-letra">{{ $cant_funcionarios }}</h1>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link tamaño-letra-flooter" href="#">Funcionario</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body row">
                            <div class="col-6">
                                <i class="fas fa-chalkboard-teacher tamaño-iconos"></i>
                            </div>
                            <div class="col-6" align="right">
                                <h1 class="tamaño-letra">{{ $cant_Contratistas }}</h1>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link tamaño-letra-flooter" href="#">Contratistas</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body row">
                            <div class="col-6">
                                <i class="fas fa-people-carry tamaño-iconos"></i>
                            </div>
                            <div class="col-6" align="right">
                                <h1 class="tamaño-letra">{{ $cant_Servicios }}</h1>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link tamaño-letra-flooter" href="#">Agentes de
                                servicios</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body row">
                            <div class="col-6">
                                <i class="fas fa-door-open tamaño-iconos"></i>
                            </div>
                            <div class="col-6" align="right">
                                <h1 class="tamaño-letra">{{ $cant_Porteros }}</h1>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link tamaño-letra-flooter" href="#">Porteria</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body row">
                            <div class="col-6">
                                <i class="fas fa-user-graduate tamaño-iconos"></i>
                            </div>
                            <div class="col-6" align="right">
                                <h1 class="tamaño-letra">{{ $cant_Aprendices }}</h1>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link tamaño-letra-flooter" href="#">Aprendices</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2  col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body row">
                            <div class="col-6">
                                <i class="fas fa-user tamaño-iconos"></i>
                            </div>
                            <div class="col-6" align="right">
                                <h1 class="tamaño-letra">{{ $cant_Visitantes }}</h1>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link tamaño-letra-flooter" href="#">Visitantes</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <!--Añadir Charts-->


    <!-- Sale  & Revenue End -->


    <!-- Sales Chart Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light text-center rounded p-4">
                    <h4>{{ $titulo_bar }}</h4>

                    <div class="row">
                        <div class="col-xl-2 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body row">
                                    <div class="col-6" style="max-width: 25%;">
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
                        <div class="col-xl-2 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body row">
                                    <div class="col-6">
                                        <i class="fas fa-chalkboard-teacher tamaño-iconos"></i>
                                    </div>
                                    <div class="col-6" align="right">
                                        <h1 class="tamaño-letra">{{ $cant_Contratistas }}</h1>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link tamaño-letra-flooter"
                                        href="#">Contratistas</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body row">
                                    <div class="col-6">
                                        <i class="fas fa-people-carry tamaño-iconos"></i>
                                    </div>
                                    <div class="col-6" align="right">
                                        <h1 class="tamaño-letra">{{ $cant_Servicios }}</h1>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link tamaño-letra-flooter" href="#">Agentes
                                        de servicios</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body row">
                                    <div class="col-6">
                                        <i class="fas fa-door-open tamaño-iconos"></i>
                                    </div>
                                    <div class="col-6" align="right">
                                        <h1 class="tamaño-letra">{{ $cant_Porteros }}</h1>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link tamaño-letra-flooter"
                                        href="#">Porteria</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body row">
                                    <div class="col-6">
                                        <i class="fas fa-user-graduate tamaño-iconos"></i>
                                    </div>
                                    <div class="col-6" align="right">
                                        <h1 class="tamaño-letra">{{ $cant_Aprendices }}</h1>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link tamaño-letra-flooter"
                                        href="#">Aprendices</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2  col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body row">
                                    <div class="col-6">
                                        <i class="fas fa-user tamaño-iconos"></i>
                                    </div>
                                    <div class="col-6" align="right">
                                        <h1 class="tamaño-letra">{{ $cant_Visitantes }}</h1>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link tamaño-letra-flooter"
                                        href="#">Visitantes</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><br><br><br>
    <!-- Sales Chart End -->


    <!-- Filtros -->

    <!-- Widgets End -->
@endsection

-------------------------------------------


@extends('layouts.auth_app')

@section('title')

@endsection

@section('content')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">a</h1>
        <div class="card mb-4">
            <div class="card-body">
                <a>Cantidad: {{$total}}</a>
                <form class="d-flex">
                      <button type="button" class="btn btn-success rounded-pill m-2" data-bs-toggle="modal" data-bs-target="#formularioCrear"><i class="fas fa-plus"></i></button>
                </form>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>

            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>

                    </thead>
                    <tbody>



                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</main>

@include('.create')

@endsection
 --}}


{{-- LOGIN OLD
 <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </div>
</form>
 --}}

 -- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-05-2022 a las 21:03:53
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `accesum2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2014_10_12_000000_create_users_table', 1),
(36, '2014_10_12_100000_create_password_resets_table', 1),
(37, '2019_08_19_000000_create_failed_jobs_table', 1),
(38, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(39, '2022_04_09_162250_create_tbl_regionals_table', 1),
(40, '2022_04_09_162553_create_tbl_centros_table', 1),
(41, '2022_04_09_162639_create_tbl_coordinacions_table', 1),
(42, '2022_04_09_162658_create_tbl_sedes_table', 1),
(43, '2022_04_09_163016_create_tbl_tipo_personals_table', 1),
(44, '2022_04_09_163106_create_tbl_tipo_identificacions_table', 1),
(45, '2022_04_09_163227_create_tbl_programas_table', 1),
(46, '2022_04_09_163655_create_tbl_personals_table', 1),
(47, '2022_04_09_163719_create_tbl_fichas_table', 1),
(48, '2022_04_09_163740_create_tbl_aprendizs_table', 1),
(49, '2022_04_16_142250_create_permission_tables', 1),
(50, '2022_05_04_203015_create_movimientos_table', 1),
(51, '2022_05_16_154555_create_useables_table', 1),
(52, '2022_05_17_193938_create_perfils_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tbl_movimientos_identificacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_movimientos_fecha` date NOT NULL,
  `tbl_movimientos_sede` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfils`
--

CREATE TABLE `perfils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_aprendizs`
--

CREATE TABLE `tbl_aprendizs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tbl_aprendizs_tbl_tipo_identificacions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tbl_aprendiz_identificacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_aprendizs_nombres` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_aprendizs_apellidos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_aprendizs_correo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_aprendizs_celular` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_aprendizs_direccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_aprendizs_vacuna` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_aprendizs_estado` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_aprendizs_foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tbl_aprendizs_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_aprendiz_pase` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_aprendizs_tbl_fichas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_centros`
--

CREATE TABLE `tbl_centros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tbl_centros_codigo` int(11) NOT NULL,
  `tbl_centros_nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_centros_subdirector` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tbl_centros_tbl_regionals_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_centros`
--

INSERT INTO `tbl_centros` (`id`, `tbl_centros_codigo`, `tbl_centros_nombre`, `tbl_centros_subdirector`, `tbl_centros_tbl_regionals_id`, `created_at`, `updated_at`) VALUES
(1, 1010, 'Despacho Dirección', NULL, 1, '0000-00-00 00:00:00', '2022-05-11 07:55:57'),
(2, 9517, 'Centro para la Biodiversidad y el Turismo del Amazonas', NULL, 1, '0000-00-00 00:00:00', '2022-05-11 08:53:23'),
(3, 1010, 'Despacho Dirección', NULL, 2, '0000-00-00 00:00:00', '2022-05-11 08:53:50'),
(4, 9101, 'Centro de los Recursos Naturales Renovables - La Salada', '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 9201, 'Centro del Diseño y Manufactura del Cuero', NULL, 2, '0000-00-00 00:00:00', '2022-05-11 08:54:09'),
(6, 9202, 'Centro de Formación en Diseño, Confección y Moda.', NULL, 2, '0000-00-00 00:00:00', '2022-05-11 08:55:17'),
(7, 9203, 'Centro para el Desarrollo del Habitat y la Construcción', NULL, 2, '0000-00-00 00:00:00', '2022-05-11 08:55:33'),
(8, 9204, 'Centro de Tecnología de la Manufactura Avanzada.', NULL, 2, '0000-00-00 00:00:00', '2022-05-11 08:55:47'),
(9, 9205, 'Centro Tecnológico del Mobiliario', NULL, 2, '0000-00-00 00:00:00', '2022-05-11 08:56:25'),
(10, 9206, 'Centro Tecnológico de Gestión Industrial', NULL, 2, '0000-00-00 00:00:00', '2022-05-11 08:56:50'),
(11, 9301, 'Centro de Comercio', '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 9401, 'Centro de Servicios de Salud', '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 9402, 'Centro de Servicios y Gestión Empresarial', NULL, 2, '0000-00-00 00:00:00', '2022-05-11 08:58:02'),
(14, 9501, 'Complejo Tecnológico para la Gestión Agroempresarial', NULL, 2, '0000-00-00 00:00:00', '2022-05-11 08:58:24'),
(15, 9502, 'Complejo Tecnológico Minero Agroempresarial', NULL, 2, '0000-00-00 00:00:00', '2022-05-11 09:02:23'),
(16, 9503, 'Centro de la Innovación, la Agroindustria y el Turismo', NULL, 2, '0000-00-00 00:00:00', '2022-05-11 09:02:35'),
(17, 9504, 'Complejo Tecnológico Agroindustrial, Pecuario y Turistico', NULL, 2, '0000-00-00 00:00:00', '2022-05-11 09:34:32'),
(18, 9549, 'Complejo Tecnológico, Turístico y Agroindustrial del Occidente Antioqueño', NULL, 2, '0000-00-00 00:00:00', '2022-05-11 09:07:49'),
(19, 912710, 'Centro de Formación Minero Ambiental', NULL, 2, '0000-00-00 00:00:00', '2022-05-11 09:08:04'),
(20, 1010, 'Despacho Dirección', NULL, 3, '0000-00-00 00:00:00', '2022-05-11 09:09:19'),
(21, 9530, 'Centro de Gestión y Desarrollo Agroindustrial de Arauca', NULL, 3, '0000-00-00 00:00:00', '2022-05-11 09:09:34'),
(22, 1010, 'Despacho Dirección', NULL, 4, '0000-00-00 00:00:00', '2022-05-11 09:10:09'),
(23, 9103, 'Centro para el Desarrollo Agroecologico y Agroindustrial', 'Carmen Sofia Daza Beltran', 4, '0000-00-00 00:00:00', '2022-05-11 09:10:27'),
(24, 9207, 'Centro Nacional Colombo Alemán', 'Victor Fabian Arbelaez Torrejano', 4, '0000-00-00 00:00:00', '2022-05-11 09:10:46'),
(25, 9208, 'Centro Industrial y de Aviación', 'José Gregorio Suarez Contreras', 4, '0000-00-00 00:00:00', '2022-05-11 09:08:53'),
(26, 9302, 'Centro de \nComercio y Servicios', 'Elizabeth Tuberquia', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 1010, 'Despacho Dirección', NULL, 5, '0000-00-00 00:00:00', '2022-05-11 09:22:58'),
(28, 9104, 'Centro Agroempres arial y Minero', '', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 9105, 'Centro Internacional Náutico, Fluvial y Portuario', NULL, 5, '0000-00-00 00:00:00', '2022-05-11 09:12:21'),
(30, 9218, 'Centro para la Industria Petroquímica', NULL, 5, '0000-00-00 00:00:00', '2022-05-11 09:12:44'),
(31, 9304, 'Centro de Comercio y\nServicios', '', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 1010, 'Despacho Dirección', NULL, 6, '0000-00-00 00:00:00', '2022-05-11 09:13:04'),
(33, 9110, 'Centro de Desarrollo Agropecuario y Agroindustrial', NULL, 6, '0000-00-00 00:00:00', '2022-05-11 09:13:40'),
(34, 9111, 'Centro Minero', '', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 9305, 'Centro de Gestión Administrativa y Fortalecimiento Empresarial', NULL, 6, '0000-00-00 00:00:00', '2022-05-11 09:14:36'),
(36, 9514, 'Centro Industrial de Mantenimiento y Manufactura', NULL, 6, '0000-00-00 00:00:00', '2022-05-11 09:16:58'),
(37, 1010, 'Despacho Dirección', NULL, 7, '0000-00-00 00:00:00', '2022-05-11 09:17:36'),
(38, 9112, 'Centro para la Formación Cafetera', NULL, 7, '0000-00-00 00:00:00', '2022-05-11 09:18:11'),
(39, 9219, 'Centro de Automatización Industrial', NULL, 7, '0000-00-00 00:00:00', '2022-05-11 09:36:18'),
(40, 9220, 'Centro de Procesos Industriales', '', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 9306, 'Centro de\nComercio y Servicios', '', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 9515, 'Centro Pecuario y Agroempresarial', NULL, 7, '0000-00-00 00:00:00', '2022-05-11 10:01:09'),
(43, 1010, 'Despacho Dirección', NULL, 8, '0000-00-00 00:00:00', '2022-05-11 10:01:37'),
(44, 9516, 'Centro Tecnológico de la Amazonia', NULL, 8, '0000-00-00 00:00:00', '2022-05-11 09:32:31'),
(45, 1010, 'Despacho Dirección', NULL, 9, '0000-00-00 00:00:00', '2022-05-11 10:02:39'),
(46, 9519, 'Centro Agroindustrial y Fortalecimiento Empresarial de Casanare', NULL, 9, '0000-00-00 00:00:00', '2022-05-11 09:36:37'),
(47, 1010, 'Despacho Dirección', NULL, 10, '0000-00-00 00:00:00', '2022-05-11 10:03:09'),
(48, 9113, 'Centro Agropecuario', '', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 9221, 'Centro de Teleinformática y Producción Industrial', NULL, 10, '0000-00-00 00:00:00', '2022-05-11 09:38:22'),
(50, 9307, 'Centro de Comercio y\nServicios', '', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 1010, 'Despacho Dirección', NULL, 11, '0000-00-00 00:00:00', '2022-05-11 10:06:49'),
(52, 9114, 'Centro Biotecnológico del Caribe', NULL, 11, '0000-00-00 00:00:00', '2022-05-11 09:25:21'),
(53, 9520, 'Centro Agroempresarial', NULL, 11, '0000-00-00 00:00:00', '2022-05-11 10:07:52'),
(54, 9521, 'Centro de Operación y Mantenimiento Minero', NULL, 11, '0000-00-00 00:00:00', '2022-05-11 09:38:53'),
(55, 1010, 'Despacho Dirección', NULL, 12, '0000-00-00 00:00:00', '2022-05-11 10:08:54'),
(56, 9522, 'Centro de Recursos Naturales, Industria y Biodiversidad', NULL, 12, '0000-00-00 00:00:00', '2022-05-11 10:08:04'),
(57, 1010, 'Despacho Dirección', NULL, 13, '0000-00-00 00:00:00', '2022-05-11 10:09:42'),
(58, 9115, 'Centro Agropecuario y de Biotecnología el Porvenir', NULL, 13, '0000-00-00 00:00:00', '2022-05-11 09:25:44'),
(59, 9523, 'Centro de Comercio, Industria y Turismo deCórdoba', NULL, 13, '0000-00-00 00:00:00', '2022-05-11 09:41:21'),
(60, 1010, 'Despacho Dirección', NULL, 14, '0000-00-00 00:00:00', '2022-05-11 10:10:03'),
(61, 9232, 'Centro Industrial y de Desarrollo Empresarial de Soacha', '', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 9509, 'Centro de Desarrollo Agroindustrial y Empresarial', NULL, 14, '0000-00-00 00:00:00', '2022-05-11 10:06:31'),
(63, 9510, 'Centro Agroecológico y Empresarial', NULL, 14, '0000-00-00 00:00:00', '2022-05-11 10:07:01'),
(64, 9511, 'Centro de la Tecnología de Diseño y la Productividad Empresarial', NULL, 14, '0000-00-00 00:00:00', '2022-05-11 09:26:05'),
(65, 9512, 'Centro de Biotecnología Agropecuaria', NULL, 14, '0000-00-00 00:00:00', '2022-05-11 09:19:23'),
(66, 9513, 'Centro de Desarrollo Agroempresarial', NULL, 14, '0000-00-00 00:00:00', '2022-05-11 10:07:09'),
(67, 1010, 'Despacho Dirección', NULL, 34, '0000-00-00 00:00:00', '2022-05-11 10:10:53'),
(68, 1012, 'Oficina de Control\nInterno', '', 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 1013, 'Oficina de Control Interno\nDisciplinario', '', 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 1023, 'Oficina de Comunicaciones', NULL, 34, '0000-00-00 00:00:00', '2022-05-11 09:43:01'),
(71, 1032, 'Oficina de Sistemas', '', 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 10, 'Dirección Jurídica', NULL, 34, '0000-00-00 00:00:00', '2022-05-11 10:12:52'),
(73, 2020, 'Secretaría General', NULL, 34, '0000-00-00 00:00:00', '2022-05-11 10:13:09'),
(74, 3030, 'Dirección de Planeación y Direccionamiento Corporativo', NULL, 34, '0000-00-00 00:00:00', '2022-05-11 09:53:49'),
(75, 4040, 'Dirección Administrativa y Financiera', NULL, 34, '0000-00-00 00:00:00', '2022-05-11 09:59:41'),
(76, 5050, 'Dirección de Empleo y Trabajo', NULL, 34, '0000-00-00 00:00:00', '2022-05-11 10:06:13'),
(77, 6060, 'Dirección de Formación Profesional', NULL, 34, '0000-00-00 00:00:00', '2022-05-11 10:10:30'),
(78, 7070, 'Dirección Sistema Nacional de Formación para el Trabajo', NULL, 34, '0000-00-00 00:00:00', '2022-05-11 10:11:14'),
(79, 8080, 'Dirección de Promoción y Relaciones Corporativas', NULL, 34, '0000-00-00 00:00:00', '2022-05-11 10:14:57'),
(80, 1010, 'Despacho Dirección', NULL, 15, '0000-00-00 00:00:00', '2022-05-11 10:15:09'),
(81, 9209, 'Centro de Tecnologías para la Construcción y la Madera', NULL, 15, '0000-00-00 00:00:00', '2022-05-11 10:15:26'),
(82, 9210, 'Centro de Electricidad, Electrónica y Telecomunicaciones', NULL, 15, '0000-00-00 00:00:00', '2022-05-11 09:39:07'),
(83, 9211, 'Centro de Gestión Industrial', NULL, 15, '0000-00-00 00:00:00', '2022-05-11 09:26:16'),
(84, 9212, 'Centro de Manufactura en Textil y\nCuero', '', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 9213, 'Centro de Tecnologías del Transporte', NULL, 15, '0000-00-00 00:00:00', '2022-05-11 10:15:44'),
(86, 9214, 'Centro Metalmecánico', NULL, 15, '0000-00-00 00:00:00', '2022-05-11 09:27:56'),
(87, 9215, 'Centro de\nMateriales y Ensayos', '', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 9216, 'Centro de Diseño y Metrología', NULL, 15, '0000-00-00 00:00:00', '2022-05-11 09:32:54'),
(89, 9217, 'Centro para la Industria de la Comunicación Gráfica', NULL, 15, '0000-00-00 00:00:00', '2022-05-11 09:34:48'),
(90, 9303, 'Centro de Gestión de Mercados, Logística y Tecnologías de la Información', NULL, 15, '0000-00-00 00:00:00', '2022-05-11 09:54:21'),
(91, 9403, 'Centro de Formación de Talento Humano en Salud', NULL, 15, '0000-00-00 00:00:00', '2022-05-11 10:00:32'),
(92, 9404, 'Centro de Gestión Administrativa', NULL, 15, '0000-00-00 00:00:00', '2022-05-11 10:00:42'),
(93, 9405, 'Centro de Servicios\nFinancieros', '', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 9406, 'Centro Nacional de Hoteleria, Turismo y\nAlimentos', '', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 9508, 'Centro de For', '', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 1010, 'Despacho Dirección', NULL, 16, '0000-00-00 00:00:00', '2022-05-11 10:16:52'),
(97, 9547, 'Centro Ambiental y Ecoturistico del Nororiente Amazónico', NULL, 16, '0000-00-00 00:00:00', '2022-05-11 10:03:41'),
(98, 1010, 'Despacho Dirección', NULL, 17, '0000-00-00 00:00:00', '2022-05-11 10:18:05'),
(99, 9222, 'Centro Industrial y de Energías Alternativas', NULL, 17, '0000-00-00 00:00:00', '2022-05-11 09:39:53'),
(100, 9524, 'Centro Agroempresarial y Acuicola', NULL, 17, '0000-00-00 00:00:00', '2022-05-11 09:46:23'),
(101, 1010, 'Despacho\nDirecci?n', '', 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 9533, 'Centro de Desarrollo Agroindustrial, Turístico y Tecnológico del Guaviare', NULL, 18, '0000-00-00 00:00:00', '2022-05-11 09:56:20'),
(103, 1010, 'Despacho\nDirecci?n', '', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 9116, 'Centro de Formación Agroindustrial', NULL, 19, '0000-00-00 00:00:00', '2022-05-11 09:26:29'),
(105, 9525, 'Centro Agroempresarial y Desarrollo Pecuario del Huila', NULL, 19, '0000-00-00 00:00:00', '2022-05-11 09:48:06'),
(106, 9526, 'Centro de Desarrollo Agroempresarial y Turístico del Huila', NULL, 19, '0000-00-00 00:00:00', '2022-05-11 09:48:34'),
(107, 9527, 'Centro de la Industria, la Empresa y\nlos Servicios', '', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 9528, 'Centro de Gestión y Desarrollo Sostenible Surcolombiano', NULL, 19, '0000-00-00 00:00:00', '2022-05-11 09:50:40'),
(109, 1010, 'Despacho Dirección', NULL, 20, '0000-00-00 00:00:00', '2022-05-11 10:18:37'),
(110, 9118, 'Centro Acuicola y Agroindustrial de Gaira', NULL, 20, '0000-00-00 00:00:00', '2022-05-11 09:35:55'),
(111, 9529, 'Centro de Logística y Promoción Ecoturística del Magdalena', NULL, 20, '0000-00-00 00:00:00', '2022-05-11 09:51:49'),
(112, 1010, 'Despacho Dirección', NULL, 21, '0000-00-00 00:00:00', '2022-05-11 09:19:36'),
(113, 9117, 'Centro Agroindustrial del Meta', NULL, 21, '0000-00-00 00:00:00', '2022-05-11 09:34:59'),
(114, 9532, 'Centro de Industria y Servicios del\nMeta', '', 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 1010, 'Despacho Dirección', NULL, 22, '0000-00-00 00:00:00', '2022-05-11 09:30:05'),
(116, 9534, 'Centro Sur Colombiano de Logística Internacional', NULL, 22, '0000-00-00 00:00:00', '2022-05-11 09:33:10'),
(117, 9535, 'Centro Agroindustrial y Pesquero de la Costa Pacifica', NULL, 22, '0000-00-00 00:00:00', '2022-05-11 09:35:08'),
(118, 9536, 'Centro Internacional de Producción Limpia -Lope', NULL, 22, '0000-00-00 00:00:00', '2022-05-11 09:36:04'),
(119, 1010, 'Despacho Dirección', NULL, 23, '0000-00-00 00:00:00', '2022-05-11 09:36:51'),
(120, 9119, 'Centro de Formación para el Desarrollo Rural y Minero', NULL, 23, '0000-00-00 00:00:00', '2022-05-11 09:19:57'),
(121, 9537, 'Centro de la Industria, la Empresa y\nlos Servicios', '', 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 1010, 'Despacho Dirección', NULL, 24, '0000-00-00 00:00:00', '2022-05-11 09:20:10'),
(123, 9518, 'Centro Agroforestal y Acuicola Arapaima', NULL, 24, '0000-00-00 00:00:00', '2022-05-11 09:22:10'),
(124, 1010, 'Despacho Dirección', NULL, 25, '0000-00-00 00:00:00', '2022-05-11 09:46:34'),
(125, 9120, 'Centro Agroindustrial', NULL, 25, '0000-00-00 00:00:00', '2022-05-11 09:48:15'),
(126, 9231, 'Centro para el Desarrollo Tecnológico de la Construcción y la Industria', NULL, 25, '0000-00-00 00:00:00', '2022-05-11 09:41:06'),
(127, 9538, 'Centro de Comercio y\nTurismo', '', 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 1010, 'Despacho Dirección', NULL, 26, '0000-00-00 00:00:00', '2022-05-11 09:51:23'),
(129, 9121, 'Centro Atención Sector Agropecuario', NULL, 26, '0000-00-00 00:00:00', '2022-05-11 09:52:54'),
(130, 9223, 'Centro de Diseño e Innovación Tecnológica Industrial', NULL, 26, '0000-00-00 00:00:00', '2022-05-11 09:23:57'),
(131, 9308, 'Centro de\nComercio y Servicios', '', 26, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 1010, 'Despacho Dirección', NULL, 27, '0000-00-00 00:00:00', '2022-05-11 09:24:06'),
(133, 9539, 'Centro de Formación Turística, Gente de Mar y de Servicios', NULL, 27, '0000-00-00 00:00:00', '2022-05-11 09:56:31'),
(134, 1010, 'Despacho Dirección', NULL, 28, '0000-00-00 00:00:00', '2022-05-11 09:57:26'),
(135, 9122, 'Centro Atención Sector Agropecuario', NULL, 28, '0000-00-00 00:00:00', '2022-05-11 09:40:19'),
(136, 9224, 'Centro Industrial de Mantenimiento Integral', NULL, 28, '0000-00-00 00:00:00', '2022-05-11 09:47:09'),
(137, 9225, 'Centro Industrial del Diseño y la Manufactura', NULL, 28, '0000-00-00 00:00:00', '2022-05-11 09:40:31'),
(138, 9309, 'Centro de Servicios Empresariales y Turísticos', NULL, 28, '0000-00-00 00:00:00', '2022-05-11 09:57:51'),
(139, 9540, 'Centro Industrial y del Desarrollo Tecnológico', NULL, 28, '0000-00-00 00:00:00', '2022-05-11 09:58:25'),
(140, 9541, 'Centro Agroturístico', NULL, 28, '0000-00-00 00:00:00', '2022-05-11 09:28:10'),
(141, 9545, 'Centro Agroempresarial y Turístico de los Andes', NULL, 28, '0000-00-00 00:00:00', '2022-05-11 09:28:24'),
(142, 9546, 'Centro de Gestión Agroempresarial del Oriente', NULL, 28, '0000-00-00 00:00:00', '2022-05-11 09:29:12'),
(143, 1010, 'Despacho Dirección', NULL, 29, '0000-00-00 00:00:00', '2022-05-11 09:29:00'),
(144, 9542, 'Centro de la Innovación, la Tecnología y los Servicios', NULL, 29, '0000-00-00 00:00:00', '2022-05-11 09:29:38'),
(145, 1010, 'Despacho Dirección', NULL, 30, '0000-00-00 00:00:00', '2022-05-11 10:02:49'),
(146, 9123, 'Centro Agropecuario\nla Granja', '', 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 9226, 'Centro de Industria y Construcción', NULL, 30, '0000-00-00 00:00:00', '2022-05-11 09:48:48'),
(148, 9310, 'Centro de Comercio y\nServicios', '', 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 1010, 'Despacho Dirección', NULL, 31, '0000-00-00 00:00:00', '2022-05-11 10:04:39'),
(150, 9124, 'Centro Agropecuario de Buga', '', 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 9125, 'Centro Latinoamericano de Especies Menores', NULL, 31, '0000-00-00 00:00:00', '2022-05-11 09:30:49'),
(152, 9126, 'Centro Náutico Pesquero de Buenaventura', NULL, 31, '0000-00-00 00:00:00', '2022-05-11 09:31:06'),
(153, 9227, 'Centro de Electricidad y Automatización Industrial - CEAI', NULL, 31, '0000-00-00 00:00:00', '2022-05-11 09:23:22'),
(154, 9228, 'Centro de la Construcción', NULL, 31, '0000-00-00 00:00:00', '2022-05-11 09:31:19'),
(155, 9229, 'Centro de Diseño Tecnológico Industrial', NULL, 31, '0000-00-00 00:00:00', '2022-05-11 09:53:10'),
(156, 9230, 'Centro Nacional de Asistencia Técnica a la Industria -ASTIN', NULL, 31, '0000-00-00 00:00:00', '2022-05-11 09:40:48'),
(157, 9311, 'Centro de Gestión Tecnológica de Servicios', NULL, 31, '0000-00-00 00:00:00', '2022-05-11 09:55:07'),
(158, 9543, 'Centro de Tecnologías Agroindustriales', NULL, 31, '0000-00-00 00:00:00', '2022-05-11 10:01:51'),
(159, 9544, 'Centro de Biotecnología Industrial', NULL, 31, '0000-00-00 00:00:00', '2022-05-11 10:02:18'),
(160, 1010, 'Despacho Dirección', NULL, 32, '0000-00-00 00:00:00', '2022-05-11 09:33:21'),
(161, 9548, 'Centro Agropecuario y de Servicios Ambientales\n\"Jiri-jirimo\"', '', 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 1010, 'Despacho Dirección', NULL, 33, '0000-00-00 00:00:00', '2022-05-11 09:33:47'),
(163, 9531, 'Centro de Producción y Transformación Agroindustrial de la Orinoquia', NULL, 33, '0000-00-00 00:00:00', '2022-05-11 09:34:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_coordinacions`
--

CREATE TABLE `tbl_coordinacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tbl_coordinacions_codigo` int(11) NOT NULL,
  `tbl_coordinacions_nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_coordinacions_coordinador` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tbl_coordinacions_tbl_centros_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_coordinacions`
--

INSERT INTO `tbl_coordinacions` (`id`, `tbl_coordinacions_codigo`, `tbl_coordinacions_nombre`, `tbl_coordinacions_coordinador`, `tbl_coordinacions_tbl_centros_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'TIc y Energía', 'Manuel Gregorio Hormechea Lance', 24, '2022-05-13 02:11:58', NULL),
(2, 2, 'Metalmecánica Malambo', 'Aldo Jose Silvera Serrano', 24, '2022-05-13 02:11:58', NULL),
(3, 3, 'Metalmecánica', 'Reberto Ignacio Morales Heilbron', 24, '2022-05-13 02:11:58', NULL),
(4, 4, 'Automatización', 'Elkin David Pertuz Rada', 24, '2022-05-13 02:11:58', NULL),
(5, 5, 'Desplazados por la violencia', 'Cesar Augusto Velez Betancourt', 24, '2022-05-13 02:11:58', NULL),
(6, 6, 'Jornada VeintiCuatro horas', 'Jose Javier Ramirez Gomez', 24, '2022-05-13 02:11:58', NULL),
(7, 7, 'Articulación con la Media', 'Cesar Augusto Velez Betancourt II', 24, '2022-05-13 02:11:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_fichas`
--

CREATE TABLE `tbl_fichas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tbl_fichas_codigo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_fichas_grupo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_fichas_tbl_programas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tbl_fichas_tbl_coordinacions` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_fichas`
--

INSERT INTO `tbl_fichas` (`id`, `tbl_fichas_codigo`, `tbl_fichas_grupo`, `tbl_fichas_tbl_programas_id`, `tbl_fichas_tbl_coordinacions`, `created_at`, `updated_at`) VALUES
(1, '2300317', 'ADSI-58', 1, 1, '2022-05-13 03:03:59', '2022-05-17 00:51:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_personals`
--

CREATE TABLE `tbl_personals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tbl_personals_tbl_tipo_identificacions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tbl_personals_idenficacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_personals_nombres` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_personals_apellidos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_personals_correo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tbl_personals_celular` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tbl_personals_direccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_personals_vacuna` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tbl_personals_estado` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_personals_foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tbl_personals_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_personals_pase` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_personals_tbl_tipo_personals_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tbl_personals_tbl_tipo_sedes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_programas`
--

CREATE TABLE `tbl_programas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tbl_programas_codigo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_programas_nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_programas_version` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_programas`
--

INSERT INTO `tbl_programas` (`id`, `tbl_programas_codigo`, `tbl_programas_nombre`, `tbl_programas_version`, `created_at`, `updated_at`) VALUES
(1, '1', 'Analisis y Desarrollo', 'A001', '2022-05-13 03:03:44', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_regionals`
--

CREATE TABLE `tbl_regionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tbl_regionals_codigo` int(11) NOT NULL,
  `tbl_regionals_nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_regionals_director` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_regionals`
--

INSERT INTO `tbl_regionals` (`id`, `tbl_regionals_codigo`, `tbl_regionals_nombre`, `tbl_regionals_director`, `created_at`, `updated_at`) VALUES
(1, 91, 'REGIONAL AMAZONAS', 'Arturo Arango Santos', '2022-05-13 02:07:44', '2022-04-29 11:18:13'),
(2, 5, 'REGIONAL ANTIOQUIA', 'Juan Felipe Rendón Ochoa', '2022-05-13 02:07:44', NULL),
(3, 81, 'REGIONAL ARAUCA', 'Eddie Yovanny Millán', '2022-05-13 02:07:44', NULL),
(4, 8, 'REGIONAL ATLÁNTICO', 'Jacqueline Rojas Solano', '2022-05-13 02:07:44', NULL),
(5, 13, 'REGIONAL BOLÍVAR', 'Jaime Torrado Casadiegos', '2022-05-13 02:07:44', NULL),
(6, 15, 'REGIONAL BOYACÁ', 'Ramón Anselmo Vargas López', '2022-05-13 02:07:44', NULL),
(7, 17, 'REGIONAL CALDAS', 'Luis Alejandro Trejos Ruíz', '2022-05-13 02:07:44', NULL),
(8, 18, 'REGIONAL CAQUETÁ', 'Danny López Segura', '2022-05-13 02:07:44', NULL),
(9, 85, 'REGIONAL CASANARE', 'Johana Astrid Medina Peña', '2022-05-13 02:07:44', NULL),
(10, 19, 'REGIONAL CAUCA', 'Hernando Ramírez Dulcey', '2022-05-13 02:07:44', NULL),
(11, 20, 'REGIONAL CESAR', 'Jesús Alberto Namén Chavarro', '2022-05-13 02:07:44', NULL),
(12, 27, 'REGIONAL CHOCÓ', 'Juan Carlos Blanco Córdoba', '2022-05-13 02:07:44', NULL),
(13, 23, 'REGIONAL CÓRDOBA', 'Víctor Ariza Plama', '2022-05-13 02:07:44', NULL),
(14, 25, 'REGIONAL CUNDINAMARCA', 'Jimmy Gonzalo Maldonado Novoa', '2022-05-13 02:07:44', NULL),
(15, 11, 'REGIONAL DISTRITO CAPITAL', 'Enrique Romero Contreras', '2022-05-13 02:07:44', NULL),
(16, 94, 'REGIONAL GUAINÍA', 'Jairo Orlando Rojas Buitrago', '2022-05-13 02:07:44', NULL),
(17, 44, 'REGIONAL GUAJIRA', 'Linda de Jesús Tromp Villareal', '2022-05-13 02:07:44', NULL),
(18, 95, 'REGIONAL GUAVIARE', 'Luz Piedad Echeverry Quinceo', '2022-05-13 02:07:44', NULL),
(19, 41, 'REGIONAL HUILA', 'Cándido Herrera Gonzáles', '2022-05-13 02:07:44', NULL),
(20, 47, 'REGIONAL MAGDALENA', 'Víctor Hugo Armenta Herrera', '2022-05-13 02:07:44', NULL),
(21, 50, 'REGIONAL META', 'Diana María Del Mar Pino Humanez', '2022-05-13 02:07:44', NULL),
(22, 52, 'REGIONAL NARIÑO', 'Sara Ángela Arturo González', '2022-05-13 02:07:44', NULL),
(23, 54, 'REGIONAL NORTE DE SANTANDER', 'Wilmar Manuel Cepeda Basto', '2022-05-13 02:07:44', NULL),
(24, 86, 'REGIONAL PUTUMAYO', 'William James Rodríguez Ortiz', '2022-05-13 02:07:44', NULL),
(25, 63, 'REGIONAL QUINDÍO', 'Carlos Fabio Alvarez Angel', '2022-05-13 02:07:44', NULL),
(26, 66, 'REGIONAL RISARALDA', 'Mario Chica Palacio', '2022-05-13 02:07:44', NULL),
(27, 88, 'REGIONAL SAN ANDRÉS', 'Leonora Barragán Bedoya', '2022-05-13 02:07:44', NULL),
(28, 68, 'REGIONAL SANTANDER', 'Orlando Ariza Ariza', '2022-05-13 02:07:44', NULL),
(29, 70, 'REGIONAL SUCRE', 'Marco Eugenio Gómez Ordosgoitia', '2022-05-13 02:07:44', NULL),
(30, 73, 'REGIONAL TOLIMA', 'Álvaro Iván Barrero Buitrago', '2022-05-13 02:07:44', NULL),
(31, 76, 'REGIONAL VALLE', 'Fernando José Muriel Andrade', '2022-05-13 02:07:44', NULL),
(32, 97, 'REGIONAL VAUPÉS', 'Luz Empir Velásquez Camargo', '2022-05-13 02:07:44', NULL),
(33, 99, 'REGIONAL VICHADA', 'Oscar Eduardo Daza Joaquín', '2022-05-13 02:07:44', '2022-04-29 11:44:47'),
(34, 1, 'DIRECCION GNERAL', 'DIRECTOR GENERAL', '2022-05-13 02:07:44', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sedes`
--

CREATE TABLE `tbl_sedes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tbl_sedes_codigo` int(11) NOT NULL,
  `tbl_sedes_nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbl_sedes_tbl_coordinacions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_sedes`
--

INSERT INTO `tbl_sedes` (`id`, `tbl_sedes_codigo`, `tbl_sedes_nombre`, `tbl_sedes_tbl_coordinacions_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sede TIC', 1, '2022-05-13 02:12:24', NULL),
(2, 2, 'Sede Energía', 1, '2022-05-13 02:12:24', '2022-05-11 11:49:17'),
(3, 3, 'Sede Malambo', 2, '2022-05-13 02:12:24', NULL),
(4, 4, 'Sede Refrigeración', 3, '2022-05-13 02:12:24', NULL),
(5, 5, 'Calle treinta', 4, '2022-05-13 02:12:24', NULL),
(6, 6, 'Calle treinta veinticuatro horas', 6, '2022-05-13 02:12:24', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_identificacions`
--

CREATE TABLE `tbl_tipo_identificacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tbl_tipo_identificacions_nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_tipo_identificacions`
--

INSERT INTO `tbl_tipo_identificacions` (`id`, `tbl_tipo_identificacions_nombre`, `created_at`, `updated_at`) VALUES
(1, 'CC', '2022-05-13 02:03:59', NULL),
(2, 'TI', '2022-05-13 02:03:59', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_personals`
--

CREATE TABLE `tbl_tipo_personals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tbl_tipo_personals_nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_tipo_personals`
--

INSERT INTO `tbl_tipo_personals` (`id`, `tbl_tipo_personals_nombre`, `created_at`, `updated_at`) VALUES
(1, 'Aprendiz', '2022-05-13 02:40:53', '2022-05-19 00:03:27'),
(2, 'Contratista', '2022-05-13 02:40:59', '2022-05-13 07:41:22'),
(3, 'Funcionario', '2022-05-13 02:41:11', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `useables`
--

CREATE TABLE `useables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'add', 'Admin@gmail.com', NULL, '$2y$10$tjPUNinfwZJuqZAiEE5rte4qSOPlmwyJiccIq8uhOuHIq7zJDhO8e', NULL, '2022-05-03 09:40:56', '2022-05-03 09:40:56'),
(2, 'daniel', 'dani12@gmail.com', NULL, '$2y$10$vkON/f6fOOU5iJgWSbl7Puw4IGelcBxBU8opW06R6RG4v0bKeeeBO', NULL, '2022-05-05 12:06:52', '2022-05-05 12:06:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `perfils`
--
ALTER TABLE `perfils`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `tbl_aprendizs`
--
ALTER TABLE `tbl_aprendizs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_aprendizs_tbl_aprendizs_tbl_tipo_identificacions_id_foreign` (`tbl_aprendizs_tbl_tipo_identificacions_id`),
  ADD KEY `tbl_aprendizs_tbl_aprendizs_tbl_fichas_id_foreign` (`tbl_aprendizs_tbl_fichas_id`);

--
-- Indices de la tabla `tbl_centros`
--
ALTER TABLE `tbl_centros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_centros_tbl_centros_tbl_regionals_id_foreign` (`tbl_centros_tbl_regionals_id`);

--
-- Indices de la tabla `tbl_coordinacions`
--
ALTER TABLE `tbl_coordinacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_coordinacions_tbl_coordinacions_tbl_centros_id_foreign` (`tbl_coordinacions_tbl_centros_id`);

--
-- Indices de la tabla `tbl_fichas`
--
ALTER TABLE `tbl_fichas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_fichas_tbl_fichas_tbl_programas_id_foreign` (`tbl_fichas_tbl_programas_id`),
  ADD KEY `tbl_fichas_tbl_fichas_tbl_coordinacions_foreign` (`tbl_fichas_tbl_coordinacions`);

--
-- Indices de la tabla `tbl_personals`
--
ALTER TABLE `tbl_personals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_personals_tbl_personals_tbl_tipo_identificacions_id_foreign` (`tbl_personals_tbl_tipo_identificacions_id`),
  ADD KEY `tbl_personals_tbl_personals_tbl_tipo_personals_id_foreign` (`tbl_personals_tbl_tipo_personals_id`),
  ADD KEY `tbl_personals_tbl_personals_tbl_tipo_sedes_id_foreign` (`tbl_personals_tbl_tipo_sedes_id`);

--
-- Indices de la tabla `tbl_programas`
--
ALTER TABLE `tbl_programas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_regionals`
--
ALTER TABLE `tbl_regionals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_sedes`
--
ALTER TABLE `tbl_sedes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_sedes_tbl_sedes_tbl_coordinacions_id_foreign` (`tbl_sedes_tbl_coordinacions_id`);

--
-- Indices de la tabla `tbl_tipo_identificacions`
--
ALTER TABLE `tbl_tipo_identificacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_tipo_personals`
--
ALTER TABLE `tbl_tipo_personals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `useables`
--
ALTER TABLE `useables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `useables_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfils`
--
ALTER TABLE `perfils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_aprendizs`
--
ALTER TABLE `tbl_aprendizs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_centros`
--
ALTER TABLE `tbl_centros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT de la tabla `tbl_coordinacions`
--
ALTER TABLE `tbl_coordinacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_fichas`
--
ALTER TABLE `tbl_fichas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_personals`
--
ALTER TABLE `tbl_personals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_programas`
--
ALTER TABLE `tbl_programas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_regionals`
--
ALTER TABLE `tbl_regionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `tbl_sedes`
--
ALTER TABLE `tbl_sedes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_identificacions`
--
ALTER TABLE `tbl_tipo_identificacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_personals`
--
ALTER TABLE `tbl_tipo_personals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `useables`
--
ALTER TABLE `useables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tbl_aprendizs`
--
ALTER TABLE `tbl_aprendizs`
  ADD CONSTRAINT `tbl_aprendizs_tbl_aprendizs_tbl_fichas_id_foreign` FOREIGN KEY (`tbl_aprendizs_tbl_fichas_id`) REFERENCES `tbl_fichas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_aprendizs_tbl_aprendizs_tbl_tipo_identificacions_id_foreign` FOREIGN KEY (`tbl_aprendizs_tbl_tipo_identificacions_id`) REFERENCES `tbl_tipo_identificacions` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_centros`
--
ALTER TABLE `tbl_centros`
  ADD CONSTRAINT `tbl_centros_tbl_centros_tbl_regionals_id_foreign` FOREIGN KEY (`tbl_centros_tbl_regionals_id`) REFERENCES `tbl_regionals` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_coordinacions`
--
ALTER TABLE `tbl_coordinacions`
  ADD CONSTRAINT `tbl_coordinacions_tbl_coordinacions_tbl_centros_id_foreign` FOREIGN KEY (`tbl_coordinacions_tbl_centros_id`) REFERENCES `tbl_centros` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_fichas`
--
ALTER TABLE `tbl_fichas`
  ADD CONSTRAINT `tbl_fichas_tbl_fichas_tbl_coordinacions_foreign` FOREIGN KEY (`tbl_fichas_tbl_coordinacions`) REFERENCES `tbl_coordinacions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_fichas_tbl_fichas_tbl_programas_id_foreign` FOREIGN KEY (`tbl_fichas_tbl_programas_id`) REFERENCES `tbl_programas` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_personals`
--
ALTER TABLE `tbl_personals`
  ADD CONSTRAINT `tbl_personals_tbl_personals_tbl_tipo_identificacions_id_foreign` FOREIGN KEY (`tbl_personals_tbl_tipo_identificacions_id`) REFERENCES `tbl_tipo_identificacions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_personals_tbl_personals_tbl_tipo_personals_id_foreign` FOREIGN KEY (`tbl_personals_tbl_tipo_personals_id`) REFERENCES `tbl_tipo_personals` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_personals_tbl_personals_tbl_tipo_sedes_id_foreign` FOREIGN KEY (`tbl_personals_tbl_tipo_sedes_id`) REFERENCES `tbl_sedes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_sedes`
--
ALTER TABLE `tbl_sedes`
  ADD CONSTRAINT `tbl_sedes_tbl_sedes_tbl_coordinacions_id_foreign` FOREIGN KEY (`tbl_sedes_tbl_coordinacions_id`) REFERENCES `tbl_coordinacions` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `useables`
--
ALTER TABLE `useables`
  ADD CONSTRAINT `useables_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

