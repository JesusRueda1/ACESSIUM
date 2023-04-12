<?php

namespace App\Http\Controllers;

use App\Models\tbl_ficha;
use App\Models\tbl_programa;
use App\Models\tbl_coordinacion;
use App\Models\tbl_perfil;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\tbl_fichaImport;

class TblFichaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total = tbl_ficha::all()->count();
        $ficha = tbl_ficha::all();

        $programas = tbl_programa::all();
        $coordinacion = tbl_coordinacion::all();

        return view('Fichas.index', compact('total','ficha', 'programas', 'coordinacion'));
    }

    public function import()
    {
        Excel::import(new tbl_fichaImport, request()->file('documento'));
        return redirect('/ficha')->with('success', 'All good!');
    }

    public function create(request $request)
    {

        $request->validate([
            'tbl_fichas_codigo' => 'required|unique:tbl_fichas',
            'tbl_fichas_grupo' => 'required|unique:tbl_fichas',
            'tbl_fichas_tbl_coordinacions' => 'required',
            'tbl_fichas_tbl_programas_id' => 'required'
        ]);

        $datosFicha = request()->except('_token');
        tbl_ficha::insert($datosFicha);

        return redirect('/ficha')->with('rgcmessage', '¡El registro fue guardado con exito!...');
    }

    public function destroy($id)
    {

        $fk = tbl_perfil::where('tbl_perfil_tbl_fichas_id', '=', $id)->get();

        $fkc = sizeof($fk);

        if($fkc>0){
            return redirect('/ficha')->with('dlfmessage', '¡Esta ficha tiene aprendices asignadas y no puede ser eliminada!, elimine antes todos los aprendices...');
        }
        else
        {
            tbl_ficha::destroy($id);
            return redirect('/ficha')->with('msjdelete', '¡Se borro el registro correctamente!...');
        }
    }

    public function update(request $request, $id)
    {

        $datosFicha = request()->except(['_token','_method']);
        tbl_ficha::where('id','=', $id)->update($datosFicha);

        $ficha = tbl_ficha::findOrFail($id);

        Session::flash('msjupdate', '¡El registro se a actualizado correctamente!...');
        return redirect('/ficha')->with('ficha');
    }
}
