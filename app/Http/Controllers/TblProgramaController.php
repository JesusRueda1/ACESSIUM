<?php

namespace App\Http\Controllers;

use App\Models\tbl_programa;
use App\Models\tbl_ficha;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TblProgramaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total = tbl_programa::all()->count();
        $programa = tbl_programa::orderBy('id', 'ASC')->paginate(10);

        return view('Programas.index', compact('total','programa'));
    }

    public function create(request $request)
    {

        $request->validate([
            'tbl_programas_codigo' => 'required|unique:tbl_programas',
            'tbl_programas_nombre' => 'required',
            'tbl_programas_version' => ''
        ]);

        $datosPrograma = request()->except('_token');
        tbl_programa::insert($datosPrograma);

        return redirect('/programa')->with('rgcmessage', '¡El registro fue guardado con exito!...');
    }

    public function destroy($id)
    {

        $fk = tbl_ficha::where('tbl_fichas_tbl_programas_id', '=', $id)->get();

        $fkc = sizeof($fk);

        if($fkc>0){
            return redirect('/programa')->with('dlfmessage', '¡Esta Programa tiene fichas asignadas y no puede ser eliminado!, elimine antes las fichas...');
        }
        else
        {
            tbl_programa::destroy($id);
            return redirect('/programa')->with('msjdelete', '¡Se borro el registro correctamente!...');
        }

    }

    public function update(request $request, $id)
    {

        $datosPrograma = request()->except(['_token','_method']);
        tbl_programa::where('id','=', $id)->update($datosPrograma);

        $programa = tbl_programa::findOrFail($id);

        Session::flash('msjupdate', '¡El registro se a actualizado correctamente!...');
        return redirect('/programa')->with('programa');
    }
}
