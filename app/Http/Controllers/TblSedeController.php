<?php

namespace App\Http\Controllers;

use App\Models\tbl_sede;
use App\Models\tbl_coordinacion;
use App\Models\tbl_perfil;
use App\Models\tbl_centro;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TblSedeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total = tbl_sede::all()->count();
        $sedes = tbl_sede::orderBy('id', 'ASC')->paginate(10);

        $coordinaciones = tbl_coordinacion::all();
        $centros = tbl_centro::all();

        return view('Sede.index', compact('total','coordinaciones', 'sedes', 'centros'));
    }

    public function create(request $request)
    {

        $request->validate([
            'tbl_sedes_codigo' => 'required|unique:tbl_sedes',
            'tbl_sedes_nombre' => 'required|unique:tbl_sedes',
            'tbl_sedes_tbl_coordinacions_id' => 'required',
            'tbl_sedes_tbl_centros_id' => 'required'
        ]);

        $datosSedes = request()->except('_token');
        tbl_sede::insert($datosSedes);

        return redirect('/sede')->with('rgcmessage', '¡El registro fue guardado con exito!...');
    }

    public function destroy($id)
    {
        tbl_sede::destroy($id);
        return redirect('/sede')->with('msjdelete', '¡Se borro el registro correctamente!...');
    }

    public function update(request $request, $id)
    {

        $datosSede = request()->except(['_token','_method']);
        tbl_sede::where('id','=', $id)->update($datosSede);

        $sedes = tbl_sede::findOrFail($id);

        Session::flash('msjupdate', '¡El registro se a actualizado correctamente!...');
        return redirect('/sede')->with('sedes');
    }
}
