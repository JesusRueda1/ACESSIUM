<?php

namespace App\Http\Controllers;

use App\Models\tbl_tipo_identificacion;
use App\Models\tbl_perfil;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TblTipoIdentificacionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total = tbl_tipo_identificacion::all()->count();
        $tipois = tbl_tipo_identificacion::orderBy('id', 'ASC')->paginate(10);

        return view('TipoI.index', compact('total','tipois'));
    }

    public function create(request $request)
    {

        $request->validate([
            'tbl_tipo_identificacions_nombre' => 'required|unique:tbl_tipo_identificacions'
        ]);

        $datosTpi = request()->except('_token');
        tbl_tipo_identificacion::insert($datosTpi);

        return redirect('/tipoI')->with('rgcmessage', '¡El registro fue guardado con exito!...');
    }

    public function destroy($id)
    {

        $fk = tbl_perfil::where('tbl_personals_tbl_tipo_identificacions_id', '=', $id)->get();
        $fkc = sizeof($fk);

        if($count>0){
                return redirect('/tipoI')->with('dlfmessage', '¡¡Estos registros no pueden ser eliminados, solo modificados!...');
        }
        else
        {
            return redirect('/tipoI')->with('msjdelete', '¡Se borro el registro correctamente!...');
        }
    }

    public function update(request $request, $id)
    {

        $datosTiposI = request()->except(['_token','_method']);
        tbl_tipo_identificacion::where('id','=', $id)->update($datosTiposI);

        $tipois = tbl_tipo_identificacion::findOrFail($id);

        Session::flash('msjupdate', '¡El registro se a actualizado correctamente!...');
        return redirect('/tipoI')->with('tipois');
    }
}
