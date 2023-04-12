<?php

namespace App\Http\Controllers;

use App\Models\tbl_perfil;
use App\Models\tbl_tipo_personal;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegistrosController extends Controller
{
    public function indexFyC()
    {
        $tp1 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Funcionario')->pluck('id');
        $cant_funcionarios = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp1)->count();
        $funcionarios = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp1)->get();

        $tp2 = tbl_tipo_personal::where('tbl_tipo_personals_nombre', 'Contratista')->pluck('id');
        $cant_contratistas = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp2)->count();
        $contratistas = tbl_perfil::where('tbl_perfil_tbl_tipo_personals_id', $tp2)->get();


        return view('Registros_FyC.index', compact('cant_funcionarios', 'cant_contratistas', 'funcionarios', 'contratistas'));
    }
}
