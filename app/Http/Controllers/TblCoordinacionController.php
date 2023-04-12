<?php

namespace App\Http\Controllers;

use App\Models\tbl_coordinacion;
use App\Models\tbl_centro;
use App\Models\tbl_sede;
use App\Models\tbl_regional;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\tbl_coordinacionExport;
use App\Imports\tbl_coordinacionImport;

class TblCoordinacionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(request $request, tbl_centro $centros, tbl_coordinacion $coordinaciones, tbl_regional $regional)
    {
        $total = tbl_coordinacion::all()->count();
        $coordinaciones = tbl_coordinacion::all();
        $centros = tbl_centro::all();
        $regional = tbl_regional::all();

        return view('Coordinacion.index', compact('total','coordinaciones', 'centros'));
    }

    public function export()
    {
        return Excel::download(new tbl_coordinacionExport, 'coordinacion_export.xlsx');
    }

    public function import()
    {
        Excel::import(new tbl_coordinacionImport, request()->file('documento'));

        return redirect('/coordinacion')->with('success', 'All good!');
    }

    public function create(request $request, tbl_centro $centros, tbl_coordinacion $coordinaciones, tbl_regional $regional)
    {
        $coordinaciones = tbl_coordinacion::all();
        $centros = tbl_centro::all();
        $regional = tbl_regional::all();

        $request->validate([
            'tbl_coordinacions_codigo' => 'required|unique:tbl_coordinacions',
            'tbl_coordinacions_nombre' => 'required|unique:tbl_coordinacions',
            'tbl_coordinacions_coordinador' => 'unique:tbl_coordinacions',
            'tbl_coordinacions_tbl_centros_id' => 'required'
        ]);

        $datoscoordinaciones = request()->except('_token');
        tbl_coordinacion::insert($datoscoordinaciones);

        return redirect('/coordinacion')->with('rgcmessage', '¡El registro fue guardado con exito!...');
    }

    public function destroy($id)
    {
        $fk = tbl_sede::where('tbl_sedes_tbl_coordinacions_id', '=', $id)->get();

        $fkc = sizeof($fk);

        if($fkc>0){
            return redirect('/coordinacion')->with('dlfmessage', '¡Esta Coordinacion tiene sedes asignadas y no puede ser eliminada!, elimine antes las sedes...');
        }
        else
        {
            tbl_coordinacion::destroy($id);
            return redirect('/coordinacion')->with('msjdelete', '¡Se borro el registro correctamente!...');
        }
    }

    public function update(request $request, $id)
    {

        $datoscoordinacion = request()->except(['_token','_method']);
        tbl_coordinacion::where('id','=', $id)->update($datoscoordinacion);

        $coordinaciones = tbl_coordinacion::findOrFail($id);

        Session::flash('msjupdate', '¡El registro se a actualizado correctamente!...');
        return redirect('/coordinacion')->with('coordinaciones');
    }
}
