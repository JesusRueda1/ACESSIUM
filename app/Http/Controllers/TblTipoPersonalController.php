<?php

namespace App\Http\Controllers;

use App\Models\tbl_tipo_personal;
use App\Models\tbl_personal;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TblTipoPersonalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total = tbl_tipo_personal::all()->count();
        $tipops = tbl_tipo_personal::orderBy('id', 'ASC')->paginate(10);

        return view('Tipop.index', compact('total','tipops'));
    }

    public function create(request $request)
    {

        $request->validate([
            'tbl_tipo_personals_nombre' => 'required|unique:tbl_tipo_personals'
        ]);

        $datosTps = request()->except('_token');
        tbl_tipo_personal::insert($datosTps);

        return redirect('/tipoP')->with('rgcmessage', '¡El registro fue guardado con exito!...');
    }

    public function destroy($id)
    {

        $fk = tbl_personal::where('tbl_personals_tbl_tipo_personals_id', '=', $id)->get();

        $fkc = sizeof($fk);

        if($fkc>0){
            return redirect('/tipoP')->with('dlfmessage', '¡Estos registros no pueden ser eliminados, solo modificados!...');
        }
        else
        {
            tbl_tipo_personal::destroy($id);
            return redirect('/tipoP')->with('msjdelete', '¡Se borro el registro correctamente!...');
        }
    }

    public function update(request $request, $id)
    {

        $datosTiposP = request()->except(['_token','_method']);
        tbl_tipo_personal::where('id','=', $id)->update($datosTiposP);

        $tipops = tbl_tipo_personal::findOrFail($id);

        Session::flash('msjupdate', '¡El registro se a actualizado correctamente!...');
        return redirect('/tipoP')->with('tipops');
    }
}
