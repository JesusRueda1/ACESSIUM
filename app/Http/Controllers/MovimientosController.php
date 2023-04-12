<?php

namespace App\Http\Controllers;

use App\Models\Movimientos;
use App\Models\tbl_perfil;
use App\Models\tbl_imagen;
use App\Models\tbl_tipo_personal;
use App\Models\tbl_tipo_identificacion;
use App\Models\tbl_ficha;
use App\Models\tbl_coordinacion;
use App\Models\tbl_regional;
use App\Models\tbl_programa;
use App\Models\tbl_centro;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MovimientosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $perfil = tbl_perfil::all();

        return view('movimientos.index', compact('perfil'));
    }

    public function create(request $request)
    {
        $request->validate([
            'tbl_movimientos_identificacion' => 'required',
            'tbl_movimientos_sede' => ''
        ]);

        $identificacion = request()->except('_token');
        $fecha = today();

        /* confirmamos si existe el registro del perfil */
        $consulta = tbl_perfil::where('tbl_perfil_idenficacion', $identificacion)->count();

        if($consulta>0){

            $perfil = tbl_perfil::where('tbl_perfil_idenficacion', $identificacion)->get(); /* traemos los registros del perfil */

                /* Cambiamos el pase del perfil */

                $pase = $perfil->pluck('tbl_perfil_pase')->last();


                if($pase == "salida")
                {
                    $pase = "entrada";
                }
                else
                {
                $pase = "salida";
                }

            /* Creamos el registro en movimientos */
            $movimiento = new Movimientos();
            $movimiento->tbl_movimientos_identificacion = $request->get('tbl_movimientos_identificacion');
            $movimiento->tbl_movimientos_fecha = $fecha;
            $movimiento->tbl_movimientos_sede = $request->get('tbl_movimientos_sede');
            $movimiento->tbl_movimientos_tipo = $pase;
            $movimiento->save();

            tbl_perfil::where('tbl_perfil_idenficacion', $identificacion)->update(['tbl_perfil_pase' => $pase]);
            $idperfil = $perfil->pluck('id');
            $imagen = tbl_imagen::where('tbl_imagen_tbl_perfil_id', $idperfil)->get();

            $idtp = $perfil->pluck('tbl_perfil_tbl_tipo_personals_id');
            $tipoP = tbl_tipo_personal::where('id', $idtp)->get();

            $idti = $perfil->pluck('tbl_perfil_tbl_tipo_identificacions_id');
            $tipoI = tbl_tipo_identificacion::where('id', $idti)->get();

            $idficha = $perfil->pluck('tbl_perfil_tbl_fichas_id');
            $ficha = tbl_ficha::where('id', $idficha)->get();

            $idprograma = $ficha->pluck('tbl_fichas_tbl_programas_id');
            $programa = tbl_programa::where('id', $idprograma)->get();

            $idcentro = $perfil->pluck('tbl_perfil_tbl_centros_id');
            $centro = tbl_centro::where('id', $idcentro)->get();

            $idregional = $centro->pluck('tbl_centros_tbl_regionals_id');
            $regional = tbl_regional::where('id', $idregional)->get();

            header('Content-Type: application/json');
            $datos = array(
                "valid" => "ok",
                "mensaje" => "¡Bienvenido!",
                "perfil" => $perfil,
                "identificacion" => $perfil->pluck('tbl_perfil_idenficacion'),
                "apellidos" => $perfil->pluck('tbl_perfil_apellidos'),
                "centro" => $centro->pluck('tbl_centros_nombre'),
                "fichaCod" => $ficha->pluck('tbl_fichas_codigo'),
                "fichaGrp" => $ficha->pluck('tbl_fichas_grupo'),
                "regional" => $regional->pluck('tbl_regionals_nombre'),
                "programa" => $programa->pluck('tbl_programas_nombre'),
                "tipop" => $tipoP->pluck('tbl_tipo_personals_nombre'),
                "tipoi" => $tipoI->pluck('tbl_tipo_identificacions_nombre'),
                "imagen" => $imagen->pluck('path'),
                "pase" => $pase
            );

             /* return view('movimientos.index', compact('perfil', 'imagen', 'pase')); */

            return json_encode($datos, JSON_FORCE_OBJECT);
        }else
        {
            header('Content-Type: application/json');
            $datos = array(
                "valid" => "no",
                "mensaje" => "¡Usuario no registrado"
            );
            /* return redirect('/movimientos')->with('nrmessage', '¡Usario no registrado!'); */ /* Mensaje en caso de no encontrar registro */
            return json_encode($datos, JSON_FORCE_OBJECT);
        }

    }

}

