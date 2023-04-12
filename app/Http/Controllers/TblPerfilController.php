<?php

namespace App\Http\Controllers;

use App\Models\tbl_perfil;
use App\Models\tbl_tipo_personal;
use App\Models\tbl_tipo_identificacion;
use App\Models\tbl_centro;
use App\Models\tbl_ficha;
use App\Models\User;
use App\Models\tbl_coordinacion;
use Spatie\Permission\Models\Role;
use App\Exports\PerfilesExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\tbl_perfilImport;

class TblPerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function export()
    {
        return Excel::download(new PerfilesExport, 'perfiles_accesum.xlsx');
    }

    public function index()
    {

        
        $total = tbl_perfil::all()->count();
        $perfiles = tbl_perfil::all();
        $tipoP = tbl_tipo_personal::all();
        $tipoI = tbl_tipo_identificacion::all();
        $centros = tbl_centro::all();
        $fichas = tbl_ficha::all();
        $users = User::all();
        $roles = Role::all();
        $coordinaciones = tbl_coordinacion::all();

        return view('PerfilCrud.index', compact('total','tipoP', 'tipoI', 'perfiles', 'centros', 'fichas', 'users', 'roles', 'coordinaciones'));
    }

    public function create(request $request)
    {
        $request->validate([
            'id'=> '',
            'tbl_perfil_tbl_tipo_identificacions_id' => 'required',
            'tbl_perfil_idenficacion' => 'required|unique:tbl_perfils',
            'tbl_perfil_nombres' => 'required',
            'tbl_perfil_apellidos' => 'required',
            'email' => 'required|unique:users',
            'tbl_perfil_celular' => '',
            'tbl_perfil_ciudad_Residencia' => '',
            'tbl_perfil_direccion' => '',
            'tbl_perfil_vacuna' => '',
            'tbl_perfil_RH' => '',
            'tbl_perfil_estado_civil' => '',
            'tbl_perfil_sexo' => '',
            'tbl_perfil_estado' => 'required',
            'tbl_perfil_tbl_coordinacion_id' => 'required',
            'tbl_perfil_tbl_fichas_id' => '',
            'tbl_perfil_tbl_tipo_personals_id' => 'required',
            'tbl_perfil_tbl_centros_id' => 'required',
            'tbl_perfil_tbl_sedes_id' =>  '',
            'tbl_perfil_user_id' => '',
        ]);
        return DB::transaction(function () use ($request){

            $user = User::create([
                'name' => $request['tbl_perfil_nombres'],
                'email' => $request['email'],
                'password' => Hash::make($request['tbl_perfil_idenficacion']),
            ]);

            $datosPerfil = request()->except('_token','email','roles');
            $perfil = tbl_perfil::insert($datosPerfil);
            tbl_perfil::where('tbl_perfil_idenficacion', $request['tbl_perfil_idenficacion'])->update(['tbl_perfil_user_id' => $user->id]);

            $user->assignRole($request->input('roles'));

            return redirect('/perfil')->with('rgcmessage', '¡El registro fue guardado con exito!...');

        }, 5);
    }
    public function getSedes(Request $request)
    {
        $centro = $request->post('tbl_perfil_tbl_centros_id');
        $sedes = DB::table('tbl_sedes')->where('tbl_sedes_tbl_centros_id', $centro)->get();
        foreach ($sedes as $list) {
            $html = '<option value="' . $list->id . '"/>' . $list->tbl_sedes_nombre . '</option>';
        }
        echo $html;
    }

    public function destroy($id)
    {
        tbl_perfil::destroy($id);

        return redirect('/perfil')->with('msjdelete', '¡Se borro el registro correctamente!...');
    }

    public function update(request $request, $id)
    {

        $datosPerfil = request()->except(['_token','_method']);
        tbl_perfil::where('id','=', $id)->update($datosPerfil);

        $perfil = tbl_perfil::findOrFail($id);

        Session::flash('msjupdate', '¡El registro se a actualizado correctamente!...');
        return redirect('/perfil')->with('perfil');

    }

    public function updateperfil(request $request, $id)
    {

        $datosPerfil = request()->except(['_token','_method']);
        tbl_perfil::where('id','=', $id)->update($datosPerfil);

        $perfil = tbl_perfil::findOrFail($id);

        Session::flash('msjupdate', '¡El registro se a actualizado correctamente!...');
        return redirect('/perfiles')->with('perfil');

    }

    public function importperfil(request $request)
    {
        $file = $request->file('file');

        $import = new tbl_perfilImport;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        return back()->withStatus('Perfiles importados con exito!');
    }

}
