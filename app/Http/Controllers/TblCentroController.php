<?php

namespace App\Http\Controllers;

use App\Models\tbl_centro;
use App\Models\tbl_regional;
use App\Models\tbl_coordinacion;
use App\Models\tbl_perfil;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\tbl_centroExport;
use App\Imports\tbl_centroImport;

class TblCentroController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function export()
    {
        return Excel::download(new tbl_centroExport, 'centro_export.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request, tbl_centro $centros, tbl_coordinacion $coordinaciones, tbl_regional $regional)
    {
        $total = tbl_centro::all()->count();
        $centros = tbl_centro::all();
        $coordinaciones = tbl_coordinacion::all();
        $regional = tbl_regional::all();

        return view('Centro.index', compact('centros','total','regional'));
    }

    public function import()
    {
        Excel::import(new tbl_centroImport, request()->file('documento'));

        return redirect('/centro')->with('success', 'All good!');
    }

    public function create(request $request, tbl_centro $centros, tbl_coordinacion $coordinaciones, tbl_regional $regional)
    {
        $centros = tbl_centro::all();
        $coordinaciones = tbl_coordinacion::all();
        $regional = tbl_regional::all();
        
        $request->validate([
            'tbl_centros_codigo' => 'required|unique:tbl_centros',
            'tbl_centros_nombre' => 'required|unique:tbl_centros',
            'tbl_centros_subdirector' => 'unique:tbl_centros',
            'tbl_centros_tbl_regionals_id' => 'required'
        ]);

        $datoscentro = request()->except('_token');
        tbl_centro::insert($datoscentro);

        return redirect('/centro')->with('rgcmessage', '¡El registro fue guardado con exito!...');
    }

    public function destroy($id)
    {
        $consulta = tbl_coordinacion::where('tbl_coordinacions_tbl_centros_id', '=', $id)->count();

        if($consulta>0){
            return redirect('/centro')->with('dlfmessage', '¡Este centro tiene coordinaciones asignadas y no puede ser eliminada!, elimine antes las coordinaciones...');
        }
        else
        {
            $consulta = tbl_perfil::where('tbl_perfil_tbl_centros_id', $id)->count();

            if($consulta>0){
                return redirect('/centro')->with('dlfmessage', '¡Este centro tiene personas asignadas y no puede ser eliminada!, elimine antes sus perfiles...');
            }
            else
            {
            tbl_centro::destroy($id);
            return redirect('/centro')->with('msjdelete', '¡Se borro el registro correctamente!...');
            }
        }
    }

    public function update(request $request, $id)
    {

        $datoscentro = request()->except(['_token','_method']);
        tbl_centro::where('id','=', $id)->update($datoscentro);

        $centro= tbl_centro::findOrFail($id);

        Session::flash('msjupdate', '¡El registro se a actualizado correctamente!...');
        return redirect('/centro')->with('centro');
    }
}
