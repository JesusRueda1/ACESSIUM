<?php

namespace App\Http\Controllers;

use App\Models\tbl_perfil;
use App\Models\tbl_tipo_personal;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tp1 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Aprendiz')->pluck('id');
        $tp2 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Contratista')->pluck('id');
        /* <<<<<<GRAFICAS DE BARRAS>>>>>> */

            /* aprendiz */
            $aprendices = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp1)->get();
            $A_salida = $aprendices->where('tbl_perfil_pase', 'salida')->count();
            $A_entrada = $aprendices->where('tbl_perfil_pase', 'entrada')->count();

            /* contratistas */
            $contratistas = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp2)->get();
            $C_salida = $contratistas->where('tbl_perfil_pase', 'salida')->count();
            $C_entrada = $contratistas->where('tbl_perfil_pase', 'entrada')->count();

            return view('dashboard', [ "data" => json_encode($datosA) ]);
    }

}
