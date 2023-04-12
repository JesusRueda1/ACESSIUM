<?php

namespace App\Http\Controllers;

use App\Models\tbl_regional;
use App\Models\tbl_centro;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RegionalExport;
use App\Imports\RegionalImport;


class TblRegionalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total = tbl_regional:: all()->count();
        $regionales = tbl_regional::all();

        return view('Regional.index', compact('regionales','total'));
    }

    public function export()
    {
        return Excel::download(new RegionalExport, 'Regional_accesum.xlsx');
    }

    public function import()
    {
        Excel::import(new RegionalImport, request()->file('documento'));

        return redirect('/regional')->with('success', 'All good!');
    }

    public function create(request $request)
    {
        $request->validate([
            'tbl_regionals_codigo' => 'required|unique:tbl_regionals',
            'tbl_regionals_nombre' => 'required|unique:tbl_regionals',
            'tbl_regionals_director' => 'required|unique:tbl_regionals'
        ]);

            $datosregional = request()->except('_token');
            tbl_regional::insert($datosregional);

            return redirect('/regional')->with('rgcmessage', '¡El registro fue guardado con exito!...');

    }

    public function destroy($id)
    {
        $consulta = tbl_centro::where('tbl_centros_tbl_regionals_id', $id)->count();

        if($consulta>0){
            return redirect('/regional')->with('dlfmessage', '¡Esta Regional tiene centros asignados y no puede ser eliminada!, elimine antes los centros...');
        }
        else
        {
            tbl_regional::destroy($id);
            return redirect('/regional')->with('msjdelete', '¡Se borro el registro correctamente!...');
        }
    }

    public function update(request $request, $id)
    {
        $datosregional = request()->except(['_token','_method']);
        tbl_regional::where('id','=', $id)->update($datosregional);

        $regional= tbl_regional::findOrFail($id);

        Session::flash('msjupdate', '¡El registro se a actualizado correctamente!...');
        return redirect('/regional')->with('regional');
    }


}
